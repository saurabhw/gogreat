<?php
      session_start();
      ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);

      ob_start();
      define("SITE_ROOT",$_SERVER["DOCUMENT_ROOT"].'/salesTest/');
      include("../includes/connection.inc.php");
      include("../includes/functions.php");
      $link = connectTo();
      $table = "sample_websites";
      $sample = $_GET['sample'];
      $userID = $_SESSION['userId'];
     
         $query = "SELECT * FROM $table WHERE samplewebID = $sample";
      
      
      $result = mysqli_query($link, $query) or die(mysqli_error());
      $row_count = mysqli_num_rows($result);
      if($row_count == '0'){
        echo "<br />Sample Website Not Found.<br />";
      }else{
         $row = mysqli_fetch_assoc($result);
         $club_name = $row['sampleName'];
         $club = $row['club'];
         $goal = $row['goal'];
         $so_far = $goal*.2;
         $banner_path = $row['bannerPath'];
         $position = $row['samplePosition'];
         $sn = $row['sampleName'];
         $leader = $row['sampleFname'].' '.$row['sampleLname'];
         $phone = $row['samplePhone'];
         $group_email = $row['sampleGroupEmail'];
         $contact_photo = $row['contact_group_photo'];
         $group_photo = $row['groupPhoto'];
         $leader_photo = $row['group_leader'];
         $student_photo = $row['student_leaders'];
         $reasons = $row['sampleReasons'];
         $student_leader_name = $row['student_leader'];
         $student_name = $row['student_name'];
         if($row['sampleTitle']==''){
           $title = $club;
         }else{
           $title = $row['sampleTitle'];
         }
      }
?>

<!DOCTYPE html>
<head>
	<title>GreatMoods Sample Website</title>
	<style>
	    #reasoncontent{
	        width:auto !important;
	    }
</style>

</head>
<body>
<?php include 'header_sample.php'; ?>
<div class="container-fluid">
        <div class=""></div>

    <div class="row">

        <div class=" col-md-1 col-xs-11 col-pull-1">
    	    <?php include 'memberSidebar_sample.php'; ?>
        </div>
        <div class="container">
            <div class=" col-md-9 col-md-push-2 col-sm-12 col-xs-12">

        <h3 class="sample"><!-- <?php echo $student_name; ?>'s --><?php echo $title; ?> Fundraiser</h3>

        <div id="carousel-sample" class="carousel slide" data-ride="carousel">
            <ol style="display:none;">
                <li data-target="#carousel-band" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-band" data-slide-to="1"></li>
                <li data-target="#carousel-band" data-slide-to="2"></li>
                <li data-target="#carousel-band" data-slide-to="3"></li>
                <li data-target="#carousel-band" data-slide-to="4"></li>        
                <li data-target="#carousel-band" data-slide-to="5"></li>
                <li data-target="#carousel-band" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img class="img-responsive center-block" src="<?php echo $student_photo;?>" alt="UPLOAD YOUR GROUP PICTURE HERE!"  style="max-height:258px">
                    <div class="carousel-caption">
                        <h3 style="color:white">UPLOAD YOUR GROUP PICTURE HERE</h3><br>
                    </div>
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider1.jpg" alt="Thank You For Visiting">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider2.jpg" alt="Shop at Any Stores Above">
                </div>
                    <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider3.jpg" alt="Great Fundraising Products at the GreatMoods Mall">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider4.jpg" alt="Fundraising Products You  Really Want">
                </div> 
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider5.jpg"  alt="35% of Every Purchase is Yours!">
                </div>
                <div class="item">
                  <img class="img-responsive center-block" src="../images/sliders/mbrslider6.jpg" alt="We Deliver Everywhere!">
                </div>
            </div>
             <!--Left and right controls -->
            <a class="left carousel-control" href="#carousel-sample" data-slide="prev" data-interval="false">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-sample" data-slide="next" data-interval="false">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--<div id="carouselButtons" class="vcenter center-block">--> <!-- not functioning properly since addition of thermometer. will be a work in progress. -->
            <!--  <button id="playButton" class="vcenter btn btn-default btn-xs">-->
            <!--      <span class="fa fa-play-circle"></span>-->
            <!--   </button>-->
            <!--  <button id="pauseButton" class="vcenter btn btn-default btn-xs">-->
            <!--      <span class="fa fa-pause-circle"></span>-->
            <!--  </button>-->
            <!--</div>-->
        </div>
    </div>

        	<div class="reasonsbox col-xs-11 col-xs-push-1 col-sm-push-0 col-sm-4 col-md-3 col-md-push-1 col-md-offset-1 col-lg-offset-0 col-lg-push-1 col-lg-4">
                <h5 id="reasons">Reasons for Our Fundraiser</h5>
                <?php
                  echo '<div id ="reasoncontent">'; 
                  $r_list = explode('.', $reasons);
                  echo '<ul>';
                  foreach ($r_list as $item){
                    if ($item != ''){
                       echo '<li>', trim($item), '</li>';
                    }
                  }
                  echo '<?ul>';
                  echo '</div>';
                ?>
              </div>
              
        
            <!--$width = round(($paid_amount/$total_prize)*100,2);-->
            <!--<div class="row">-->
                <div class="col-xs-9 col-xs-offset-3 col-sm-push-0 col-sm-offset-2 col-sm-2 col-md-3 col-md-push-1 col-md-offset-1 col-lg-3">
                    	<div id="thermo-wrap" class="">
                            <div id="thermometer">
                                <div class="track">
                                    <div class="goal">
                                        <div class="amount"><?php echo $goal; ?> </div>
                                    </div>
                                    <div class="raised">
                                        <div class="amount"><?php echo $so_far; ?></div>
                                    </div>
                                </div>
                    
                            </div>
                    
                        </div>
                </div>
            <!--</div>-->
            
            <div class="img-thumbnail pull-right col-xs-1 col-xs-pull-4 col-sm-1 col-sm-pull-0 col-md-1 col-lg-1" style="width:130px;height:180px">
              <img class=" img-responsive" src="../<?php echo $leader_photo;?>" alt="UPLOAD YOUR LEADER PICTURE HERE!">
            <div class="contactinfo2">
              <span class="title"><strong><?php echo $position; ?></strong></span>
              <span class="leadername"><?php echo $leader; ?></span>
            </div>
            </div> <!--end leader-->  
            
            <div class="img-thumbnail  pull-right col-xs-offset-6 col-xs-pull-4 col-xs-1 col-sm-pull-0 col-sm-offset-0 col-md-1 col-lg-1 col-md-offset-0"  style="width:130px;height:180px" >
                <div class="leaderimgcrop ">
                  <img class=" img-responsive" src="../<?php echo $student_photo;?>" alt="UPLOAD ANY PICTURE HERE!">
                </div> <!-- end leaderimgcrop -->
                <div class="contactinfo2">
                  <span class="title"><strong>Student Leader</strong></span>
                  <span class="leadername"><?php echo $student_leader_name; ?></span> 
                </div>
            </div> <!--end studentleader-->
        </div> <!-- end container -->
    </div><!--end row -->
        <!--<div id="" class="pull-right">  	-->
        <!--  	<div class="shopDetails">-->
        <!--        <ul class="stumenu">-->
        <!--          <h5>Shopping Ideas For...</h5>-->
        <!--          <li><a href="">Mothers</a></li>-->
        <!--          <li><a href="">Grandmas</a></li>-->
        <!--          <li><a href="">Fathers</a></li>-->
        <!--           <li><a href="">Grandpas</a></li>-->
        <!--           <li><a href="">Teen Girls</a></li>-->
        <!--           <li><a href="">Teen Boys</a></li>-->
        <!--          <li><a href="">Girls</a></li>-->
        <!--          <li><a href="">Boys</a></li>-->
        <!--          <li><a href="">Love &amp; Romance</a></li>-->
        <!--          <li><a href="">Special Friends</a></li>-->
        <!--          <li><a href="">Students Away at School</a></li>-->
        <!--          <li><a href="">Customeres &amp; Clients</a></li>-->
        <!--          <li><a href="">Me, Myself &amp; I</a></li>-->
        <!--        </ul>-->
        <!--      </div>-->
          
        <!--      <br>-->
          
        <!--  <div class="bestsellers">-->
        <!--  	<h5>New Arrivals Daily!</h5>-->
        <!--    <img src="images/rightcol_collage_4pics_15nov2016.jpg" width="160" height="" alt="new arrivals daily">-->
        <!--  </div>-->
        <!--</div>-->

