<?php
$dbh = new PDO('mysql:host=localhost;dbname=mydata', 'root', '');
$page = isset($_GET['p'])? $_GET['p'] : '';
if($page=='add'){
    try{
        $id = $_POST['id'];
        $nm = $_POST['nm'];
        $em = $_POST['em'];
        $hp = $_POST['hp'];
        $ad = $_POST['ad'];
        $stmt = $dbh->prepare("INSERT INTO crud VALUES(?,?,?,?,?)");
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$nm);
        $stmt->bindParam(3,$em);
        $stmt->bindParam(4,$hp);
        $stmt->bindParam(5,$ad);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Data has been added</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Failed to add data</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else if($page=='update'){
    try{
        $id = $_POST['id'];
        $nm = $_POST['nm'];
        $em = $_POST['em'];
        $hp = $_POST['hp'];
        $ad = $_POST['ad'];
        $stmt = $dbh->prepare("UPDATE crud SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bindParam(1,$nm);
        $stmt->bindParam(2,$em);
        $stmt->bindParam(3,$hp);
        $stmt->bindParam(4,$ad);
        $stmt->bindParam(5,$id);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Data has been updated</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Failed to update data</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else if($page=='delete'){
    try{
        $id = $_POST['id'];
        $stmt = $dbh->prepare("DELETE FROM crud WHERE id=?");
        $stmt->bindParam(1,$id);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Data has been deleted</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Failed to delete data</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else{
    try{
        $stmt = $dbh->prepare("SELECT * FROM crud ORDER BY id DESC");
        $stmt->execute();
        while($row = $stmt->fetch()){
            print "<tr>";
            print "<td>".$row['id']."</td>";
            print "<td>".$row['name']."</td>";
            print "<td>".$row['email']."</td>";
            print "<td>".$row['phone']."</td>";
            print "<td>".$row['address']."</td>";
            print "<td class='text-center'><div class='btn-group' role='group' aria-label='group-".$row['id']."'>";
            ?> 
            <button onclick="editData('<?php echo $row['id'] ?>','<?php echo $row['name'] ?>','<?php echo $row['email'] ?>','<?php echo $row['phone'] ?>','<?php echo $row['address'] ?>')" class='btn btn-warning'>Edit</button>
            <button onclick="removeConfirm('<?php echo $row['id'] ?>')" class='btn btn-danger'>Trash</button>
            <?php 
            print "</div></td>";
            print "</tr>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    }
}
?>