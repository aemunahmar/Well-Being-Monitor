<?php
    // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "hrsystem");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 
?>