<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "motorglaze";

    // create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    #var_dump($conn);
    
    if ($conn->errno > 0) {
        if (DEBUG) {
            logToJS("Mysql connection error: ".$conn->error);
        }
        exit;
    } 
    
?>