<?php

include 'db.php';

if(isset($_POST['book'])){

    $username = $_POST['username'];
    $destination = $_POST['destination'];
    $travelers = $_POST['travelers'];
    $journey_date = $_POST['journey_date'];
    $package = $_POST['package'];
    $price = $_POST['price'];

$sql = "INSERT INTO bookings(
    username,
    destination,
    price,
    travelers,
    journey_date,
    package_type
)

VALUES(
    '$username',
    '$destination',
    '$price',
    '$travelers',
    '$journey_date',
    '$package'
)";


    if(mysqli_query($conn,$sql)){

        echo "<script>
        alert('Booking Confirmed');
        window.location.href='index.php';
        </script>";

    }

}
?>