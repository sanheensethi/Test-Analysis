<?php
 include "../libs/db/pdo.php";
 $id = $_POST['id']; /*userid*/
 $testname=$_POST['testname'];
?>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <th>Test Name</th>
    <th>Date</th>
    <th>Total</th>
    <th>Attempt</th>
    <th>Blank</th>
    <th>Right</th>
    <th>Wrong</th>
    <th>Edit</th>
    <th>Delete</th>
  </thead>
  <tbody>
      <?php
        try{
         $stmt = $db->prepare("SELECT * FROM datapoints WHERE userid=".$id." AND testname LIKE '%".$testname."%' ORDER BY  date ASC");
         $stmt->execute();
         $results = $stmt->fetchAll(PDO::FETCH_OBJ);
         if($results){
          for($i=0;$i<count($results);$i++){
            echo "<input type='hidden' id='uid' value='".$results[$i]->testid."'>";
            echo "<tr>";
            echo "<td>".$results[$i]->testname."</td>";
            echo "<td>".date("d-m-Y",strtotime($results[$i]->date))."</td>";
            echo "<td>".$results[$i]->total_ques."</td>";
            echo "<td>".$results[$i]->attempt."</td>";
            echo "<td>".$results[$i]->blank."</td>";
            echo "<td>".$results[$i]->rht."</td>";
            echo "<td>".$results[$i]->wrong."</td>";
            echo "<td>"."<a id='edt' href='../update/?id=".$results[$i]->testid."' style='color:green;font-size:20px' class='fa fa-magic'></a>"."</td>";
            echo "<td>"."<a id='tsh' data-id='".$results[$i]->testid."' style='color:red;font-size:20px' class='fa fa-trash'></a>"."</td>";
          }
         }
        }catch(PDOException $e){
         echo $e->getMessage();
        }
      ?>
  </tbody>
</table>