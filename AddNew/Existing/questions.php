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

// $arrayPOST = array_values($_POST);
$arrayPOST = $_POST;

$queryArray=[];
$queryString;
$cn = [];
$sn = [];
$i; $j;
$yes = 0;
// if ($arrayPOST) {
//       if (count($arrayPOST['classNumber'])>0) { //since this is going to be an array, we push into the query array
//
//         array_push($queryArray,array_values($arrayPOST['classNumber']));
//         // [0] => Array ( [0] => I [1] => II ) example
//       }
//       if (!count($arrayPOST['subjectName'])==0) {
//
//         array_push($queryArray,array_values($arrayPOST['subjectName']));
//         // [1] => Array ( [0] => Hindi [1] => Maths ) example
//       }
//       if (!strlen($arrayPOST['topicName'])==0) {
//         array_push($queryString,array_values($arrayPOST['subjectName']));
//       }
//       if (!strlen($arrayPOST['typeName'])==0) {
//         array_push($queryString,array_values($arrayPOST['subjectName']));
//       }
//       // $queryArray = array_filter($arrayPOST, 'strlen');   //will contain all items from $arrayPOST that are not blank
//       $queryArrayCount = count($queryArray);
// //       echo "<br>QUERY ARRAY POST<br>";
// //       print_r ($queryArray); echo "<br>"; print_r($queryArrayCount);
// // echo "@#$#<br>";
// }
// else {echo "No post<br>";}
// SELECT * FROM `questionbank` WHERE (`subjectName`= 'SocialStudies' OR `subjectName`= 'Science') AND (`classNumber`= 'II' OR `classNumber`= 'IX')
$queryString = "SELECT * FROM `questionbank` WHERE ";

if ($arrayPOST) {
  if (!count($arrayPOST['subjectName'])==0) {
    array_push($queryArray,array_values($arrayPOST['subjectName']));
    // [1] => Array ( [0] => Hindi [1] => Maths ) example
  }
  if (count($arrayPOST['classNumber'])>0) { //since this is going to be an array, we push into the query array
    array_push($queryArray,array_values($arrayPOST['classNumber']));
    // [0] => Array ( [0] => I [1] => II ) example
  }

  print_r ($queryArray);
  for ($x = 0; $x < count($queryArray[0]); $x++) {
    // echo "The number is: $x <br>";
    if($x == 0) {
      $queryString = $queryString."(`subjectName`=  '".$queryArray[0][$x]."' ";
    } else {
      $queryString = $queryString."OR `subjectName`= '".$queryArray[0][$x]."' ";
    }
  }
  $queryString = $queryString.") ";
  if(count($queryArray[0])>0) {
    $queryString = $queryString."AND ";
  }
  for ($x = 0; $x < count($queryArray[1]); $x++) {

    // echo "The number is: $x <br>";
    if($x == 0) {
        $queryString = $queryString."(`classNumber`= '".$queryArray[1][$x]."' ";
    } else {
      $queryString = $queryString."OR `classNumber`= '".$queryArray[1][$x]."' ";
    }
  }
  $queryString = $queryString.") ";
  echo $queryString;
} else {

}



echo "<div>";
// $query = $mysqli->query("SELECT * FROM `questionbank`");  //WORKS
$query = $mysqli->query($queryString);
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

  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
