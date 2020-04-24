<?php
session_start();

include('dbconnect.php');

if (isset($_POST['email']) and isset($_POST['password']))
{
    //Assigning posted values to variables.
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //Checking if the values exist in the database or not
    $query = "SELECT * FROM patients WHERE email='$email' and password='$password'";

    $result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
    $count = mysqli_num_rows($result);
    $row  = mysqli_fetch_array($result);
    
    //If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1)
    {
        $_SESSION['email'] = $email;
        if(is_array($row))
        {
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['patientid'] = $row['patientid'];
        } 
    } else
    {
        //If the login credentials doesn't match, reload the page
        header("Location: patient.html");
    }
}

//If the user is logged go to account dashboard
if (isset($_SESSION['email']))
{
    header("Location: myaccount.html");
}
?>