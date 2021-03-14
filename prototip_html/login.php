<?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'gindra' && $password == 'car')
                include("index_loggedin.html");
        else
                include("login.html");
?>