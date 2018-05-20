<div id="leftSideBarSample">
  <img src="<?php echo $contact_pic;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $owner; ?></li>
    <li class="stylized"><?php echo $club_name; ?> Fundraiser</li>
    <hr>
    <li><a href="index.php">GreatMoods Homepage</a></li>
    <li><a href="memberaboutus.php?group=<?php echo $_GET['group']; ?>">About Our Fundraiser</a></li>
    <hr>
    <li><a href="membersite.php?group=<?php echo $_GET['group']; ?>">View My Website</a></li> 
       <? if(isset($_SESSION['authenticated'])) {
         echo '<li><a href="'.$_SESSION['home'].'" />Account Home</a></li>';
       } ?>  
     
  </ul>
</div> <!--end side navigation-->