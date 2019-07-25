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
$f = 0;
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
if ($rowcount == 0) {echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";}
else {echo "<h6 style='color: Red;'>Here you are!".$msg."</h6>";}

echo "<caption><h5 class='centered'>Questions for ".$txt."</h5></caption>";  //comes from the choice made on index.php Questions button drop down

echo "</div>";

  while ($row=mysqli_fetch_assoc($query)) { //as long as the $query loop is going on
    echo " enter for loop<br>";
    print_r($queryArray);
    echo "<br>";
    for ($q=0;$q<count($queryArray);$q++) {//query array is key value pairs from $ post count = no of dropdowns selected
      $thisKey = (array_keys($queryArray)[$q]); //pick out the key part of the current item in the for loop
      $thisValue = array_values($queryArray)[$q];
      if ($row[$thisKey]==$thisValue) {
        echo "$ thisKey = ".$thisKey." and yes = ".$yes;

        }
        $yes = $yes + 1;
        echo "<br>exit if".$yes." <br>";

              }echo "<br>Exit for".$yes." <br>";
              echo "<br>$ queryArrayCount".$queryArrayCount."<br>";
              if ($yes===$queryArrayCount){
                // $rowId = $row['Id'];	//Id of the returned row
                echo "<tr>";
                $rowClassNumber = $row['classNumber']	;
                echo "<td class='col-sm-1'>".$rowClassNumber."</td>";
                $rowSubject = $row['subjectName'];
                echo "<td class='col-sm-3'>".$rowSubject."</td>";
                $rowTopic = $row['topicName'];
                echo "<td class='col-sm-2'>".$rowTopic."</td>";
                $rowType = $row['typeName'];
                echo "<td class='col-sm-2'>".$rowType."</td>";
                $rowQuestion = $row['question'];
                echo "<td class='col-sm-4'>".$rowQuestion."</td>";
                echo "</tr>";
              }
              $yes = 0;
              $f = $f + 1;
              echo $f." before exit while";
  }
  echo "^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^<br>".$f;


  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
