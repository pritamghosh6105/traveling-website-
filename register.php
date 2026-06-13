<?php

include 'db.php';

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users(fullname,email,password,phone)
    VALUES('$fullname','$email','$password','$phone')";

    if(mysqli_query($conn,$sql)){
        echo "<script>
        alert('Registration Successful');
        window.location.href='index.php';
        </script>";
    }

}
?>