</div> <!--end container-fluid-->


 <?php include 'footer(1).php' ; ?>
 
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>//script for thermometer money conversion / completion
    function formatCurrency(n, c, d, t) {
        "use strict";
    
        var s, i, j;
    
        c = isNaN(c = Math.abs(c)) ? 2 : c;
        d = d === undefined ? "." : d;
        t = t === undefined ? "," : t;
    
        s = n < 0 ? "-" : "";
        i = parseInt(n = Math.abs(+n || 0).toFixed(c), 10) + "";
        j = (j = i.length) > 3 ? j % 3 : 0;
    
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }

    /**
     * Thermometer raised meter.
     * This function will update the raised element in the "thermometer"
     * to the updated percentage.
     * If no parameters are passed in it will read them from the DOM
     *
     * @param {Number} goalAmount The Goal amount, this represents the 100% mark
     * @param {Number} raisedAmount The raised amount is the current amount
     * @param {Boolean} animate Whether to animate the height or not
     *
     */
    function thermometer(goalAmount, raisedAmount, animate) {
        "use strict";
    
        var $thermo = $("#thermometer"),
            $raised = $(".raised", $thermo),
            $goal = $(".goal", $thermo),
            percentageAmount;
    
        goalAmount = goalAmount || parseFloat( $goal.text() ),
        raisedAmount = raisedAmount || parseFloat( $raised.text() ),
        percentageAmount =  Math.min( Math.round(raisedAmount / goalAmount * 1000) / 10, 100); //make sure we have 1 decimal point
    
        //let's format the numbers and put them back in the DOM
        $goal.find(".amount").text( "$" + formatCurrency( goalAmount ) );
        $raised.find(".amount").text( "$" + formatCurrency( raisedAmount ) );
    
    
        //let's set the raised indicator
        $raised.find(".amount").hide();
        if (animate !== false) {
            $raised.animate({
                "height": percentageAmount + "%"
            }, 1200, function(){
                $(this).find(".amount").fadeIn(500);
            });
        }
        else {
            $raised.css({
                "height": percentageAmount + "%"
            });
            $raised.find(".amount").fadeIn(500);
        }
    }

    $(document).ready(function(){
    
        //call without the parameters to have it read from the DOM
        thermometer();
        // or with parameters if you want to update it using JavaScript.
        // you can update it live, and choose whether to show the animation
        // (which you might not if the updates are relatively small)
        //thermometer( 1000000, 425610, false );
    });
    </script>
	

</body>
</html>






<?php
   ob_end_flush();
?>


