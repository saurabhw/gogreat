<?php
 
    require_once '../grid-2.0.4/php/conf.php';
 
    $dbh = getDatabaseHandle();
                 
    $sql = "Select * from user_info order by email limit 0,100";
     
    $stmt = $dbh->query($sql);    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    echo json_encode($products);
?>