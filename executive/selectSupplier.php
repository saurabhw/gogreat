<?php
 include "../includes/connection.inc2.php";
 $link = connectTo2();
 $record = $_POST['order_id'];
 if(isset($_POST['order_id']))
 {
   $output = '';
   
   
   $query = "SELECT * FROM users WHERE userId = '$record'";
   $result = mysqli_query($link, $query)or die("MySQL ERROR query 1: ".mysqli_error($link));
   //
   $output .= '<form action="editSupplier.php" method="post">';
   $output .= '<div><table class="table table bordered">';
   while($row = mysqli_fetch_assoc($result))
   {
     $name = $row['userName'];
     $output .= '<h5>Supplier Number '.$record.'</h5>';
    $output .= '
     
     <tr>
      <td>
      <label for="email">Supplier Name</label>
      <input type="text" class="form-control input-sm" id="suppname" placeholder="" name="sn" value="'.$row['userName'].'">
      </td>
      <td>
      <label for="email">Phone Number</label>
      <input type="text" class="form-control input-sm" id="suppemail" placeholder="" name="phone" value="'.$row['phone'].'">
      </td>
     </tr>
      <tr>
      <td>
      <label for="email">Supplier Address</label>
      <input type="text" class="form-control input-sm" id="suppad" placeholder="" name="ad" value="'.$row['address'].'">
      </td>
      <td>
      <label for="email">City</label>
      <input type="text" class="form-control input-sm" id="suppad" placeholder="" name="city" value="'.$row['city'].'">
      </td>
      </tr>
      <tr>
      <td>
      <label for="email">State</label>
      <select class="form-control" id="state" name="state">
			<option value="'.$row['state'].'">'.$row['state'].'</option>
			<option value="AK">Alaska</option>
			<option value="AL">Alabama</option>
			<option value="AR">Arkansas</option>
			<option value="AZ">Arizona</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DC">District of Columbia</option>
			<option value="DE">Delaware</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="IA">Iowa</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="MA">Massachusetts</option>
			<option value="MD">Maryland</option>
			<option value="ME">Maine</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MO">Missouri</option>
			<option value="MS">Mississippi</option>
			<option value="MT">Montana</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="NE">Nebraska</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NV">Nevada</option>
			<option value="NY">New York</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="PR">Puerto Rico</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VA">Virginia</option>
			<option value="VT">Vermont</option>
			<option value="WA">Washington</option>
			<option value="WI">Wisconsin</option>
			<option value="WV">West Virginia</option>
			<option value="WY">Wyoming</option>
</select>
      </td>
       <td>
      <label for="email">Zip Code</label>
      <input type="text" class="form-control input-sm" id="zip" placeholder="" name="zip" value="'.$row['zip'].'">
      </td>
      </tr>
      <tr>
      <td>
      <label for="email">Supplier Code</label>
      <input type="text" class="form-control input-sm" id="zip" placeholder="" name="code" value="'.$row['supplyCode'].'">
      </td>
      <td>
    <label for="email">Email Address</label>
       <input type="email" class="form-control input-sm" id="suppemail" placeholder="" name="email" value="'.$row['userEmail'].'"><br> 
      </td>
      </tr>
      <tr>
      <td>
    <label for="email">Password</label>
       <input type="password" class="form-control input-sm" id="pwd" placeholder="" name="pass" value="'.$row['rawPass'].'"><br> 
      </td>
      </tr>
      <tr>
      <td>
     <input type="hidden" name="record" value="'.$record.'">
      <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </form>
      </td>
      </tr>
     </table>
    
    
 
  ';
   }
 $output .= '<!--<input type="submit" name="submit" value="Save">--></div>';
   echo $output;
   //echo $record;
 }
?>