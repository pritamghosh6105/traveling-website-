<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}

$username = $_GET['username'];
$destination = $_GET['destination'];
$package = $_GET['package'];
$travelers = $_GET['travelers'];
$journey_date = $_GET['journey_date'];
$payment_method = $_GET['payment_method'];
$amount = $_GET['amount'];
?>

<!DOCTYPE html>
<html>

<head>

    <title>Booking Invoice</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        @media print {
            .print-btn {
                display: none !important;
            }
        }
        @media (max-width: 600px) {
            .invoice-box {
                padding: 25px 15px !important;
                border-radius: 16px !important;
            }
            .invoice-header h1 {
                font-size: 1.8rem !important;
            }
            .invoice-header h2 {
                font-size: 1.1rem !important;
            }
            .invoice-details table td {
                padding: 10px 8px !important;
                font-size: 0.85rem !important;
            }
            .print-btn {
                flex-direction: column;
                gap: 10px !important;
                margin-top: 25px !important;
            }
            .print-btn .btn {
                width: 100% !important;
                justify-content: center !important;
                margin-top: 0 !important;
            }
        }
    </style>

</head>

<body>

<div class="invoice-box">

    <div class="invoice-header">

        <h1>Travel World</h1>

        <h2>Booking Confirmation Invoice</h2>

    </div>

    <div class="invoice-details">

        <table>

            <tr>
                <td><strong>Customer Name</strong></td>
                <td><?php echo $username; ?></td>
            </tr>

            <tr>
                <td><strong>Destination</strong></td>
                <td><?php echo $destination; ?></td>
            </tr>

            <tr>
                <td><strong>Package</strong></td>
                <td><?php echo $package; ?></td>
            </tr>

            <tr>
                <td><strong>Travelers</strong></td>
                <td><?php echo $travelers; ?></td>
            </tr>

            <tr>
                <td><strong>Journey Date</strong></td>
                <td><?php echo $journey_date; ?></td>
            </tr>

            <tr>
                <td><strong>Payment Method</strong></td>
                <td><?php echo $payment_method; ?></td>
            </tr>

            <tr>
                <td><strong>Total Amount</strong></td>
                <td>₹<?php echo $amount; ?></td>
            </tr>

            <tr>
                <td><strong>Booking Status</strong></td>
                <td style="color:green;">
                    Confirmed
                </td>
            </tr>

        </table>

    </div>

    <div class="print-btn" style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-top: 30px;">

        <button class="btn"
        onclick="window.print()" style="margin-top: 0;">

            Print Invoice

        </button>

        <a href="dashboard.php" class="btn" style="background: #64748b; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; margin-top: 0;">

            <i class="fa-solid fa-arrow-left"></i> Back to Dashboard

        </a>

    </div>

</div>

</body>
</html>