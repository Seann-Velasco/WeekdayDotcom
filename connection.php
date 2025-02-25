<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "database_4";

    $conn = new mysqli($servername, $username, $password, $db_name, 3306);

    if($conn->connect_error) {
        die("connection failed".$conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($db_name);
    } else {
        die("Error creating database: " . $conn->error);
    }

    $account_table = "CREATE TABLE IF NOT EXISTS login (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL 
    )";

    if ($conn->query($account_table) === TRUE) {
    } else {
        die("Error creating table: ". $conn->error);
    }

    $check_user_sql = "SELECT * FROM login WHERE username = 'admin'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows == 0) {
        $password = 'ismaelvelascojose';
        $insert_sql = "INSERT INTO login (username, password) VALUES ('admin', '$password')";
        
        if ($conn->query($insert_sql) === TRUE) {
        } else {
            echo "Error inserting admin user: " . $conn->error;
        }
    }

    $finance_table = "CREATE TABLE IF NOT EXISTS finance (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        month VARCHAR(50) NOT NULL,
        budget INT NOT NULL,
        expenses INT NOT NULL 
    )";

    if ($conn->query($finance_table) === TRUE) {
    } else {
        die("Error creating table: ". $conn->error);
    }
    
    $month = "December";
    $budget = 10000;
    $expenses = 2500;

	$Query = $conn->prepare("INSERT INTO finance (month, budget, expenses) VALUES (?, ?, ?)");
        $Query->bind_param("sii", $month, $budget, $expenses);

        if ($Query->execute()) {
        } else {
            echo "Error: " . $Query->error;
        }     
?>