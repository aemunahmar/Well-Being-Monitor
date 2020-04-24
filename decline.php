<?php
    session_start();
    
    include('dbconnect.php');

    if(isset($_SESSION['pharmacistid']))
    {
        $pharmID = $_SESSION['pharmacistid'];
    }

    $patientid = filter_input(INPUT_POST, 'patientid');
    $doctorid = filter_input(INPUT_POST, 'doctorid');
    $lname = filter_input(INPUT_POST, 'lname');
    $fname = filter_input(INPUT_POST, 'fname');
    $insurance = filter_input(INPUT_POST, 'insurance');
    $date = filter_input(INPUT_POST, 'date');
    $medicine = filter_input(INPUT_POST, 'medicine');
    $medication = filter_input(INPUT_POST, 'medication');
    $cause = filter_input(INPUT_POST, 'cause');
    $strength = filter_input(INPUT_POST, 'strength');
    $dosage = filter_input(INPUT_POST, 'dosage');
    $allergies = filter_input(INPUT_POST, 'allergies');
    $notes = filter_input(INPUT_POST, 'notes');


    $patientid = $_GET['PID'];

    $sql = "INSERT INTO decline (patientid, doctorid, lname, fname, insurance, date, medicine, medication, cause, strength, dosage, allergies, notes) SELECT patientid, doctorid, lname, fname, insurance, date, medicine, medication, cause, strength, dosage, allergies, notes FROM prescription WHERE patientid = $patientid";
    $sql2 = "DELETE FROM prescription WHERE patientid = $patientid";
    $sql3 = "UPDATE decline SET pharmacistid='$pharmID' WHERE patientid = $patientid";

    //result = query 1 output = query 2
    if (($dbconnect->query($sql) === TRUE) && ($dbconnect->query($sql2) === TRUE) && ($dbconnect->query($sql3) === TRUE)) 
    {
        header ('Location: prescription_list.html');
        //echo "Prescription for patient: " . $patientid. " has been declined.";
    } else 
    {
        //echo "Try Again -_-" . "<br>" . $dbconnect->error;
        header('Location: pharmacyaccount.html');
    }
    $dbconnect->close();
?>