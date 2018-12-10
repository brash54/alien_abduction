<?php # Script lab3 - report.php
 $page_title = 'Alien Abduction Report';
    include('includes/header_2.html');
/**
 * Created by PhpStorm.
 * User: Wayne
 * Date: 10/5/2018
 * Time: 3:44 PM
 */

// define variables and set to empty values
$fname = $lname = $describe = $email = $fluffy = $howLong = $howMany = $what = $whatElse = $when = "";
$fnameErr = $lnameErr = $describeErr = $emailErr = $fluffyErr = $howLongErr = $howManyErr = $whatErr = $whatElseErr = $whenErr = "";

//get variables from form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

if (empty($_POST['fname'])) {
    // $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $fname = NULL;
    $fnameErr = "First Name is required";

}
if (preg_match("/^[a-zA-Z ]*$/",  ($_POST["fname"]))) {
    $fname = ($_POST["fname"]);
    } else {

    $fnameErr = "Only letters and white space are allowed";
    }


if (empty($_POST['lname'])) {
   //$lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $lname = NULL;
    $lnameErr = "Last Name is required";
}

    if (preg_match("/^[a-zA-Z ]*$/",  ($_POST["lname"]))) {
        $lname = ($_POST["lname"]);
    } else {

        $lnameErr = "Only letters and white space are allowed";
    }

if (!empty($_POST['email'])) {
    
    
    //$to = $_POST['email'];
    
    if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) {
    $emailErr = "Email is not valid";
}
    else {
        $email = $_POST['email'];
    }
}
else {
    $email = NULL;
    $emailErr = "email is required";
}
    

if (!empty($_POST['when'])) {
    $when = $_POST['when'];
}
else {
    $when = NULL;
    $whenErr = "Please report when you were abducted!";
}

if (!empty($_POST['howMany'])) {
    $howMany = $_POST['howMany'];
}
else {
    $howMany = NULL;
    $howManyErr = "Please report how many aliens you saw!";
}

if (!empty($_POST['howLong'])) {
    $howLong = $_POST['howLong'];
}
else {
    $howLong = NULL;
    $howLongErr = "Please report how long you were abducted for!";
}

if (!empty($_POST['describe'])) {
    $describe = $_POST['describe'];
}
else {
    $describe = NULL; 
    $describeErr = "Please describe the aliens who abducted you!";
}

if (!empty($_POST['what'])) {
    $what = $_POST['what'];
}
else {
    $what = NULL;
    $whatErr = "Please describe what the aliens did to you!";
}

if (isset($_POST['fluffy'])) {
   $fluffy = filter_input(INPUT_POST, "fluffy", FILTER_SANITIZE_STRING);  
}
else {
    $fluffy = NULL;
    $fluffyErr = "Please report whether or not you've seen Fluffy!";
}

if (!empty($_POST['whatElse'])) {
    $whatElse = $_POST['whatElse'];
}
else {
    $whatElse = NULL;
    $whatElseErr = "Please report what else happened when the aliens abducted you!";
}
}// END IF


