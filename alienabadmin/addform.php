<?php # Script addform.php
 $page_title = 'Enter Alien  Record';

/**
 * Created by PhpStorm.
 * User: Wayne
 * Date: 10/5/2018
 * Time: 3:44 PM
 */

//set default value of variables for initial page load
if (!isset($fnameErr)) {$fnameErr = ''; }
if (!isset($fname)) {$fname = ''; }
if (!isset($lnameErr)) {$lnameErr = ''; }
if (!isset($lname)) {$lname = ''; }
if (!isset($emailErr)) {$emailErr = ''; }
if (!isset($email)) {$email = ''; }
if (!isset($whenErr)) {$whenErr = ''; }
if (!isset($when)) {$when = ''; }
if (!isset($howLongErr)) {$howLongErr = ''; }
if (!isset($howLong)) {$howLong = ''; }
if (!isset($howManyErr)) {$howManyErr = ''; }
if (!isset($howMany)) {$howMany = ''; }
if (!isset($whatErr)) {$whatErr = ''; }
if (!isset($what)) {$what = ''; }
if (!isset($describeErr)) {$describeErr = ''; }
if (!isset($describe)) {$describe = ''; }
if (!isset($fluffyErr)) {$fluffyErr = ''; }
if (!isset($fluffy)) {$fluffy = ''; }
if (!isset($whatElseErr)) {$whatElseErr = ''; }
if (!isset($whatElse)) {$whatElse = ''; }

include('alienab_admin.php');
print <<<HERE

<h1>Enter Alien Abduction Reports</h1>


<form action="add.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="fname">*First name:</label>
        <input type="text" name="fname" id="fname" placeholder="first name" value="$fname">  <span>$fnameErr</span>
    </div>

    <div>
        <label for="lname">*Last name:</label>
        <input type="text" name="lname" id="lname" placeholder="last name" value="$lname">  <span>$lnameErr</span>
    </div>
    <div>
        <label for="email">*Email address:</label>
        <input type="email" name="email" id="email" placeholder="email" value="$email">  <span>$emailErr</span>
    </div>
    <div>
        <label for="when">When did it happen?:</label>
        <input type="date" name="when" id="when" value="$when">  <span>$whenErr</span>
    </div>

    <div>
        <label for="howLong">How long was abductee gone?:</label>
        <input type="text" name="howLong" id="howLong" placeholder="hours, days, years?" value="$howLong">  <span>$howLongErr</span>
    </div>
    <div>
        <label for="howMany">Number of aliens seen:</label>
        <input type="number" name="howMany" id="howMany" placeholder="enter a number" value="$howMany">  <span>$howManyErr</span>
    </div>
        <div>
            <label for="describe">Description of alien(s):</label>
            <input type="text" name="describe" id="describe" placeholder="what did they look like?" value="$describe">  <span>$describeErr</span>
        </div>

        <div>
            <label for="what">What alien(s) did to abductee:</label>
            <input type="text" name="what" id="what" placeholder="describe what they did" value="$what"> <span>$whatErr</span>
        </div>
    <div>
     <label>*Was Fluffy seen?</label>
    <section>
    
          Yes <input type="radio" name="fluffy"  value="yes" id="sighted_0"><br> 
          No <input  type="radio" name="fluffy"  value="no" id="sighted_1"> <span>$fluffyErr</span>
    </section> 
    </div>

<div>

   <label for="whatElse">Other comments from abductee:</label>
        <textarea name="whatElse" id="whatElse" cols="20" rows="2" placeholder="other comments..."></textarea>
</div>
    
    <div id="mySubmit">
        <input type="submit" id="submit" value="Submit">
    </div>
    
   <div>*Required Fields</div>

</form>



HERE;

//var_dump($GLOBALS);

//echo $_POST['submit'],$_POST[fname], $_POST[lname] ,$_POST[email] , $_POST[when] , $_POST[howLong] , $_POST[howMany], $_POST[what], $_POST[describe], $_POST[fluffy], $_POST[whatElse]        ;
?>