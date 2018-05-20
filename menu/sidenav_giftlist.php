  <img src="<?php echo $contact_pic;?>" width="128" height="150" alt="student photo">
  <ul id="sideNavSample">
    <li class="stuname"><?php echo $owner; ?></li>
    <li class="stylized"><?php echo $title; ?> Fundraiser</li>
    <hr>
   <?
     if(isset($_SESSION['authenticated'])&& $_SESSION['role'] == "Member" )
        {
          echo '
          <li><a href="fundMember/memberHome.php">Account Home</a></li>
          <br>
          ';
        } 
     ?>   
      <li><a href="membersite.php?group=<?php echo $_GET['group']; ?>">Fundraiser<br>Homepage</a></li>
      <li><a href="">About Our Fundraiser</a></li>
      <li><a href="">GreatMoods<br>Mall Directory</a></li>
      	<!-- *****Include Dropdown menu of Stores***** -->
      <li><a href="">Fundraising Contacts</a></li>
      <li><a href="">Getting Started<br>Training Tips,<br>Tools &amp; Forms</a></li>
      <li><a href="">Contact Me</a></li>
    </ul>

    <hr>
	<br>
  <!-- *****Gift List***** -->
  <form>
    <div>My Family, Friends & Business Fundraising Contact Gift Lists:</div>
  <div class="giftlist_side">
  	<ul>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 1</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 2</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 3</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 4</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 5</li>
  	</ul>
  </div>
  <br>
  <a href=""><input type="button" value="Add New Contact"/></a>
  <br><br>
  <hr>
  
  <div><?php echo $owner; ?>'s<br>Gift List Names:</div>
  <div class="giftlist_side">
  	<ul>
  	<li><input type="checkbox" name="name" value="name"><?php echo $owner; ?></li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 2</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 3</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 4</li>
	  <li><input type="checkbox" name="name" value="name">Gift List Name 5</li>
  	</ul>
  </div>
    <br>
    <div id="giftlist_newname">New Gift List Name: <br>
    <input type="text" name="New Gift List Name"></div><br>
  <a href=""><input type="button" value="Add New Gift List"/></a><br><br>
  <a href=""><input type="button" value="View All Gift Lists"/></a>
  
  </form>