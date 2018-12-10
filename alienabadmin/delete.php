<?php
/**
 * Created by PhpStorm.
 * User: rashton
 * Date: 11/27/18
 * Time: 1:31 AM
 */

//reallydelete.php
//gets $id from deleteform.php
//finds matching id in database and deletes
//shows confirmation that record has been deleted

//connect to database
require "dbinfo.php";

if(isset( $_POST['reallydelete']) && $_POST['reallydelete'] == "really truly delete") {
    $id = $_POST['id'];

    //now delete the contact
$sql = "delete from aliens_abduction where id = '$id'";

if ($result = mysqli_query($connection, $sql)){
    $pageTitle = "Contact Deleted";
    include "alienab_admin.php";
    print  "<p>Record has been permanently deleted.</p>";

} //end if
    else {
        print "<h1>Something has gone wrong!</h1>";
    }
}//end if post

?>

