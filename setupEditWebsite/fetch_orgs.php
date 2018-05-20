<?php
   
    include '../includes/autoload.php';
    session_start(); 
    $id = $_SESSION['userId'];
    
    $gp = $_POST['get_option'];
   //$gp = $_REQUEST['fundSelect'];         
   if(isset($_POST['get_option']))
   {
      switch ($gp)
      {
      case "Christian Faiths":
        echo'
        <h7>Christianity</h7><br><br>         
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">
				<input type="radio" name="fundtype" value="Baptist"><label>&nbsp;Baptist</label> <br>
				<input type="radio" name="fundtype" value="Catholic"><label>&nbsp;Catholic</label> <br>
				<input type="radio" name="fundtype" value="Episcopal"><label>&nbsp;Episcopal</label> <br>
				<input type="radio" name="fundtype" value="Lutheran"><label>&nbsp;Lutheran</label> <br>
				<input type="radio" name="fundtype" value="Methodist"><label>&nbsp;Methodist</label> <br>
				<input type="radio" name="fundtype" value="Presbyterian"><label>&nbsp;Presbyterian</label> <br>
				<input type="radio" name="fundtype" value="Orthodox"><label>&nbsp;Orthodox</label> <br>
				<input type="radio" name="fundtype" value="Reformed"><label>&nbsp;Reformed</label> <br>
				<input type="radio" name="fundtype" value="Spirit-Filled"><label>&nbsp;Spirit-Filled</label> <br>
				<input type="radio" name="fundtype" value="Christian Other"><label>&nbsp;Christian Other</label> <br>
			</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
	
        ';
        break;
      case "Judaism":
        echo'
        <h7>Judaism</h7><br><br>      
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                
					<input type="radio" name="fundtype" value="Jewish Conservative"><label>&nbsp;Jewish Conservative</label> <br>
					<input type="radio" name="fundtype" value="Jewish Orthodox"><label>&nbsp;Jewish Orthodox</label> <br>
					<input type="radio" name="fundtype" value="Jewish Reformed"><label>&nbsp;Jewish Reformed</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        break;
      case "Faiths":
      echo'
        <h7>Other Faiths</h7><br><br>     
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                 
					<input type="radio" name="fundtype" value="Buddhism"><label>&nbsp;Buddhism</label> <br>
					<input type="radio" name="fundtype" value="Hinduism"><label>&nbsp;Hinduism</label> <br>
					<input type="radio" name="fundtype" value="Islam"><label>&nbsp;Islam</label> <br>
					<input type="radio" name="fundtype" value="Other Faiths"><label>&nbsp;Other Faiths</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
					
        ';
        
        break;
      case "Local & National Organizations":
        echo'
        <h7>Local & National Organizations</h7><br><br> 
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                     
					<input type="radio" name="fundtype" value="Jaycees"><label>&nbsp;Jaycees</label> <br>
					<input type="radio" name="fundtype" value="Junior League"><label>&nbsp;Junior League</label> <br>
					<input type="radio" name="fundtype" value="Kiwanis"><label>&nbsp;Kiwanis</label> <br>
					<input type="radio" name="fundtype" value="Knights of Columbus"><label>&nbsp;Knights of Columbus</label> <br>
					<input type="radio" name="fundtype" value="Lions Club International"><label>&nbsp;Lions Club International (LCI)</label> <br>
					<input type="radio" name="fundtype" value="Masonic Service Association"><label>&nbsp;Masonic Service Association</label> <br>
					<input type="radio" name="fundtype" value="Optimist International"><label>&nbsp;Optimist International</label> <br>
					<input type="radio" name="fundtype" value="Rotary Club"><label>&nbsp;Rotary Club</label> <br>
					<input type="radio" name="fundtype" value="Shriners International"><label>&nbsp;Shriners International</label> <br>
					
					<input type="radio" name="fundtype" value="The American Legion"><label>&nbsp;The American Legion</label> <br>
					<input type="radio" name="fundtype" value="Veterans of Foreign Wars"><label>&nbsp;Veterans of Foreign Wars (VFW)</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
      case "Local & National Charities":
      echo'<h7>Local & National Charities</h7><br><br>   
      		<div class="typecolumns2">  
      			<div class="typesection colnobreak">                    
					<input type="radio" name="fundtype" value="Alzheimer Foundation of America"><label class="smfont">&nbsp;Alzheimer Foundation of America</label> <br>
					<input type="radio" name="fundtype" value="American Cancer Society"><label>&nbsp;American Cancer Society</label> <br>
					<input type="radio" name="fundtype" value="American Diabetes Association"><label>&nbsp;American Diabetes Association</label> <br>
					<input type="radio" name="fundtype" value="American Heart Association"><label>&nbsp;American Heart Association</label> <br>
					<input type="radio" name="fundtype" value="American Red Cross"><label>&nbsp;American Red Cross</label> <br>
					<input type="radio" name="fundtype" value="Boys & Girls Club of America"><label>&nbsp;Boys & Girls Clubs of America</label> <br>
					
					<input type="radio" name="fundtype" value="Cancer Research Institute"><label>&nbsp;Cancer Research Institute</label> <br>
					<input type="radio" name="fundtype" value="Cerebral Palsy"><label>&nbsp;Cerebral Palsy</label> <br>
					<input type="radio" name="fundtype" value="Goodwill Industries International"><label>&nbsp;Goodwill Industries International</label> <br>
					
					<input type="radio" name="fundtype" value="Boys & Girls Clubs of America"><label>&nbsp;Boys & Girls Clubs of America</label> <br>
					<input type="radio" name="fundtype" value="Habitat for Humanity"><label>&nbsp;Habitat for Humanity </label> <br>
			
			<input type="radio" name="fundtype" value="Lymphoma Association"><label>&nbsp;Lymphoma Association</label> <br>
	
	
					<input type="radio" name="fundtype" value="Leukemia & Lymphoma Society"><label>&nbsp;Leukemia & Lymphoma Society</label> <br>
					<input type="radio" name="fundtype" value="Make-A-Wish Foundation of America"><label class="smfont">&nbsp;Make-A-Wish Foundation of America</label> <br>
					<input type="radio" name="fundtype" value="March of Dimes"><label>&nbsp;March of Dimes</label> <br>
					<input type="radio" name="fundtype" value="Muscular Dystrophy Association"><label class="smfont">&nbsp;Muscular Dystrophy Association (MDA)</label> <br>
					<input type="radio" name="fundtype" value="Shriners International"><label>&nbsp;Shriners International</label> <br>
					<input type="radio" name="fundtype" value="Special Olympics"><label>&nbsp;Special Olympics</label> <br>
					<input type="radio" name="fundtype" value="St. Jude Childrens Research Hospital"><label class="smfont">&nbsp;St. Jude Children\'s Research Hospital</label> <br>
					<input type="radio" name="fundtype" value="Susan G. Komen"><label>&nbsp;Susan G. Komen</label> <br>
					<input type="radio" name="fundtype" value="The Salvation Army"><label>&nbsp;The Salvation Army</label> <br>
					<input type="radio" name="fundtype" value="The Simon Wiesenthal Foundation"><label class="smfont">&nbsp;The Simon Wiesenthal Foundation</label> <br>
					<input type="radio" name="fundtype" value="United Way"><label>&nbsp;United Way</label> <br>
					<input type="radio" name="fundtype" value="Wounded Warrior Project"><label>&nbsp;Wounded Warrior Project</label> <br>
			</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
					';
        
         break;
      case "Community Organizations":
      echo'
        <h7>Community Organizations</h7><br><br>   
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                   
					<input type="radio" name="fundtype" value="Animal Shelters"><label>&nbsp;Animal Shelters</label> <br>
					<input type="radio" name="fundtype" value="ASPCA"><label>&nbsp;ASPCA</label> <br>
					<input type="radio" name="fundtype" value="Community Food Bank"><label>&nbsp;Community Food Bank</label> <br>
					<input type="radio" name="fundtype" value="Fire Department"><label>&nbsp;Fire Department</label> <br>
					<input type="radio" name="fundtype" value="Police Department"><label>&nbsp;Police Department</label> <br>
					<input type="radio" name="fundtype" value="Local Food Shelves"><label>&nbsp;Local Food Shelves</label> <br>
					<input type="radio" name="fundtype" value="Local Homeless Shelters"><label>&nbsp;Local Homeless Shelters</label> <br>
					<input type="radio" name="fundtype" value="Local Womens Shelters"><label>&nbsp;Local Womens Shelters</label> <br>
					<input type="radio" name="fundtype" value="Police Department><label>&nbsp;Police Department</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
      case "Youth & Sports":
      echo'
        <h7>Youth & Sports</h7><br><br>     
        	<div class="typecolumns">  
      			<div class="typesection colnobreak">                 
					<input type="radio" name="fundtype" value="Athletic Associations"><label>&nbsp;Athletic Associations</label> <br>
					<input type="radio" name="fundtype" value="Big Brother/Big Sisters of America"><label>&nbsp;Big Brother/Big Sisters of America</label> <br>
					<input type="radio" name="fundtype" value="Cub Scouts"><label>&nbsp;Cub Scouts</label> <br>
					<input type="radio" name="fundtype" value="Boy Scouts"><label>&nbsp;Boy Scouts</label> <br>
					<input type="radio" name="fundtype" value="Girl Scouts"><label>&nbsp;Girl Scouts</label> <br>
					<input type="radio" name="fundtype" value="Summer Leagues"><label>&nbsp;Summer Leagues</label> <br>
					<input type="radio" name="fundtype" value="YMCA"><label>&nbsp;YMCA</label> <br>
					<input type="radio" name="fundtype" value="YWCA"><label>&nbsp;YWCA</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
        
         break;
         case "Education":
         echo '<h7>Education</h7> <br><br>
         		<div class="typecolumns">  
      				<div class="typesection colnobreak">
		          		<input type="radio" name="fundtype" value="Elementary School"><label>&nbsp;Elementary School</label> <br>
		          		<input type="radio" name="fundtype" value="Middle School"><label>&nbsp;Middle School</label> <br>
					<input type="radio" name="fundtype" value="High School"><label>&nbsp;High School</label> <br>
					<input type="radio" name="fundtype" value="College"><label>College</label> <br>
					<input type="radio" name="fundtype" value="Pre-School"><label>&nbsp;Pre-School</label> <br>
					<input type="radio" name="fundtype" value="Home School"><label>Home School</label> <br>
					<input type="radio" name="fundtype" value="Trade, Vocational & Tech"><label>&nbsp;Trade, Vocational & Tech</label> <br>
					<input type="radio" name="fundtype" value="Camps"><label>&nbsp;Camps</label> <br>
				</div> <!-- end typesection -->
		</div> <!-- end typecolumns -->
        ';
         break;
         case "":
         echo '<h7>no value</h7> <br><br>
         		<div class="typecolumns">  
      				no value
		</div> <!-- end typecolumns -->
        ';
         break;
    
    default:
    break;    
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
     
     exit;*/
   }
?>