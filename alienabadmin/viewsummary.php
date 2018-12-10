<?php
//1.  make connection to database
require "dbinfo.php";

include("alienab_admin.php");

echo"<h1>Summary of all Reported Alien Abductions</h1>";

//2. setup safe query
$query = "SELECT * FROM aliens_abduction order by id ASC";

//3. run the query

if ($result = mysqli_query($connection, $query)){

	//4. read the results

	print <<<HERE


<table  id="home">
<tr>
	<th>Action</th>
	<th>Id</th>
	<th>Name</th>
	<th>Email</th>
	<th>When it Happened</th>
</tr>
<tr>
HERE;
		//loop to get all the records
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$id=$row[id];
			$email=$row[email];
			$first_name=$row[first_name];
			$last_name=$row[last_name];
			$when=$row[when_it_happened];
			$how_long=$row[how_long];
            $how_many=$row[how_many];
            $alien_desc=$row[alien_description];
            $what=$row[what_they_did];
            $fluffy=$row[fluffy_spotted];
            $other=$row[other];

		    print <<<HERE
		    
    <td>
    <form method="post" action="deleteform.php">
    <input type="hidden" name="sel_record" value="$id">
    <input type="submit" name="delete" value=" Delete ">
</form><br>

    <form method="post" action="updateform.php">
    <input type="hidden" name="sel_record" value="$id">
    <input type="submit" name="update" value=" Edit ">
</form>
    </td>
  

    
    
    <td><strong>$id</strong><br>
    </td>
    <td><strong>$first_name $last_name</strong><br>
    </td>
    <td><strong>$email</strong><br>
    </td>
    <td><strong>$when</strong><br>
    </td>
</tr>
HERE;
		} // end while
} else {
    echo "There was a problem with the query.";

}
	print "</tr></table></body></html>";
?>
		
		
		
