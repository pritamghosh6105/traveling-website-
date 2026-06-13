<?php

include 'db.php';

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts(name,email,message)
    VALUES('$name','$email','$message')";

    if(mysqli_query($conn,$sql)){

        echo "<script>
        alert('Message Sent');
        window.location.href='index.php';
        </script>";

    }

}
?>