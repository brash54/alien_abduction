<?php
/**
 * Created by PhpStorm.
 * User: rashton
 * Date: 11/26/18
 * Time: 9:52 PM
 */


//updateform.php
//connect to the database
require "dbinfo.php";
$sel_record = $_POST['sel_record'];

//SQL statement to select record to edit
$query = "select * from aliens_abduction where id = $sel_record";

// execute SQL query and get result
if ($result = mysqli_query($connection, $query)) {


//loop to get all the records
    while ($record = mysqli_fetch_array($result)) {
        $id = $record['id'];
        $email = $record['email'];
        $fname = $record['first_name'];
        $lname = $record['last_name'];
        $when = $record['when_it_happened'];
        $howLong = $record['how_long'];
        $howMany = $record['how_many'];
        $describe = $record['alien_description'];
        $what = $record['what_they_did'];
        $fluffy = $record['fluffy_spotted'];
        $whatElse = $record['other'];
    } //end while


} else {
    print "<h1>Something has gone wrong!</h1>";
}


$pageTitle = "Edit an Alien Abduction Record ";
include "alienab_admin.php";

print <<<HERE
	<h1>Update this Record</h1>
    <p>Change the values in the text boxes as needed then click the "Modify Record" button.</p>

	<form method="POST" action = "update.php" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="$id">
	<div>
	    <label for="fname">*First name:</label>
	    <input type="text" name="fname" id="fname" value="$fname"> <span>$fnameErr</span>
	</div>
	<div>
	    <label for="lname">*Last name:</label>
	    <input type="text" name="lname" id="lname" value="$lname"> <span>$lnameErr</span>
	</div>
	<div>
	    <label for="email">*Email address:</label>
	    <input type="text" name="email" id="email" value="$email"> <span>$emailErr</span>
	</div>
	<div>
	    <label for="when">When did it happen?:</label>
	    <input type="text" name="when" id="when" value="$when"><span>$whenErr</span>
	</div>
	<div>
	    <label for="howLong">How long was abductee gone?:</label>
	    <input type="text" name="howLong" id="howLong" value="$howLong"><span>$howLongErr</span>
	</div>
	<div>
	    <label for="howMany">Number of aliens seen:</label>
	    <input type="text" name="howMany" id="howMany" value="$howMany"><span>$howManyErr</span>
	</div>
	<div>
	    <label for="describe">Description of alien(s):</label>
	    <input type="text" name="describe" id="describe" value="$describe"><span>$describeErr</span>
	</div>
	<div>
	    <label for="what">What alien(s) did to abductee:</label>
	    <input type="text" name="what" id="what" value="$what"><span>$whatErr</span>
	</div>
	<div>
     <label>*Was Fluffy seen?</label>
    <section>
    
          Yes <input type="radio" name="fluffy"  value="yes" id="sighted_0" ><br>
          No <input  type="radio" name="fluffy"  value="no" id="sighted_1" ><span>$fluffyErr</span>
    </section>
       
    </div>
	<div>
	    <label for="whatElse">Other comments from abductee:</label>
        <textarea name="whatElse" id="whatElse" cols="20" rows="2" >"$whatElse"</textarea>
	</div>
	<div id="mySubmit">
	    <input type="submit" name="submit" value="Modify Record">
	</div>
	
<div>*Required Fields</div>
</form>
HERE;
 if ($fluffy == 'yes') {
     echo '<script type = "text/javascript" >
     document . getElementById("sighted_0") . checked = true;
</script >';
}
if ($fluffy == 'no') {
    echo '<script type = "text/javascript" >
     document . getElementById("sighted_1") . checked = true;
</script >';
}
?>

