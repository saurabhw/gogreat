<div id="login">
        <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
                echo '<form id="log" action="logInUser.php" method="post">';
                echo '<label class="user" id="user">Username: </label>
                      <input type="text" name="email" id="user" value="">';
                echo '<label class="user" id="user"> Password: </label>
                      <input type="password" name="password" id="password" value="" >';
                echo '<input class="user" id="user" name="login" type="submit" value="Login" />';
                echo '</form>';
                echo '<div id="register">';
                echo '<ul><li>&nbsp;<a href="">Forgot Password?</a></li>';
                echo '<li>&nbsp;<a href="">Register Now</a></li></ul>';
                echo '</div>';
                
            } elseif($_SESSION['LOGIN'] == "TRUE") {
                include('includes/logout.inc.php');
              }
         ?>
      </div> <!--end login-->
    
    <ul class="nav">
    <li><a href="index.php">GreatMoods<br>Homepage</a></li>
    <li>
        <a href="#">GreatMoods<br>Mall Directory</a>
        <?php include 'includes/menu_mall_directory_site.php'; ?>
    </li>
    <?if($_SESSION['LOGIN'] == "TRUE"){ echo '<li><a href="'.$_SESSION['home'].'" />Account<br>Home</a></li>';}?>
</ul>
</div> <!--end headerMain-->
      
    
    
