<?php
    include('dbconnect.php');

    $sql = "UPDATE healthrecord SET doctorid='$_POST[doctorid]', fname='$_POST[fname]', lname='$_POST[lname]', birthday='$_POST[birthday]', age='$_POST[age]', height='$_POST[height]', weight='$_POST[weight]', allergies='$_POST[allergies]', medication='$_POST[medication]', address='$_POST[address]', phone='$_POST[phone]', email='$_POST[email]', gender='$_POST[gender]' WHERE patientid='$_POST[patientid]'";
    
    $output = $dbconnect->query($sql);

    if ($dbconnect->query($sql) === TRUE) {
        header('Location: view_patients.html');
    } else {
        header('Location: doctoraccount.html');
    }
?>