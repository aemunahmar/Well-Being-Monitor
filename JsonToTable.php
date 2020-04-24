<?php
    // Create connection
    include('dbconnect.php');

    //Read the JSON file
    $jsondata = file_get_contents('doctorlist.json');
    $jsondata2 = file_get_contents('pharmacistlist.json');

    if(isset($jsondata))  
    {
        //Decode JSON data
        $data = json_decode((utf8_encode($jsondata)), true);
        var_dump($data);

        //Insert json data to database
        if(is_array($data))
        {
            echo "is array";
            foreach($data as $row)
            {
                //Fetch details of product
                $id = $row['doctorid'];
                $code = $row['doctorcode'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $password = $row['password'];

                //Inserting fetched data
                $query = "INSERT INTO doctors (doctorid, doctorcode, fname, lname, password) VALUES ('$id', '$code', '$fname', '$lname', '$password')";

                if(!(mysqli_query($dbconnect, $query))) 
                { 
                    die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($dbconnect)); 
                } else
                { 
                    echo "Data Inserted Successully!!!"; 
                }
            }
        }else
        {
            echo "not array";
        }
    }

    if(isset($jsondata2))  
    {
        //Decode JSON data
        $data = json_decode((utf8_encode($jsondata2)), true);
        var_dump($data);

        //Insert json data to database
        if(is_array($data))
        {
            echo "is array";
            foreach($data as $row)
            {
                //Fetch details of product
                $id = $row['pharmacistid'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $password = $row['password'];

                //Inserting fetched data
                $query = "INSERT INTO pharmacists (pharmacistid, fname, lname, password) VALUES ('$id', '$fname', '$lname', '$password')";

                if(!(mysqli_query($dbconnect, $query))) 
                { 
                    die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($dbconnect)); 
                } else
                { 
                    echo "Data Inserted Successully!!!"; 
                }
            }
        }else
        {
            echo "not array";
        }
    }
?>