<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php

// $strconcat = "";

$arrayPOST = $_POST;
// $strconcatlen = strlen($strconcat);
// echo $strconcatlen;
//Script to display existing classes and sections in the class section table

if ($arrayPOST) {
      $cn = $_POST['classNumber'];
      $sn = $_POST['subjectName'];
      $tn = $_POST['topicName'];
      $tyn = $_POST['typeName'];

      $chkArray = ['classNumber' => $cn, 'subjectName' => $sn, 'topicName' => $tn, 'typeName' => $tyn];
      $queryArray = array_filter($chkArray, 'strlen');   //will contain all items from chkArray that are not blank

      $key = array_keys($queryArray); //an array of all the keys in $key
      $val = array_values($queryArray); //an array of all the values in $val


      $keycount =count($key);  //$ key and $ val have same count

      echo "<div>";

      // for ($k=0;$k<$keycount;$k++) { //TEST TO SEE IF MAPPING HAPPENS CORRECTLY
      //   echo $key[$k]."-".$val[$k]."<br>";
      // }

}
else {echo "No post<br>";}

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

//#################################CODE############################################//


$query = $mysqli->query("SELECT * FROM `questionbank`");  //WORKS
$colNames = mysqli_fetch_fields($query);


for ($r=0;$r<count($colNames);$r++) { //for each item in the array of column names returned from the table
  $colName = $colNames[$r]->name;

  //fetch all columns of the query results
  if (in_array($colName,$key)){  //check if the current column name in the table-column-names returned array is also present in $key array
    echo $colName." is present in $ key<br>";
        while ($row=mysqli_fetch_assoc($query)) { //as long as the $query loop is going on
                  // if ($row['typeName']==$tyn){ //this was the original working code where it displayed all rows where the type name was the sme as was sent via POST
                  echo $row[$colName]." - ";
                          if (in_array($row[$colName],$val)){
                            echo $row['subjectName']."<br>";
                            // $rowId = $row['Id'];	//Id of the returned row
                            // echo "<tr id=$rowId>";
                            // $rowClassNumber = $row['classNumber']	;
                            // echo "<td class='col-sm-1'>".$rowClassNumber."</td>";
                            // $rowSubject = $row['subjectName'];
                            // echo "<td class='col-sm-3'>".$rowSubject."</td>";
                            // $rowTopic = $row['topicName'];
                            // echo "<td class='col-sm-2'>".$rowTopic."</td>";
                            // $rowType = $row['typeName'];
                            // echo "<td class='col-sm-2'>".$rowType."</td>";
                            // $rowQuestion = $row['question'];
                            // echo "<td class='col-sm-4'>".$rowQuestion."</td>";
                            echo "</tr>";
                            }
                  }
            }
            else {echo $colName." is not there in $ key<br>";}

    }

  echo "</div>";



if ($rowcount == 0) {echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";}
// $row=mysqli_fetch_assoc($query);

// echo "There are ".$rowcount." questions for class ".$val[0]." for ".$sn." for ".$tn." of type ".$tyn;

//#################################CODE############################################//
    echo "<caption><h5 class='centered'>Questions for ".$txt."</h5></caption>";  //comes from the choice made on index.php Questions button drop down
//#################################DB QUERY RESULT DISPLAY############################################//

    // while ($row=mysqli_fetch_assoc($query)) {
    // //fetch all columns of the query results
    //     if (in_array("typeName",$key)){
    //       if ($row['typeName']==$tyn){
    //           $rowId = $row['Id'];	//Id of the returned row
    //           echo "<tr id=$rowId>";
    //           $rowClassNumber = $row['classNumber']	;
    //           echo "<td class='col-sm-1'>".$rowClassNumber."</td>";
    //           $rowSubject = $row['subjectName'];
    //           echo "<td class='col-sm-3'>".$rowSubject."</td>";
    //           $rowTopic = $row['topicName'];
    //           echo "<td class='col-sm-2'>".$rowTopic."</td>";
    //           $rowType = $row['typeName'];
    //           echo "<td class='col-sm-2'>".$rowType."</td>";
    //           $rowQuestion = $row['question'];
    //           echo "<td class='col-sm-4'>".$rowQuestion."</td>";
    //           echo "</tr>";
    //       }
    //     }
    // }
    //#################################DB QUERY RESULT DISPLAY############################################//


  // {header('Location: ../SetUpPages/newQuestions.php');}
	mysqli_close($mysqli);
?>
