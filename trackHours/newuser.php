<?php
  include 'connection.inc.php';
  $link = connectTo();
   if(isset($_POST['submit']))
      {
          $message = '';
          $table2 = "usersx";
          $salt = time();
          //insert user
	  $query1 = "INSERT INTO $table2 (username, password, Security, landingPage, salt, created, lastLogin, role)";
          $query1 .= "VALUES('$email','$loginPass','1','$landingPage','$salt', now(), now(), '$role')";
          $res1 = mysqli_query($link, $query1)or die ("couldn't execute query 1.".mysqli_error($link));
     }
     <html>
     <head></head>
     <body>
     <form method="post" action="">
     <div class="interim-form">
     <div class="interim-header"><h2>Account Login</h2></div>
     <div id="row"> <!-- titles -->
     <span id="hd_loginemail">Email Address</span>
     </div> <!-- end row -->
     <div id="row"> <!-- inputs -->
     <input id="email" type="email" name="email" value="" required>
     </div> <!-- end row -->
     <div id="row"> <!-- titles -->
     <span id="hd_password">Password</span>
     <span id="hd_cpassword">Confirm Password</span>
     </div> <!-- end row -->
     <div id="row"> <!-- inputs -->
     <input id="password" type="password" name="password" value="" required>
     <input id="cpassword" type="password" name="cpassword" value="" onkeyup="checkPass(); return false;" required> <span id="confirmMessage" class="confirmMessage"></span>
     </div> <!-- end row -->
     </div> <!-- end  -->
     </form>
     
     </body>
     </html>
?>