?>
<!-- end php script -->
<html>
<h1>Aliens Abducted Me - Report an Abduction</h1>
<h3>Share your story of alien abduction:</h3>
<form id="alienAbForm" action="myform.php" method="post" novalidate>
    <div>
        <label for="fname">*First name:</label>
        <input type="text" name="fname" id="fname" placeholder="first name" value="<?php if (isset($_POST['fname'])) echo $_POST['fname'];  ?>">
        <span class="error"> <?php echo $fnameErr;?></span>
    </div>

    <div>
        <label for="lname">*Last name:</label>
        <input type="text" name="lname" id="lname" placeholder="last name" value="<?php if (isset($_POST['lname'])) echo $_POST['lname'];  ?>">
        <span class="error"> <?php echo $lnameErr;?></span>
    </div>
    <div>
        <label for="email">*What is your email address?</label>
        <input type="email" name="email" id="email" placeholder="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];  ?>">
        <span class="error"> <?php echo $emailErr;?></span>
    </div>


    <div>
        <label for="when">When did it happen?</label>
        <input type="date" name="when" id="when" value="<?php if (isset($_POST['when'])) echo $_POST['when'];  ?>">
        <span class="error"> <?php echo $whenErr;?></span>
    </div>

    <div>
        <label for="howLong">How long were you gone?</label>
        <input type="text" name="howLong" id="howLong" placeholder="hours, days, years?" value="<?php if (isset($_POST['howLong'])) echo $_POST['howLong'];  ?>">
        <span class="error"> <?php echo $howLongErr;?></span>
    </div>
    <div>
        <label for="howMany">How many did you see?</label>
        <input type="number" name="howMany" id="howMany" placeholder="enter a number" value="<?php if (isset($_POST['howMany'])) echo $_POST['howMany'];  ?>">
        <span class="error"> <?php echo $howManyErr;?></span>
    </div>

    <section>
        <div>
            <label for="describe">Describe them:</label>
            <input type="text" name="describe" id="describe" placeholder="what did they look like?" value="<?php if (isset($_POST['describe'])) echo $_POST['describe'];  ?>">
            <span class="error"> <?php echo $describeErr;?></span>
        </div>

        <div>
            <label for="what">What did they do to you?</label>
            <input type="text" name="what" id="what" placeholder="describe what they did" value="<?php if (isset($_POST['what'])) echo $_POST['what'];  ?>">
            <span class="error"> <?php echo $whatErr;?></span>
        </div>
    </section>
    <p>*Have you seen my dog Fluffy?
        <label class="alignbutton">
            Yes<input name="fluffy" type="radio" value="yes" id="sighted_0" <?php if (isset($_POST['fluffy']) and $_POST['fluffy'] == 'yes') echo ' checked'; ?>>
        </label>
        <label>
            No<input name="fluffy" type="radio"  value="no" id="sighted_1" <?php if (isset($_POST['fluffy']) and $_POST['fluffy'] == 'no') echo ' checked'; ?>>
        </label>
        <span class="error"> <?php echo $fluffyErr;?></span>
    </p>


    <img src="images/fluffy.png" alt="Picture of three-headed dog named Fluffy" id="pic">
    <p>*Required Fields</p>
    <p class="alignTA">
        <label for="whatElse">Anything else you want to add?</label>
        <textarea name="whatElse" id="whatElse" cols="20" rows="2" placeholder="your comments..."><?php if (isset($_POST['whatElse'])) {echo htmlentities($_POST['whatElse'], ENT_QUOTES);} ?></textarea>
        <span class="error"> <?php echo $whatElseErr;?></span>
    </p>
    <div>
        <input type="submit"  value="Report Abduction" id="submit">
    </div>
</form>

<script>
    function viewReport() {
        var elmnt = document.getElementById("yourInput");
        elmnt.style.display = "block";
        elmnt.scrollIntoView();

    }
</script>

<h2  id="yourInput">Your Alien Abduction Report:</h2>

</html>

<?php
//display an output message to user
if ((!empty($fname)) && (!empty($lname)) && (!empty($email)) &&  (!empty($when)) && (!empty($howMany)) && (!empty($howLong))
    && (!empty($describe))  && (!empty($what))  && (!empty($fluffy))  && (!empty($whatElse))) {
    print "<p>Thanks for submitting the form $fname $lname.</p>";
    print "<p>You were abducted on $when and gone for $howLong.</p>";
    print "<p>You said there were $howMany of them.</p>";
    print "<p>And they $what.</p>";
    print "<p>You described them as: $describe.</p>";
    print "<p>Did you see Fluffy? You answered: $fluffy.</p>";
    print "<p>Your other comments were: $whatElse.</p>";
    print "<p>We will contact you at $email if we have any relevant news.</p>";
}
?>
<script type="text/javascript">
    viewReport();
</script>
