<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}

// Receive booking details
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : ($_SESSION['email'] ?? '');
$hotel_name = isset($_POST['hotel_name']) ? $_POST['hotel_name'] : '';
$place_name = isset($_POST['place_name']) ? $_POST['place_name'] : '';
$price_per_night = isset($_POST['price_per_night']) ? $_POST['price_per_night'] : '';
$check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '';
$check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '';
$rooms = isset($_POST['rooms']) ? $_POST['rooms'] : '';
$guests = isset($_POST['guests']) ? $_POST['guests'] : '';
$total_price = isset($_POST['total_price']) ? $_POST['total_price'] : '';

// Fallback if accessed directly without form submission
if (empty($hotel_name) || empty($total_price)) {
    header("Location: dashboard.php");
    exit();
}

if (empty($email) && !empty($username)) {
    $esc_username = mysqli_real_escape_string($conn, $username);
    $user_query = mysqli_query($conn, "SELECT email FROM users WHERE fullname = '$esc_username' LIMIT 1");
    if ($user_query && mysqli_num_rows($user_query) > 0) {
        $user_row = mysqli_fetch_assoc($user_query);
        $email = $user_row['email'];
        $_SESSION['email'] = $email;
    }
}

if(isset($_POST['pay'])){
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $upi_id = mysqli_real_escape_string($conn, $_POST['upi_id']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    
    $esc_username = mysqli_real_escape_string($conn, $username);
    $esc_email = mysqli_real_escape_string($conn, $email);
    $esc_hotel_name = mysqli_real_escape_string($conn, $hotel_name);
    $esc_place_name = mysqli_real_escape_string($conn, $place_name);
    $esc_price_per_night = mysqli_real_escape_string($conn, $price_per_night);
    $esc_check_in = mysqli_real_escape_string($conn, $check_in);
    $esc_check_out = mysqli_real_escape_string($conn, $check_out);
    $esc_rooms = mysqli_real_escape_string($conn, $rooms);
    $esc_guests = mysqli_real_escape_string($conn, $guests);
    $esc_total_price = mysqli_real_escape_string($conn, $total_price);

    // 1. Insert into hotel_bookings
    $booking_sql = "INSERT INTO hotel_bookings(
        username, email, hotel_name, place_name, price_per_night, check_in, check_out, rooms, guests, total_price, booking_status
    ) VALUES (
        '$esc_username', '$esc_email', '$esc_hotel_name', '$esc_place_name', '$esc_price_per_night', '$esc_check_in', '$esc_check_out', '$esc_rooms', '$esc_guests', '$esc_total_price', 'Confirmed'
    )";
    
    if(mysqli_query($conn, $booking_sql)) {
        $booking_id = mysqli_insert_id($conn);
        
        // 2. Insert into hotel_payments
        $payment_sql = "INSERT INTO hotel_payments(
            booking_id, username, email, amount, payment_method, upi_id, card_number, payment_status
        ) VALUES (
            '$booking_id', '$esc_username', '$esc_email', '$esc_total_price', '$payment_method', '$upi_id', '$card_number', 'Success'
        )";
        
        if(mysqli_query($conn, $payment_sql)) {
            echo "<script>
                alert('Payment Successful & Hotel Booking Confirmed!');
                window.location.href = 'hotel_invoice.php?booking_id=" . $booking_id . "';
            </script>";
            exit();
        } else {
            echo "<script>alert('Failed to process payment records. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Failed to save booking. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Payment - Travel World</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .payment-page-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .hotel-payment-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            padding: 40px;
            width: 550px;
            max-width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .hotel-payment-container h2 {
            color: #0d6efd;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .booking-summary-box {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .summary-header {
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
            font-size: 1.1rem;
            border-bottom: 1.5px solid #e2e8f0;
            padding-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .summary-header i {
            color: #0d6efd;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            color: #475569;
            font-size: 0.95rem;
        }

        .summary-row.total {
            margin-top: 12px;
            border-top: 1.5px solid #e2e8f0;
            padding-top: 12px;
            font-weight: 700;
            color: #0f172a;
            font-size: 1.15rem;
        }

        .summary-row.total span:last-child {
            color: #0d6efd;
        }

        .form-input-readonly {
            background: #f1f5f9;
            color: #64748b;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px;
            width: 100%;
            font-size: 1rem;
            margin-bottom: 15px;
            outline: none;
            cursor: not-allowed;
        }

        .payment-method-select {
            width: 100%;
            padding: 14px;
            border: 1.5px solid #cbd5e1;
            border-radius: 12px;
            font-size: 1rem;
            background: #fff;
            color: #1e293b;
            outline: none;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .payment-method-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .payment-box-toggle {
            background: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .payment-box-toggle input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 12px;
            outline: none;
            background: #fff;
        }

        .payment-box-toggle input:last-child {
            margin-bottom: 0;
        }

        .payment-box-toggle input:focus {
            border-color: #0d6efd;
        }

        .card-row-small {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .qr-display {
            text-align: center;
            padding: 10px;
        }

        .qr-display img {
            width: 180px;
            height: 180px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            margin-bottom: 10px;
        }

        .qr-display p {
            font-size: 0.9rem;
            color: #475569;
            font-weight: 500;
        }

        .btn-pay {
            width: 100%;
            padding: 16px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-pay:hover {
            background: #0256d6;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
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
    <div class="payment-page-wrapper">
        <div class="hotel-payment-container">
            <h2>Complete Payment</h2>
            <p style="text-align: center; color: #64748b; margin-bottom: 25px;">Enter details to process mock transaction</p>
            
            <!-- Booking details summary -->
            <div class="booking-summary-box">
                <div class="summary-header">
                    <i class="fa-solid fa-circle-info"></i> Booking Summary
                </div>
                <div class="summary-row">
                    <span>Hotel:</span>
                    <strong><?php echo htmlspecialchars($hotel_name); ?></strong>
                </div>
                <div class="summary-row">
                    <span>Destination:</span>
                    <span><?php echo htmlspecialchars($place_name); ?></span>
                </div>
                <div class="summary-row">
                    <span>Dates:</span>
                    <span><?php echo date('d M Y', strtotime($check_in)); ?> to <?php echo date('d M Y', strtotime($check_out)); ?></span>
                </div>
                <div class="summary-row">
                    <span>Rooms / Guests:</span>
                    <span><?php echo $rooms; ?> Room(s) / <?php echo $guests; ?> Guest(s)</span>
                </div>
                <div class="summary-row total">
                    <span>Total Amount:</span>
                    <span>₹<?php echo number_format($total_price); ?></span>
                </div>
            </div>

            <!-- Form to process payment -->
            <form method="POST">
                <!-- Keep inputs hidden to send along with post for DB insertion -->
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <input type="hidden" name="hotel_name" value="<?php echo htmlspecialchars($hotel_name); ?>">
                <input type="hidden" name="place_name" value="<?php echo htmlspecialchars($place_name); ?>">
                <input type="hidden" name="price_per_night" value="<?php echo htmlspecialchars($price_per_night); ?>">
                <input type="hidden" name="check_in" value="<?php echo htmlspecialchars($check_in); ?>">
                <input type="hidden" name="check_out" value="<?php echo htmlspecialchars($check_out); ?>">
                <input type="hidden" name="rooms" value="<?php echo htmlspecialchars($rooms); ?>">
                <input type="hidden" name="guests" value="<?php echo htmlspecialchars($guests); ?>">
                <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">

                <!-- Selected Method -->
                <select name="payment_method" id="paymentMethod" class="payment-method-select" required onchange="showPaymentMethod()">
                    <option value="">Select Payment Method</option>
                    <option value="UPI">UPI ID</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="QR Code UPI">QR Code UPI</option>
                </select>

                <!-- UPI Container -->
                <div id="upiBox" class="payment-box-toggle" style="display:none;">
                    <input type="text" name="upi_id" id="upi_id" placeholder="Enter UPI ID (e.g., user@okhdfcbank)">
                </div>

                <!-- Card Container -->
                <div id="cardBox" class="payment-box-toggle" style="display:none;">
                    <input type="text" name="card_number" id="card_number" placeholder="Enter Debit Card Number" maxlength="19">
                    <div class="card-row-small">
                        <input type="text" placeholder="MM/YY" maxlength="5">
                        <input type="password" placeholder="CVV" maxlength="3">
                    </div>
                </div>

                <!-- QR Container -->
                <div id="qrBox" class="payment-box-toggle" style="display:none;">
                    <div class="qr-display">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=TravelWorldHotelPayment_₹<?php echo $total_price; ?>" alt="Mock Payment QR">
                        <p>Scan QR code with any UPI App and complete payment</p>
                    </div>
                </div>

                <button type="submit" name="pay" class="btn-pay">
                    <i class="fa-solid fa-lock"></i> Pay ₹<?php echo number_format($total_price); ?> Now
                </button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="margin-top: auto;">
        <p>© 2026 Travel World | Hotel Bookings</p>
    </footer>

    <script>
        function showPaymentMethod(){
            const method = document.getElementById("paymentMethod").value;
            const upiBox = document.getElementById("upiBox");
            const cardBox = document.getElementById("cardBox");
            const qrBox = document.getElementById("qrBox");
            
            const upiInput = document.getElementById("upi_id");
            const cardInput = document.getElementById("card_number");

            upiBox.style.display = "none";
            cardBox.style.display = "none";
            qrBox.style.display = "none";
            
            upiInput.required = false;
            cardInput.required = false;

            if(method === "UPI"){
                upiBox.style.display = "block";
                upiInput.required = true;
            }
            if(method === "Debit Card"){
                cardBox.style.display = "block";
                cardInput.required = true;
            }
            if(method === "QR Code UPI"){
                qrBox.style.display = "block";
            }
        }
    </script>
</body>
</html>
