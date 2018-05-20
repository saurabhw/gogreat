<style>
.leftbar{
    position: fixed;
    top: 35vh;
    left: 0px;
    z-index:1;

    background: #cb2d3e;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #ef473a, );  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #ef473a, #cb2d3e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    display: inline-block;
    white-space: nowrap;
    width: 35px;
    transition: width 1s;
    overflow:hidden !important;
    z-index:100;
    margin-left: -7px;
    padding-left: 3px;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
}

.item a:hover{
    background-color:brown;
    width:100%;
    text-decoration:none;
    display:inline-block;
}
.item a:active{
    background-color:brown;
    width:100%;
    text-decoration:none;
    display:inline-block;
}
.leftbar .fa {
    margin:10px;
    width:20px;
    color:white;
    padding-right:-2px;
}
.leftbar a{
    color:white;
}
/*.leftbar:hover{*/
/*    width: 300px;*/
/*    overflow:hidden;*/
/*} */

.leftbar[aria-expanded=false] .fa-chevron-left {
   display: none;
}
.leftbar[aria-expanded=true] .fa-chevron-right {
   display: none;
}
.leftbar[aria-expanded=true]{
width: 300px;
overflow:hidden;
} 
.leftbar[aria-expanded=false]{
    width: 35px !important;
    overflow:hidden;
} 
/* position absolute for medium screen widths */
@media(max-width:991px){
    .leftbar{
        position:absolute;
        top: 30rem!important;
    }
}
/* avoids fixed sidebar from being cutoff and unable to view all links; this ensures that if the height is too small the sidebar will be absolute, and can be full seen if user scrolls down (fixed cuts it from view and cannnot scroll to see more) */
@media(max-height:700px){
    .leftbar{
        position:absolute !important;
    }
}
</style>

<script>    // finds aria expanded state. Assigns aria-expanded state so the leftbar can be toggled
  function toggleAria() {
    var x = document.getElementById("collapseExample2").getAttribute("aria-expanded"); 
      if (x == "true") 
      {
      x = "false";
      } else {
      x = "true";
      }
    document.getElementById("collapseExample2").setAttribute("aria-expanded", x);
  }
</script>

<div class="leftbar" id="collapseExample2" aria-expanded="false">
    <div class="item">
       <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="toggleAria()" ontouchend="onclick=toggleAria" >
            <span  id="collapseExample" class="fa fa-chevron-left"   style="color:black"><b style="color:black;font-family:helvetica;font-size:15px;padding-left:20px;">Close Menu</b></span>
            <span  id="collapseExample" class="fa fa-chevron-right" style="color:black;font-size:21px;padding-left: 2px;"></span>
        </a>    
    </div>
    <div class="item"><div class="tooltip">Welcome<span class="tooltiptext">Tooltip text</span>
        <a href="welcome.php">
            <span class="fa fa-home navicon"></span>Welcome
        </a></div>
    </div>
    <div class="item">
        <a href="gm_programoverview.php">
            <span class="fa fa-desktop navicon"></span>GreatMoods Overview
        </a>
    </div>  
    <div class="item">
        <a href="mission.php">
            <span class="fa fa-list-ul navicon"></span>GreatMoods Mission
        </a>
    </div>
    <div class="item">
        <a href="onlinefundraising.php">
            <span class="fa fa-mouse-pointer navicon"></span>GreatMoodsOnline Fundraising
        </a>
     </div>         
    <div class="item">
        <a href="program.php">
            <span class="fa fa-star navicon"></span>Strengths of theGreatMoods Program
        </a>
    </div>
    <div class="item">
        <a href="easysetup.php">
            <span class="fa fa-line-chart navicon"></span>3 Steps to Fundraising $uccess!
        </a>
    </div>
    <div class="item">        
	<a href="opportunities.php"><i class="fa fa-shopping-cart navicon"></i> GreatMoods Mall Products & Gifts</a>
    </div>

    <div class="item">
            <a href="deliver.php"><i class="fa fa-truck navicon"></i> We Deliver!</a>
    </div>
    <div class="item">
            <a href="cash.php"><i class="fa fa-money navicon"></i> Cash Deposited Weekly!</a>
    </div>
    <div class="item">
            <a href="calculator.php"><i class="fa fa-calculator navicon"></i> Calculate Your $uccess</a>
    </div>
    <div class="item">
            <a href="generatefunds.php"><i class="fa fa-calendar navicon"></i> Generate Funds 24/7/365 Days a Year!</a>
    </div>
    <div class="item">
            <a href="gettingstarted_sendemail.php"><i class="fa fa-check navicon"></i> Get Started Today! Contact Your Rep!</a>
    </div>

    <!--<div class="item">-->
    <!--    <a id="sidebar-collapse" role="button"><span class="fa fa-chevron-right"></span></a>-->
    <!--</div>    -->
</div>    