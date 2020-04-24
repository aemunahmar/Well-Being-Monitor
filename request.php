<?php
    session_start();

    include('dbconnect.php');

    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
    }

    if(isset($_SESSION['name']))
    {
        $email = $_SESSION['name'];
    }

    if(isset($_SESSION['patientid']))
    {
       $id = $_SESSION['patientid'];
    }

    $query = "SELECT * FROM patients WHERE patientid = '$id'";
    $output = $dbconnect->query($query);

    if($output->num_rows != 0)
    {
        while($result = mysqli_fetch_assoc($output)) 
        {
            $doctorid = $result['doctorid'];
            $lname = $result['lname'];
            $fname = $result['fname'];
        } 
        
        $sql = "INSERT INTO access (patientid, doctorid, email, fname, lname, request, granted)
        VALUES ('$id', '$doctorid', '$email', '$fname', '$lname', true, false)";

        if ($dbconnect->query($sql) === TRUE) 
        {
            //echo "Awesome";
            header('Location: myaccount.html');
        } else 
        {
            //echo "Something went wrong" . "<br>" . $dbconnect->error;
            header('Location: index.html');
        }
    } else
    { 
        echo "Patient Not Found";
    } 

    $dbconnect->close();
?>