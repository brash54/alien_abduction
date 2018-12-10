<?php
/**
 * Created by PhpStorm.
 * User: rashton
 * Date: 11/27/18
 * Time: 1:08 AM
 */


require "dbinfo.php";
$sel_record = $_POST[sel_record];

//SQL statement to select information

$sql = "SELECT * FROM aliens_abduction where id = $sel_record";
   // execute SQL query and get result
if ($result = mysqli_query($connection, $sql)){


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
    $pageTitle = "Delete a Record";
    include "alienab_admin.php";


    print <<<HERE
<h2>Are you sure you want to delete this record?
It will be permanently removed:</h2>
<ul>
<li>ID: $id </li>
<li>Name: $fname $lname</li>
<li>E-mail: $email</li>
<li>When it happened: $when</li>
<li>How many?: $howMany</li>
<li>Description: $describe</li>
<li>What they did: $what</li>
<li>Other: $whatElse</li>
</ul>
<p><br />
<form method="post" action="delete.php">
<input type="hidden" name="id" value="$id">
<input type="submit" name="reallydelete" value="really truly delete" />
<input type="button" name="cancel" value="cancel"
onClick="location.href='viewsummary.php'" /></a>
</p></form>
HERE;
}//end if
else{
    print "<h1>Something has gone wrong!</h1>";
}// end else

?>