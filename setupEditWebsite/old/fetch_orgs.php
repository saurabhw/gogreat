<?php
   
   //include '../includes/autoload.php';
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];
   //$gp = $_REQUEST['fundSelect'];         
   if(isset($_POST['get_option']))
   {
      switch ($gp)
      {
      case "Christian Faiths":
        echo'<div class="show">
        <h7>Christianity</h7><br><br>         
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">
				<input type="radio" name="fundtype" value="Baptist"><label>Baptist</label> <br>
				<input type="radio" name="fundtype" value="Catholic"><label>Catholic</label> <br>
				<input type="radio" name="fundtype" value="Episcopal"><label>Episcopal</label> <br>
				<input type="radio" name="fundtype" value="Lutheran"><label>Lutheran</label> <br>
				<input type="radio" name="fundtype" value="Methodist"><label>Methodist</label> <br>
				<input type="radio" name="fundtype" value="Presbyterian"><label>Presbyterian</label> <br>
				<input type="radio" name="fundtype" value="Orthodox"><label>Orthodox</label> <br>
				<input type="radio" name="fundtype" value="Reformed"><label>Reformed</label> <br>
				<input type="radio" name="fundtype" value="Spirit-Filled"><label>Spirit-Filled</label> <br>
				<input type="radio" name="fundtype" value="Christian Other"><label>Christian Other</label> <br>
			</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
	</div> <!-- end show -->
        ';
        break;
      case "Judaism":
        echo'
        <h7>Judaism</h7><br><br>      
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                
					<input type="radio" name="fundtype" value="Jewish Conservative"><label>Jewish Conservative</label> <br>
					<input type="radio" name="fundtype" value="Jewish Orthodox"><label>Jewish Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Jewish Reformed"><label>Jewish Reformed</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        break;
      case "Faiths":
      echo'
        <h7>Other Faiths</h7><br><br>     
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                 
					<input type="radio" name="fundtype" value="Buddhism"><label>Buddhism</label> <br>
					<input type="radio" name="fundtype" value="Hinduism"><label>Hinduism</label> <br>
					<input type="radio" name="fundtype" value="Islam"><label>Islam</label> <br>
					<input type="radio" name="fundtype" value="Other Faiths"><label>Other Faiths</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
					
        ';
        
        break;
      case "Local & National Organizations":
        echo'
        <h7>Local & National Organizations</h7><br><br> 
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                     
					<input type="radio" name="fundtype" value="Jaycees"><label>Jaycees</label> <br>
					<input type="radio" name="fundtype" value="Junior League"><label>Junior League</label> <br>
					<input type="radio" name="fundtype" value="Kiwanis"><label>Kiwanis</label> <br>
					<input type="radio" name="fundtype" value="Knights of Columbus"><label>Knights of Columbus</label> <br>
					<input type="radio" name="fundtype" value="Lions Club International"><label>Lions Club International (LCI)</label> <br>
					<input type="radio" name="fundtype" value="Masonic Service Association"><label>Masonic Service Association</label> <br>
					<input type="radio" name="fundtype" value="Optimist International"><label>Optimist International</label> <br>
					<input type="radio" name="fundtype" value="Rotary Club"><label>Rotary Club</label> <br>
					<input type="radio" name="fundtype" value="Shriners International"><label>Shriners International</label> <br>
					
					<input type="radio" name="fundtype" value="The American Legion"><label>The American Legion</label> <br>
					<input type="radio" name="fundtype" value="Veterans of Foreign Wars"><label>Veterans of Foreign Wars (VFW)</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
      case "Local & National Charities":
      echo'<h7>Local & National Charities</h7><br><br>   
      		<div class="typecolumns2">  
      			<div class="typesection colnobreak">                    
					<input type="radio" name="fundtype" value="Alzheimer Foundation of America"><label class="smfont">Alzheimer Foundation of America</label> <br>
					<input type="radio" name="fundtype" value="American Cancer Society"><label> American Cancer Society</label> <br>
					<input type="radio" name="fundtype" value="American Diabetes Association"><label>American Diabetes Association</label> <br>
					<input type="radio" name="fundtype" value="American Heart Association"><label>American Heart Association</label> <br>
					<input type="radio" name="fundtype" value="American Red Cross"><label>American Red Cross</label> <br>
					<input type="radio" name="fundtype" value="Boys & Girls Clubs of America"><label>Boys & Girls Clubs of America</label> <br>
					
					<input type="radio" name="fundtype" value="Cancer Research Institute"><label>Cancer Research Institute</label> <br>
					<input type="radio" name="fundtype" value="Cerebral Palsy"><label>Cerebral Palsy</label> <br>
					<input type="radio" name="fundtype" value="Goodwill Industries International"><label>Goodwill Industries International</label> <br>
					
					<input type="radio" name="fundtype" value="Boys & Girls Clubs of America"><label>Boys & Girls Clubs of America</label> <br>
					<input type="radio" name="fundtype" value="Habitat for Humanity"><label>Habitat for Humanity </label> <br>
			
			<input type="radio" name="fundtype" value="Lymphoma Association"><label>Lymphoma Association</label> <br>
	
	
					<input type="radio" name="fundtype" value="Leukemia & Lymphoma Society"><label>Leukemia & Lymphoma Society</label> <br>
					<input type="radio" name="fundtype" value="Make-A-Wish Foundation of America"><label class="smfont">Make-A-Wish Foundation of America</label> <br>
					<input type="radio" name="fundtype" value="March of Dimes"><label>March of Dimes</label> <br>
					<input type="radio" name="fundtype" value="Muscular Dystrophy Association"><label class="smfont">Muscular Dystrophy Association (MDA)</label> <br>
					<input type="radio" name="fundtype" value="Shriners International"><label>Shriners International</label> <br>
					<input type="radio" name="fundtype" value="Special Olympics"><label>Special Olympics</label> <br>
					<input type="radio" name="fundtype" value="St. Jude Childrens Research Hospital"><label class="smfont">St. Jude Children\'s Research Hospital</label> <br>
					<input type="radio" name="fundtype" value="Susan G. Komen"><label>Susan G. Komen</label> <br>
					<input type="radio" name="fundtype" value="The Salvation Army"><label>The Salvation Army</label> <br>
					<input type="radio" name="fundtype" value="The Simon Wiesenthal Foundation"><label class="smfont">The Simon Wiesenthal Foundation</label> <br>
					<input type="radio" name="fundtype" value="United Way"><label>United Way</label> <br>
					<input type="radio" name="fundtype" value="Wounded Warrior Project"><label>Wounded Warrior Project</label> <br>
			</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
					';
        
         break;
      case "Community Organizations":
      echo'
        <h7>Community Organizations</h7><br><br>   
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                   
					<input type="radio" name="fundtype" value="Animal Shelters"><label>Animal Shelters</label> <br>
					<input type="radio" name="fundtype" value="ASPCA"><label>ASPCA</label> <br>
					<input type="radio" name="fundtype" value="Community Food Bank"><label>Community Food Bank</label> <br>
					<input type="radio" name="fundtype" value="Fire Department"><label>Fire Department</label> <br>
					<input type="radio" name="fundtype" value="Police Department"><label>Police Department</label> <br>
					<input type="radio" name="fundtype" value="Local Food Shelves"><label>Local Food Shelves</label> <br>
					<input type="radio" name="fundtype" value="Local Homeless Shelters"><label>Local Homeless Shelters</label> <br>
					<input type="radio" name="fundtype" value="Local Womens Shelters"><label>Local Womens Shelters</label> <br>
					<input type="radio" name="fundtype" value="Police Department><label>Police Department</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
      case "Youth & Sports":
      echo'
        <h7>Youth & Sports</h7><br><br>     
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                 
					<input type="radio" name="fundtype" value="Athletic Associations"><label>Athletic Associations</label> <br>
					<input type="radio" name="fundtype" value="Big Brother/Big Sisters of America"><label>Big Brother/Big Sisters of America</label> <br>
					<input type="radio" name="fundtype" value="Cub Scouts"><label>Cub Scouts</label> <br>
					<input type="radio" name="fundtype" value="Boy Scouts"><label>Boy Scouts</label> <br>
					<input type="radio" name="fundtype" value="Girl Scouts"><label>Girl Scouts</label> <br>
					<input type="radio" name="fundtype" value="Summer Leagues"><label>Summer Leagues</label> <br>
					<input type="radio" name="fundtype" value="YMCA"><label>YMCA</label> <br>
					<input type="radio" name="fundtype" value="YWCA"><label>YWCA</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
         case "Education":
         echo '<h7>Education</h7> <br><br>
         		<div class="typecolumns">  
      				<div class="typesection colnobreak">
		          		<input type="radio" name="fundtype" value="Elementary School"><label>Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School"><label>Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"><label>High School</label> <br>
					<input type="radio" name="fundtype" value="College"><label>College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"><label>Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School"><label>Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech"><label>Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camps"><label>Camps</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
         break;
    
    default:
        
     } 
     /*
     //get reps
     $query = "SELECT * FROM orgMembers WHERE fund_owner_id = '$gp'";
     $result = mysqli_query($link, $query)or die("MySQL ERROR on query c: ".mysqli_error($link));
   
     if(mysqli_num_rows($result) < 1)
     {
       echo '<option value="">No Members Added</option>';
     }
     else
     {
       echo '<option value="0">Select Member</option>';
         while($row = mysqli_fetch_assoc($result))
         {
           echo '<option value="'.$row['fundraiserID'].'">'.$row[orgFName].' '.$row[orgLName].'</option>';
         }
     }
     */
     exit;
   }
?>