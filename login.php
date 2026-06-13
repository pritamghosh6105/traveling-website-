<?php

session_start();

include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password'])){

            $_SESSION['user']=$user['fullname'];
            $_SESSION['email']=$user['email'];

            echo "<script>
            alert('Login Successful');
           window.location.href='dashboard.php';
            </script>";

        }else{
            echo "<script>
            alert('Wrong Password');
            window.location.href='auth.php';
            </script>";
        }

    }else{
        echo "<script>
        alert('User Not Found');
        window.location.href='auth.php';
        </script>";
    }

}
?>