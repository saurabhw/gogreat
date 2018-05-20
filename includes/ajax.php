<?php

//Including Database configuration file.

include "db.php";
include "connection.inc.php";
include "functions.php";
$link = connectTo();
$tableString = '<table class="table table-bordered table-striped" id="display"><thead>
       <th>Name</th>
       <th>Club Type</th>
       <th>Address</th>
       <th>City</th>
       <th>State</th>
       <th>Zip</th>
       <th>View</th>
       </thead>';

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.

   $Name = mysqli_real_escape_string($link, sanitize($_POST['search']));
   $st = $_REQUEST['state'];

//Search query.

   $Query = "SELECT * FROM Dealers WHERE  Dealer LIKE '%$Name%' AND setuppersonid2 ='' LIMIT 700";

//Query execution

   $ExecQuery = MySQLi_query($link, $Query);
   $execute = mysqli_query($link, $Query)or die("MYSQL ERROR query 2: ".mysqli_error($link));

//Creating unordered list to display result.
 
 echo $tableString;

   //Fetching result from database.

   while ($Result = mysqli_fetch_assoc($execute)) {

       ?>

   <!-- Creating unordered list items.

        Calling javascript function named as "fill" found in "script.js" file.

        By passing fetched result as parameter. -->

   <span onclick='fill("<?php echo $Result['Dealer'] ?>")'></span>



   <!-- Assigning searched result in "Search box" in "search.php" file. -->

       <?php 
 
       echo "<td>".$Result['Dealer']."</td><td>".$Result['DealerDir']."</td><td>".$Result['Address1']."</td><td>".$Result['City']."</td><td>".$Result['State']."</td><td>".$Result['Zip']."</td><td><a href='fundSite.php?group=".$Result[loginid]."' target='blank'><input type='button' class='redbutton' value='Support'></a></td>"; 
       echo "</tr>";
       
?>
   

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->

   <?php

}}


?>

