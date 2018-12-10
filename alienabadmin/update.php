<?php
include "alienab_admin.php";


//update.php


//clean and sanitize the incoming data
if(isset($_POST['submit'])=="submit" && $_POST['submit']=="Modify Record") {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
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

    echo "$id, $fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse";

    validateUpdateForm($id, $fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse);

}// end if

function validateUpdateForm($id, $fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse) {
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
        include('updateform.php');
        exit();
    }else{
        modData($id, $fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse);
    }
}//end validateForm

//create a safe sql query
function modData($id, $fname, $lname, $email, $when, $howLong, $howMany, $describe, $what, $fluffy, $whatElse)
{
    //connect to the database
    require "dbinfo.php";

    $modQuery = "update aliens_abduction set
email = '$email',
first_name = '$fname',
last_name = '$lname',
when_it_happened = '$when',
how_long = '$howLong',
how_many  = '$howMany',
alien_description = '$describe',  
what_they_did =  '$what',
fluffy_spotted = '$fluffy',
other = '$whatElse'                     
where id = '$id' ";

    if ($result = mysqli_query($connection, $modQuery)) {
        //show confirmation
        print "<html><head><title>Update Results</title></head><body>";
        $pageTitle = "Record Updated";

        print <<<HERE
    <h1>The updated record looks like this: </h1>
    <p><strong>First:</strong> $fname</p>
    <p><strong>Last:</strong> $lname</p>
    <p><strong>E-mail:</strong> $email</p>
    <p><strong>Abduction Date:</strong> $when</p>
    <p><strong>Length of Abduction:</strong> $howLong</p>
    <p><strong>Number of aliens:</strong> $howMany</p>
    <p><strong>Description of alien(s):</strong> $describe</p>
    <p><strong>What happened:</strong> $what</p>
    <p><strong>Was Fluffy seen:</strong> $fluffy</p>
    <p><strong>What else happened:</strong> $whatElse</p>
HERE;
    } else {
        print "<h1>Something has gone wrong!</h1>";
        exit();
    }//end else
}

?>