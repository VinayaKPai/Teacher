<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php
include "../basecode-create_connection.php";
// this is coming from newQuestions.php
if ($cln == "all") {
  // $query = $mysqli->query("SELECT * FROM questionbank");
  $txt = "ALL classes.";
  $msg = "any class";
}
else {
  $txt = "Class ".$cln;
  $msg = "Class ".$cln;
}

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
echo "query array = "; print_r($queryArray); //PERFECT

$query = $mysqli->query("SELECT * FROM `questionbank`");  //WORKS

$rowcount = mysqli_num_rows($query);      //number of rows returned from the table - WORKS
if ($rowcount == 0) {
  echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";
}
else {
  echo "<h6 style='color: Red;'>Here you are!".$msg."</h6>";
}

echo "<caption><h5 class='centered'>Questions for ".$txt."</h5></caption>";  //comes from the choice made on index.php Questions button drop down

echo "</div>";
$f=0;
  while ($row=mysqli_fetch_assoc($query)) { //as long as the $query loop is going on

    if ($queryArray['classNumber']) {
          $cns = $queryArray['classNumber'];
          if ($row['classNumber']==$cns) {
              if ($queryArray['typeName']) {
                $typs = $queryArray['typeName'];
                    if ($row['typeName']==$typs) {
                      echo "Yes<br>";
                      $f=$f+1;
                      echo ($f)."<br>";
                      echo $cns." - ".$row['typeName']." - ".$row['question']."<br><br>";
                      mysqli_error($mysqli);
                }
              }
          }
    }
    else {echo $queryArray['classNumber']." does not exist in table";}

  }
  echo "^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^<br>";


  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
