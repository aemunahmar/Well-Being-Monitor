<?php
    session_start();

    include('dbconnect.php');

    $patientid = filter_input(INPUT_POST, 'patientid');
    $doctorid = filter_input(INPUT_POST, 'doctorid');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $insurance = filter_input(INPUT_POST, 'insurance');
    $date = filter_input(INPUT_POST, 'date');
    $medicine = filter_input(INPUT_POST, 'medicine');
    $medication = filter_input(INPUT_POST, 'medication');
    $cause = filter_input(INPUT_POST, 'cause');
    $strength = filter_input(INPUT_POST, 'strength');
    $dosage = filter_input(INPUT_POST, 'dosage');
    $allergies = filter_input(INPUT_POST, 'allergies');
    $notes = filter_input(INPUT_POST, 'notes');

    $sql = "INSERT INTO prescription (patientid, doctorid, fname, lname, insurance, date, medicine, medication, cause, strength, dosage, allergies, notes)
    VALUES ('$patientid', '$doctorid', '$fname', '$lname', '$insurance', '$date', '$medicine', '$medication', '$cause', '$strength', '$dosage', '$allergies', '$notes')";
    $sql2 = "DELETE FROM decline WHERE patientid = $patientid";

    if (($dbconnect->query($sql) === TRUE) && ($dbconnect->query($sql2) === TRUE)) 
    {
        //echo "Prescription has been sent.";
        header('Location: display_patients.html');
    } else 
    {
        //echo "Try Again -_-" . "<br>" . $dbconnect->error;
        header('Location: doctoraccount.html');
    }
    $dbconnect->close();
?>
