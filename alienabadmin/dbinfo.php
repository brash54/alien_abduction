<?php
//database connection information
$host="localhost";
//$user="P00633966";
//$password="Poo633966#";
//$database="P00633966";
//local credentials
$user="rashton";
$password="nuPot83";
$database="p00633966a";

$connection = @mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_error()){
    die('Connect Error: ' . mysqli_connect_error());
} else {
    echo 'Successful connection to database';
}
?>


