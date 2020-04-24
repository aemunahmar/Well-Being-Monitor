<?php
    session_start();

    include('dbconnect.php');

    if(isset($_SESSION['doctorid']))
    {
        $id = $_SESSION['doctorid'];
    }

    $patientid = filter_input(INPUT_POST, 'patientid');
    $doctorid = $id;
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $dob = filter_input(INPUT_POST, 'birthday');
    $age = filter_input(INPUT_POST, 'age');
    $height = filter_input(INPUT_POST, 'height');
    $weight = filter_input(INPUT_POST, 'weight');
    $allergies = filter_input(INPUT_POST, 'allergies');
    $medication = filter_input(INPUT_POST, 'medication');
    $address = filter_input(INPUT_POST, 'address');
    $email = filter_input(INPUT_POST, 'email');
    $cellphone = filter_input(INPUT_POST, 'phone');
    $gender = filter_input(INPUT_POST, 'gender');

    $sql = "INSERT INTO healthrecord (patientid, doctorid, fname, lname, birthday, age, height, weight, allergies, medication, address, email, phone, gender)
    VALUES ('$patientid', '$doctorid', '$fname', '$lname', '$dob', '$age', '$height', '$weight', '$allergies', '$medication', '$address', '$email', '$cellphone', '$gender')";

    if ($dbconnect->query($sql) === TRUE) 
    {
        header('Location: view_patients.html');
        //echo "patient added";
    } else 
    {
        header('Location: add_patients.html');
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
    }
    $dbconnect->close();
?>