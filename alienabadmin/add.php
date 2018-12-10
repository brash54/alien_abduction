<?php

include "alienab_admin.php";
//clean and sanitize the incoming data


if($_POST['submit']==$_POST['submit']) {
//if(isset($_POST['submit'])=="submit" && $_POST['submit']=="Submit"){
    //if($_POST['submit']=="Submit") {
//if(isset($_POST['submit'])=="Submit"){
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $when = filter_var($_POST['when'], FILTER_SANITIZE_STRING);
    $howLong = filter_var($_POST['howLong'], FILTER_SANITIZE_STRING);
    $howMany = filter_var($_POST['howMany'], FILTER_SANITIZE_NUMBER_INT);
    $describe = filter_var($_POST['describe'], FILTER_SANITIZE_STRING);
    $what = filter_var($_POST['what'], FILTER_SANITIZE_STRING);
    $whatElse = filter_var($_POST['whatElse'], FILTER_SANITIZE_STRING);
    $fluffy = filter_var($_POST['fluffy'], FILTER_SANITIZE_STRING);


//check to see if your required fields are setup

   validateForm($fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse);
    }

function validateForm($fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse) {
//your code to check and see if things are empty, regular expressions, etc.

echo "checking the form...";
if($fname == NULL)
$fnameErr = "First Name is required";

if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
    $fnameErr = "Only letters and white space are allowed";
    }

if($lname == NULL)
$lnameErr = "Last Name is required";

if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
    $lnameErr = "Only letters and white space are allowed";
    }

if($email == NULL)
$emailErr = "Email address is required";

if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) {
    $emailErr = "Email is not valid";
    }

if (empty($fluffy))
    $fluffyErr = "Please indicate whether or not Fluffy was seen!";

if($fnameErr != '' ||  $lnameErr != '' || $emailErr != '' || $fluffyErr != '') {
include('addform.php');
exit();
}else{
 addData($fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse);
}
}//end validateForm



//add the entries to the alien_abduction database
function addData($fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse) {
// make connection to database
    require "dbinfo.php";

// setup a safe query

    $query = "Insert INTO aliens_abduction VALUES (NULL, '$fname','$lname','$email', '$when', '$howLong' , '$howMany', '$describe','$what','$fluffy', '$whatElse')";

// run the query
    if ($result = mysqli_query($connection, $query)) {

        //show confirmation

        echo "Record added: $fname, $lname, $email, $when, $howMany, $howLong, $describe, $what, $fluffy, $whatElse<br>";
    } else {
        echo "Unable to add record.";
    }
}//end addData


?>
