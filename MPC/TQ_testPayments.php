<?php
    include('../includes/connection.inc.php');
    
$link = connectTo();

$query = "SELECT * FROM payments WHERE balance > '0.00' AND status = 'unpaid';";
$result = mysqli_query($link, $query );

if($result){
echo '<table>';
    
while($row = mysqli_fetch_assoc($result)){
echo '<tr>';
  echo'<td>'.$row['userInfoID_fk'].'</td>';
  echo'<td>'.$row['paypalID_fk'].'</td>';
  echo'<td>'.$row['status'].'</td>';
  echo'<td>'.$row['balance'].'</td>';
  echo'<td>'.$row['date_of_sale'].'</td>';
  
 }
 echo '</table>';
}
?>
    