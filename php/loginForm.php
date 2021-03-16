<?php
        session_start();
        $_SESSION['loggedin'] = 0;
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'gindra' && $password == 'car') {
                $_SESSION['loggedin'] = 1;
                header("Location: http://localhost");
        }
        else
                header("Location: http://localhost/login.php");
?>