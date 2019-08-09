<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php
include "../basecode-create_connection.php";
// this is coming from newQuestions.php

if ($cln){
  if (strlen($cln)==0) {
      $txt = "ALL classes.";
      $msg = "any class";
    }
    elseif ($cln == "all") {
      $msg = "";
      $txt = "";
    }
    else {
      $txt = "Class ".$cln;
      $msg = "Class ".$cln;
    }
  }
// $arrayGET = $_POST;

//BUILD A QUERY STRING USING THE CLASSNUMBERS AND SUBJECTNAMES COMING FROM THE FORM WITH SUBMIT BUTTON ON NEWQUESTIONS PAGE
//THIS WILL DISPLAY ALL THE QUESTIONS IN THE DB FOR THAT COMBO OF CLASSNUMBERS AND/OR SUBJECTNAMES
//FURTHER FILTERING OF THE QUESTIONS IS HANDLES IN THE filterRecords.js file
$arrayPOST = $_POST;

$queryArray=[];
$queryString;
$cn = [];
$sn = [];
$i; $j;
$yes = 0;

$queryString = "SELECT * FROM `questionbank` WHERE ";

if ($arrayPOST) {
  if (count($arrayPOST['subjectName'])>0) {
    // echo "count( $ arrayPOST [subjectName ] ) IS ".count($arrayPOST['subjectName'])."<br>";
    array_push($queryArray,array_values($arrayPOST['subjectName']));
    // [1] => Array ( [0] => Hindi [1] => Maths ) example
  }
  if (count($arrayPOST['classNumber'])>0) { //since this is going to be an array, we push into the query array
    // echo "count( $ arrayPOST [classNumber ] ) IS ".count($arrayPOST['classNumber'])."<br>";
    array_push($queryArray,array_values($arrayPOST['classNumber']));
    // [0] => Array ( [0] => I [1] => II ) example
  }


          for ($x = 0; $x < count($queryArray[0]); $x++) {  //$queryArray[0] is array of subjects in $arrayPOST
                if($x == 0) {
                    $queryString = $queryString."(`subjectName`=  '".$queryArray[0][$x]."' "; //first subject in array can be appended to querySTRING directly
                } else {
                    $queryString = $queryString."OR `subjectName`= '".$queryArray[0][$x]."' ";  //every subsequent subject needs to be appended with an "OR" to the query string
                }
          }
          if ($arrayPOST['topicName']) {
            $tn = $arrayPOST['topicName'];
            $queryString = $queryString."AND `topicName` = '".$tn."' ";
          }
          if ($arrayPOST['typeName']) {
            $tyn = $arrayPOST['typeName'];
            $queryString = $queryString."AND `typeName` = '".$tyn."' ";
          }
        $queryString = $queryString.") ";

        if(count($queryArray[0])>0) { // If the arrayPOST( same as in $queryArray )has classNumbers too, then we need an "AND in the query string"
          $queryString = $queryString."AND ";
        }


        for ($x = 0; $x < count($queryArray[1]); $x++) {  //$queryArray[1] is array of classes in $arrayPOST

            if($x == 0) {
                $queryString = $queryString."(`classNumber`= '".$queryArray[1][$x]."' ";  //first class in array can be appended to querySTRING directly
            } else {
              $queryString = $queryString."OR `classNumber`= '".$queryArray[1][$x]."' ";  //every subsequent class needs to be appended with an "OR" to the query string
            }
          }

  $queryString = $queryString.") "; //close the queryString




echo "<div>";
// $query = $mysqli->query("SELECT * FROM `questionbank`");  //WORKS
$query = $mysqli->query($queryString);  //use the queryString built above
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
    $encounter = 0;
      foreach ($queryArray as $key => $val) { //in query array, classNumber and subjectName will be arrays

          for ($v=0;$v<count($val);$v++) {
            if (in_array($val[$v],$row)) {

            $counter = $counter + 1;
          } else {

            $encounter = $encounter + 1;
          }
        }
      }

      if ($counter>0) {
         $f = $f + 1;
         echo "<tr>";
            echo "<td class='col-sm-1'>".$f."</td>";
            echo "<td class='col-sm-1'>".$row['classNumber']."</td>";
            echo "<td class='col-sm-2'>".$row['topicName']."</td>";
            echo "<td class='col-sm-2'>".$row['typeName']."</td>";
            echo "<td class='col-sm-6'>".$row['question']."</td>";
         echo "</tr>";

       }
  }

} else {

}
  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
