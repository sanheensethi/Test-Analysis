<?php
 include "../libs/db/pdo.php";
 $name = $_POST['name'];
?>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <th>Student Name</th>
    <th>Place</th>
    <th>Show</th>
  </thead>
  <tbody>
      <?php
       try{
         $stmt = $db->prepare("SELECT * FROM user WHERE username LIKE '%".$name."%' OR batchplace LIKE '%".$name."%' ");
         $stmt->execute();
         $results = $stmt->fetchAll(PDO::FETCH_OBJ);
         if($results){
          for($i=0;$i<count($results);$i++){
            echo "<input type='hidden' id='uid' value='".$results[$i]->userid."'>";
            echo "<tr>";
            echo "<td>".$results[$i]->fullname."</td>";
            echo "<td>".$results[$i]->batchplace."</td>";
            echo "<td>"."<a href='../Graph/?id=".$results[$i]->userid."' style='color:green;font-size:20px' class='fa fa-eye'></a>"."</td>";
          }
         }
        }catch(PDOException $e){
         echo $e->getMessage();
        }
      ?>
  </tbody>
</table>