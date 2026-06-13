<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}

$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;
$username = $_SESSION['user'];

if($booking_id <= 0) {
    header("Location: dashboard.php");
    exit();
}

// Fetch booking & payment details safely
$esc_booking_id = mysqli_real_escape_string($conn, $booking_id);
$esc_username = mysqli_real_escape_string($conn, $username);

$sql = "SELECT b.*, p.payment_method, p.upi_id, p.card_number, p.payment_status, p.payment_date 
        FROM hotel_bookings b 
        LEFT JOIN hotel_payments p ON b.id = p.booking_id 
        WHERE b.id = '$esc_booking_id' AND b.username = '$esc_username'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0) {
    echo "<script>
        alert('Invoice not found or unauthorized access.');
        window.location.href = 'dashboard.php';
    </script>";
    exit();
}

$invoice = mysqli_fetch_assoc($result);

// Calculate nights
$d1 = new DateTime($invoice['check_in']);
$d2 = new DateTime($invoice['check_out']);
$nights = $d1->diff($d2)->days;
if($nights <= 0) $nights = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Invoice - Travel World</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .invoice-page-container {
            flex: 1;
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hotel-invoice-box {
            width: 750px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 45px;
            position: relative;
            border: 1px solid #e2e8f0;
        }

        .invoice-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 25px;
            margin-bottom: 30px;
        }

        .invoice-brand h1 {
            color: #0d6efd;
            font-size: 2.2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 4px;
        }

        .invoice-brand p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-meta h2 {
            font-size: 1.2rem;
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .invoice-meta p {
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .invoice-table th {
            text-align: left;
            padding: 12px 16px;
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            border-bottom: 1.5px solid #cbd5e1;
            font-size: 0.9rem;
        }

        .invoice-table td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
            color: #334155;
        }

        .invoice-table tr:last-child td {
            border-bottom: none;
        }

        .total-highlight-row {
            background: #f8fafc;
            font-weight: 700;
            font-size: 1.1rem !important;
            color: #0f172a !important;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .status-success {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .invoice-footer-notes {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1.5px solid #f1f5f9;
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .action-buttons-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 35px;
        }

        .action-btn {
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            font-size: 0.95rem;
        }

        .btn-print {
            background: #0d6efd;
            color: #fff;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }

        .btn-print:hover {
            background: #0256d6;
            transform: translateY(-1px);
        }

        .btn-back {
            background: #64748b;
            color: #fff;
            box-shadow: 0 4px 12px rgba(100, 116, 139, 0.2);
        }

        .btn-back:hover {
            background: #475569;
            transform: translateY(-1px);
        }

        /* PRINT STYLING */
        @media print {
            body {
                background: #fff;
            }
            .invoice-page-container {
                padding: 0;
            }
            .hotel-invoice-box {
                box-shadow: none;
                border: none;
                padding: 0;
                width: 100%;
            }
            .action-buttons-group, .dashboard-navbar {
                display: none !important;
            }
        }

        /* MOBILE RESPONSIVE STYLING */
        @media (max-width: 600px) {
            .invoice-page-container {
                padding: 20px 10px;
            }
            .hotel-invoice-box {
                padding: 25px 15px;
                border-radius: 16px;
            }
            .invoice-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 20px;
                padding-bottom: 15px;
            }
            .invoice-meta {
                text-align: left;
            }
            .invoice-table th, .invoice-table td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }
            .invoice-footer-notes {
                margin-top: 25px;
                padding-top: 15px;
            }
            .action-buttons-group {
                flex-direction: column;
                gap: 10px;
                margin-top: 25px;
            }
            .action-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="dashboard-navbar">
        <div class="dashboard-logo">
            <i class="fa-solid fa-earth-asia"></i>
            Travel World
        </div>
        <div class="dashboard-buttons">
            <a href="dashboard.php" class="dashboard-btn home-btn">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="invoice-page-container">
        <div class="hotel-invoice-box">
            <!-- Header -->
            <div class="invoice-top">
                <div class="invoice-brand">
                    <h1><i class="fa-solid fa-earth-asia"></i> Travel World</h1>
                    <p>Adventure starts here. Travel with comfort.</p>
                </div>
                <div class="invoice-meta">
                    <h2>INVOICE</h2>
                    <p><strong>Booking Ref:</strong> TW-HOTEL-<?php echo 1000 + $invoice['id']; ?></p>
                    <p><strong>Date:</strong> <?php echo date('d M Y, h:i A', strtotime($invoice['payment_date'])); ?></p>
                </div>
            </div>

            <!-- Details Table -->
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Description</th>
                        <th style="width: 60%;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Customer Name</strong></td>
                        <td><?php echo htmlspecialchars($invoice['username']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Hotel Booked</strong></td>
                        <td><strong><?php echo htmlspecialchars($invoice['hotel_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Destination</strong></td>
                        <td><?php echo htmlspecialchars($invoice['place_name']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Dates of Stay</strong></td>
                        <td><?php echo date('d M Y', strtotime($invoice['check_in'])); ?> to <?php echo date('d M Y', strtotime($invoice['check_out'])); ?> (<?php echo $nights; ?> Nights)</td>
                    </tr>
                    <tr>
                        <td><strong>Rooms / Guests</strong></td>
                        <td><?php echo $invoice['rooms']; ?> Room(s) / <?php echo $invoice['guests']; ?> Guest(s)</td>
                    </tr>
                    <tr>
                        <td><strong>Price per Night</strong></td>
                        <td>₹<?php echo number_format($invoice['price_per_night']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Payment Method</strong></td>
                        <td><?php echo htmlspecialchars($invoice['payment_method']); ?> 
                            <?php 
                            if($invoice['payment_method'] == 'UPI') echo '('.htmlspecialchars($invoice['upi_id']).')';
                            if($invoice['payment_method'] == 'Debit Card') echo '('.substr(htmlspecialchars($invoice['card_number']), -4).')';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Payment Status</strong></td>
                        <td>
                            <span class="status-badge status-success">
                                <?php echo htmlspecialchars($invoice['payment_status']); ?>
                            </span>
                        </td>
                    </tr>
                    <tr class="total-highlight-row">
                        <td>Total Amount Paid</td>
                        <td>₹<?php echo number_format($invoice['total_price']); ?></td>
                    </tr>
                </tbody>
            </table>

            <!-- Footnote -->
            <div class="invoice-footer-notes">
                <p>Thank you for booking with Travel World! Your stay is fully confirmed.</p>
                <p style="font-size: 0.8rem; margin-top: 5px; color: #94a3b8;">For any inquiries or modifications, please contact support@travelworld.com</p>
            </div>

            <!-- Buttons -->
            <div class="action-buttons-group">
                <button class="action-btn btn-print" onclick="window.print()">
                    <i class="fa-solid fa-print"></i> Print Invoice
                </button>
                <a href="dashboard.php" class="action-btn btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="margin-top: auto;">
        <p>© 2026 Travel World | Hotel Bookings</p>
    </footer>

</body>
</html>
