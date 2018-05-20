<?php
session_start();

/*if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }*/
       
    include '../includes/connection.inc.php';	
    $link = connectTo();
    $userID = $_SESSION['userId'];

?>

<script class="ppjs">
    $(function () {
        var colM = [
            { title: "Company Name", width: 100, dataIndx: "companyName" },            
            { title: "First Name", width: 130, dataIndx: "FName" },
            { title: "Last Name", width: 190, dataIndx: "LName" }
            
        ];
        var dataModel = {
            location: "remote",                        
            dataType: "JSON",
            method: "GET",
            getUrl : function () {                
                return { url: 'remote.php'};
            },
            getData: function ( response ) {                
                return { data: response };                
            }
             var obj = { url: "remote.php", data: data };
            //debugger;
            return obj;
        };
        $("div#grid_php").pqGrid({ width: 900, height: 400,
            dataModel: dataModel,
            colModel: colM,  
            bottomVisible: false,
            title: "Vice Presidents"
        });
    });
</script>


<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <br><br>
      <?php include 'sidenav.php' ; ?>

      <div id="content">
          <h1>View Team & Accounts</h1>
          <h3>Vice Presidents</h3>
          <?php
          $query = "SELECT * FROM distributors WHERE setupID='$userID' AND role='VP'";
          $result = mysqli_query($link, $query)or die("MySQL ERROR on query 1: ".mysqli_error($link));
          while($row = mysqli_fetch_assoc($result))
          {
             echo '<div>';
             echo ''.$row['FName'].' '.$row['LName'].'';
              echo '</div>';
          }
          $home = readfile('http://www.cnn.com/2016/05/20/politics/fox-news-latino-poll-donald-trump-hillary-clinton/index.html');
          echo '<div>';
          echo $home;
          echo '</div>';
         
          ?>
          lsjnvdslkn
          <iframe src="http://www.cnn.com/2016/05/20/politics/fox-news-latino-poll-donald-trump-hillary-clinton/index.html" style="width: 100%; height: 100%;">
          </iframe>
          <iframe src="http://www.w3schools.com" style="width: 100%; height: 100%;">
  <p>Your browser does not support iframes.</p>
</iframe>
            <div id="grid_php" style="margin:5px auto;"></div>

  </div> <!--end content -->
  
      <?php include 'footer.php' ; ?>   
</div> <!--end container-->

</body>
</html>

<?php
   ob_end_flush();
?>