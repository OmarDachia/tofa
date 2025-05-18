<?php
    $server = "localhost"; //127.0.0.1
    $username = "root";
    $password = "";
    $db_name = "tofal_db";

    $conn = new mysqli($server, $username, $password);

    if($conn->connect_error){
        die("Connection Error:".$conn->connect_error);
    }

    // echo "Connection Successfully!<br>";

    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    
    if($conn->query($sql) === TRUE){
        // echo "<br>$db_name Created Successfully!";

        if($conn->connect_error)
        {
            die("Connection Error:".$conn->connect_error);
        }
        else{
            // echo "<br>Connected to $db_name Successfully!";
            $conn->select_db($db_name);
        }
    }
    else{
        echo "Error Creating Database: ".$conn->error;
    }
?>
