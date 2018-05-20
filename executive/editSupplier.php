<?php 
   $servername = "localhost";
   $username = "amoodf5_dssupply";
   $password = "_s0]oX0.yh36";
   $dbname = "amoodf5_supply";
   ob_start();
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
  
   
   if (!$conn)
   {
     die("Connection failed: " . mysqli_connect_error());
   }
   if(isset($_POST['submit']))
   { 
      $sn = $_POST['sn'];
      $phn = $_POST['phone'];
      $adds = $_POST['ad'];
      $cty = $_POST['city'];
      $st = $_POST['state'];
      $zp = $_POST['zip'];
      $cde = $_POST['code'];
      $em = $_POST['email'];
      $psw = $_POST['pass'];
      $psswd = hash('sha256', $psw);
      $record = $_POST['record'];
      
      $stmt = $conn->prepare("UPDATE users SET userName = ?, 
      userEmail = ?, 
      supplyCode = ?,  
      phone = ?,  
      address = ?,
      city = ?,
      state = ?,
      zip = ?,
      rawPass = ?,
      userPass = ?
      WHERE userId = ?");
      
      $stmt->bind_param('ssssssssssi',
      $sn,
      $em,
      $cde,
      $phn, 
      $adds,
      $cty,
      $st,
      $zp,
      $psw,
      $psswd,
      $record
      );
  
     if ($stmt->execute()) 
     {
        //echo "Record updated successfully";
        header("Location: viewSuppliers.php");
     } 
     else 
     {
       echo "Error updating record: " . mysqli_error($conn);
     }
      $stmt->close();
   }
   
?>