<?php
    session_start();

    include('dbconnect.php');

    $doctorcode = filter_input(INPUT_POST, 'doctorcode');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    //Custom ID code
    function generatePIN($digits = 6){
        $i = 0; //counter
        $pin = ""; //the default pin is blank
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(1, 9);
            $i++;
        }
        return $pin;
    }

    //For a 5-digit PIN code.
    $pin = generatePIN();

    $query = "SELECT * FROM doctors WHERE doctorcode = '$doctorcode'";
    $output = $dbconnect->query($query);

    if($output->num_rows != 0)
    {
        while($result = mysqli_fetch_assoc($output)) 
        {
            $code = $result['doctorcode'];
            $id = $result['doctorid'];
        }
        
        if(isset($code) && $code == $doctorcode)
        {
            $sql = "INSERT INTO patients (patientid, doctorid, fname, lname, email, password)
            VALUES ('$pin', '$id', '$fname', '$lname', '$email', '$password')";

            $email = $_POST['email'];
            $name = $_POST['fname'];

            if ($dbconnect->query($sql) === TRUE) 
            {
                $_SESSION['name'] = $email;
                $_SESSION['fname'] = $name;
                $_SESSION['patientid'] = $pin;
                header('Location: myaccount.html');
            } else {
                //echo "Something went wrong" . "<br>" . $dbconnect->error;
                header('Location: register.html');
            }
            $dbconnect->close();
        }
    } else
    {
        //echo "Wrong Code" . "<br>" . $dbconnect->error;
        header('Location: register.html');
    }     
?>