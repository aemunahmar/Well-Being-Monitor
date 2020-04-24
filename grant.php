<?php
    session_start();

    include('dbconnect.php');
    
    $patientid = $_GET['PID'];
    $sql = "UPDATE access SET granted=true WHERE patientid='$patientid'";
    
    $output = $dbconnect->query($sql);

    if ($dbconnect->query($sql) === TRUE) 
    {
        //echo "Access Granted";
        header('Location: grantaccess.html');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: grantaccess.html');
    }

?>