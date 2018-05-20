

<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <!-- jsany bootstrap latest, creates more bootstrap elements, currently in use for collapsible navigation -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<footer class = "footer" style="    padding-top: 4em !important;">
    <div  class="container-fluid"  style="    padding-top: 4em !important;">
        <div class="row-centered" id="imageAndInfo">
            <div class ="col-lg-1 col-md-4 col-sm-12 col-xs-12">
              <a href="#"><img id="footerLogo" class="" src="../images/GMlogo.png" alt="GreatMoods Logo" width="auto" height="150"/></a>
             </div>
                <ul id="infoList" class="row-centered col-lg-push-3 col-lg-8 col-md-7 col-md-push-1 col-sm-12 col-xs-12 list-inline">
                    		 <?
		     if(isset($_SESSION['authenticated']))
		     {
		        echo'
                        <li class="btn btn-md btn-link"><a href="memberHome.php">Account Homepage</a></li><span class="divider-vertical hidden-xs"></span>
                        ';
                     }
                  ?>
                        <li id="homelink" class="btn btn-md btn-link"><a href="membersite.php?group=<?php echo $groupID;?>">Fundraiser Homepage</a></li><span class="divider-vertical hidden-xs"></span>
                        <li class="btn btn-md btn-link"><a href="fundgettingstarted11.php?group=<?php echo $groupID;?>">GreatMoods Program Overview</a></li><span class="divider-vertical hidden-xs"></span>
                        <li id="getstarted" class="btn btn-md btn-link"><a href="fundgettingstarted9.php?group=<?php echo $groupID;?>">Getting Started</li><span class="divider-vertical hidden-xs"></span>
                        <!--<li class="btn btn-md btn-link"><a href="">Privacy &amp; Warranties</a></li>-->
                      	
                </ul>
            </div><!--end row-->
        <div class="row-centered">
            <div class="col-lg-push-5 col-lg-6 col-md-12 col-sm-12 col-xs-12" id="copyright">
                <span class="text-muted">Copyright &copy; <#php echo date('Y'); ?> Greatmoods.com, LLC. All Rights Reserved</span>
            </div>
        </div><!--end row 2 -->
    </div><!--end container -->
</footer>