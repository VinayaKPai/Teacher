<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php
include "../basecode-create_connection.php";
// this is coming from newQuestions.php

// if ($cln == "all") {
//   $txt = "ALL classes.";
//   $msg = "any class";
// }
// elseif (strlen($cln)==0) {
//   $msg = "";
//   $txt = "";
// }
// else {
//   $txt = "Class ".$cln;
//   $msg = "Class ".$cln;
// }

$arrayPOST = $_POST;
$queryArray;
$yes = 0;
if ($arrayPOST) {
      $cn = $_POST['classNumber'];
      $sn = $_POST['subjectName'];
      $tn = $_POST['topicName'];
      $tyn = $_POST['typeName'];

      $queryArray = array_filter($arrayPOST, 'strlen');   //will contain all items from $arrayPOST that are not blank
      $queryArrayCount = count($queryArray);
      echo "<br>";
}
else {echo "No post<br>";}

echo "<div>";
$query = $mysqli->query("SELECT * FROM `questionbank`");  //WORKS

$rowcount = mysqli_num_rows($query);      //number of rows returned from the table - WORKS
if ($rowcount == 0) {
  echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";
}

// echo "<caption><h5 class='centered'>".$noq."Questions</h5></caption>";  //comes from the choice made on index.php Questions button drop down

echo "</div>";
$f=0;
echo "<tr>";
  echo "<th class='centered'>S No</th>";
  echo "<th class='centered'>Id</th>";
  echo "<th class='centered'>Topic</th>";
  echo "<th class='centered'>Type</th>";
  echo "<th class='centered'>Question</th>";
echo "</tr>";
  while ($row=mysqli_fetch_assoc($query)) { //as long as the $query loop is going on
    $counter = 0;
      foreach ($queryArray as $key => $val) {
          if ($row[$key]==$val) {
            $counter = $counter + 1;
          }
      }
       if ($counter==count($queryArray)) {
         $f = $f + 1;
         echo "<tr>";
            echo "<td class='col-sm-1'>".$f."</td>";
            echo "<td class='col-sm-1'>".$row['Id']."</td>";
            echo "<td class='col-sm-2'>".$row['topicName']."</td>";
            echo "<td class='col-sm-2'>".$row['typeName']."</td>";
            echo "<td class='col-sm-6'>".$row['question']."</td>";
         echo "</tr>";
       }
  }

  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
