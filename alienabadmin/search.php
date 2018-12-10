<?php
/**
 * Created by PhpStorm.
 * User: rashton
 * Date: 11/27/18
 * Time: 1:57 AM
 */

//search.php
//database connection info
include "dbinfo.php";
$search = $_POST[search];

//SQL statement to select what to search

$query = "select * from aliens_abduction
where email like '%$search%' or
      first_name like '%$search%' or 
      last_name like '%$search%' or 
      when_it_happened like '%$search%' or 
      how_long like '%$search%' or
      how_many like '%$search%' or
      alien_description like '%$search%' or
      what_they_did like '%$search%' or
      fluffy_spotted like '%$search%' or
      other like '%$search%'
order by id ASC";



// run sql statement
if ($result = mysqli_query($connection, $query)){
    // find out how many matches
    $count = mysqli_num_rows($result);
    $pageTitle="Search Results";
    include "alienab_admin.php";
print <<<HERE
<h2>Search Results</h2>
<h3>$count results found searching for "$search"</h3>
<table cellpadding="15">
HERE;
//loop through results and get variables
    while ($row=mysqli_fetch_array($result)){
        $id=$row["id"];
        $email=$row["email"];
        $first_name=$row["first_name"];
        $last_name=$row["last_name"];
        $when=$row["when_it_happened"];
        $how_long=$row["how_long"];
        $how_many=$row["how_many"];
        $alien_desc=$row["alien_description"];
        $what=$row["what_they_did"];
        $fluffy=$row["fluffy_spotted"];
        $other=$row["other"];

        print <<<HERE

  <ul>
    <li><strong>ID: $id</strong><br>
    </li>
    <li><strong>Name: $first_name $last_name</strong><br>
    </li>
    <li><strong>E-mail: $email</strong><br>
    </li>
    <li><strong>When it happened: $when</strong><br>
    </li>
    <li><strong>How long?: $how_long</strong><br>
    </li>
    <li><strong>How many?: $how_many</strong><br>
    </li>
    <li><strong>Description: $alien_desc</strong><br>
    </li>
     <li><strong>What they did: $what</strong><br>
    </li> 
    <li><strong>Other: $other</strong><br>
    </li>
</ul>
HERE;
    } //end while
}else{
    echo "There was a problem with the query.";
}
print "</tr></table></body></html>";
?>

