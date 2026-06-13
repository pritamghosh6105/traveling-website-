<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}

$destination = $_GET['destination'];
$price = str_replace('₹','',$_GET['price']);
$travelers = $_GET['travelers'];
$journey_date = $_GET['journey_date'];
$package = $_GET['package'];

// BASE PRICE × TRAVELERS

$base_total =
$price * $travelers;

// PACKAGE CALCULATION

$package = trim($package);

if($package == "Silver"){

    $extra_charge = 5;

}
elseif($package == "Gold"){

    $extra_charge = 10;

}
elseif($package == "Premium"){

    $extra_charge = 15;

}
else{

    $extra_charge = 0;

}

$final_price =
$base_total +
($base_total * $extra_charge / 100);

if(isset($_POST['pay'])){

    $payment_method = $_POST['payment_method'];

    $upi_id = $_POST['upi_id'];

    $card_number = $_POST['card_number'];

    $username = $_SESSION['user'];
    $email = $_SESSION['email'] ?? '';
    if (empty($email)) {
        $esc_username = mysqli_real_escape_string($conn, $username);
        $user_query = mysqli_query($conn, "SELECT email FROM users WHERE fullname = '$esc_username' LIMIT 1");
        if ($user_query && mysqli_num_rows($user_query) > 0) {
            $user_row = mysqli_fetch_assoc($user_query);
            $email = $user_row['email'];
            $_SESSION['email'] = $email;
        }
    }

    // BOOKING INSERT

    $booking_sql = "INSERT INTO bookings(
        username,
        email,
        destination,
        price,
        travelers,
        journey_date,
        package_type
    )

    VALUES(
        '$username',
        '$email',
        '$destination',
        '$final_price',
        '$travelers',
        '$journey_date',
        '$package'
    )";

    mysqli_query($conn,$booking_sql);

    // PAYMENT INSERT

    $payment_sql = "INSERT INTO payments(
        username,
        email,
        destination,
        package_type,
        payment_method,
        upi_id,
        card_number,
        amount,
        payment_status
    )

    VALUES(
        '$username',
        '$email',
        '$destination',
        '$package',
        '$payment_method',
        '$upi_id',
        '$card_number',
        '$final_price',
        'Success'
    )";

    mysqli_query($conn,$payment_sql);

   echo "<script>

alert('Payment Successful & Booking Confirmed');

window.location.href='invoice.php?username=" . urlencode($username) .

"&destination=" . urlencode($destination) .

"&package=" . urlencode($package) .

"&travelers=" . urlencode($travelers) .

"&journey_date=" . urlencode($journey_date) .

"&payment_method=" . urlencode($payment_method) .

"&amount=" . urlencode($final_price) .

"';

</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Payment</title>

<link rel="stylesheet" href="style.css">


</head>

<body>

<div class="payment-container">

<h2>Complete Payment</h2>

<form method="POST" onsubmit="return validatePaymentForm()">

<input type="text"
value="<?php echo $destination; ?>"
readonly>

<input type="text"
value="<?php echo $package; ?> Package"
readonly>

<input type="text"
value="₹<?php echo $final_price; ?>"
readonly>

<select
name="payment_method"
id="paymentMethod"
required
onchange="showPaymentMethod()">

<option value="">
Select Payment Method
</option>

<option value="UPI">
UPI ID
</option>

<option value="Debit Card">
Debit Card
</option>

<option value="QR Code UPI">
QR Code UPI
</option>

</select>

<!-- UPI -->

<div id="upiBox"
style="display:none;">

<input type="text"
name="upi_id"
id="upi_id"
placeholder="Enter UPI ID">

</div>

<!-- CARD -->

<div id="cardBox"
style="display:none;">

<input type="text"
name="card_number"
id="card_number"
placeholder="Enter Debit Card Number">

<input type="text"
id="card_expiry"
placeholder="MM/YY">

<input type="password"
id="card_cvv"
placeholder="CVV">

</div>

<!-- QR -->

<div class="qr-box"
id="qrBox"
style="display:none;">

<img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=TravelWorldPayment">

<p>Scan QR & Complete Payment</p>

</div>

<button type="submit"
name="pay"
class="btn">

Pay Now

</button>

</form>

</div>

<script>

function validatePaymentForm() {
    const method = document.getElementById("paymentMethod").value;
    if (method === "UPI") {
        const upiId = document.getElementById("upi_id").value.trim();
        if (upiId === "") {
            alert("Please enter your UPI ID.");
            return false;
        }
    } else if (method === "Debit Card") {
        const cardNum = document.getElementById("card_number").value.trim();
        const expiry = document.getElementById("card_expiry").value.trim();
        const cvv = document.getElementById("card_cvv").value.trim();
        if (cardNum === "") {
            alert("Please enter your Card Number.");
            return false;
        }
        if (expiry === "") {
            alert("Please enter the Card Expiry (MM/YY).");
            return false;
        }
        if (cvv === "") {
            alert("Please enter the CVV.");
            return false;
        }
    }
    return true;
}

function showPaymentMethod(){

    const method =
    document.getElementById(
        "paymentMethod"
    ).value;

    const upiBox = document.getElementById("upiBox");
    const cardBox = document.getElementById("cardBox");
    const qrBox = document.getElementById("qrBox");

    const upiInput = document.getElementById("upi_id");
    const cardInput = document.getElementById("card_number");
    const expiryInput = document.getElementById("card_expiry");
    const cvvInput = document.getElementById("card_cvv");

    upiBox.style.display = "none";
    cardBox.style.display = "none";
    qrBox.style.display = "none";

    upiInput.required = false;
    cardInput.required = false;
    expiryInput.required = false;
    cvvInput.required = false;

    if(method == "UPI"){
        upiBox.style.display = "block";
        upiInput.required = true;
    }

    if(method == "Debit Card"){
        cardBox.style.display = "block";
        cardInput.required = true;
        expiryInput.required = true;
        cvvInput.required = true;
    }

    if(method == "QR Code UPI"){
        qrBox.style.display = "block";
    }
}

</script>

</body>
</html>