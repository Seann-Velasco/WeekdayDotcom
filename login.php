<?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from login where username = '$username' and password = '$password'";

        echo $sql;
        
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if ($count == 1){
            header("Location: Dashboard_Page1.php");
        } else {
            echo '<script> 
            window.location.href = "Login_Page.php";
            alert("Login Failed, Invalid username or password.");
            </script>';
        }

    }
?>