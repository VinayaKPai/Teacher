<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php

$strconcat = "";

$arrayPOST = $_POST;
$strconcatlen = strlen($strconcat);
echo $strconcatlen;
//Script to display existing classes and sections in the class section table

if ($arrayPOST) {
      $cn = $_POST['classNumber'];
      $sn = $_POST['subjectName'];
      $tn = $_POST['topicName'];
      $tyn = $_POST['typeName'];
      echo "<div style='border: 1px solid Red;'>";
      echo $cn." is a ".gettype($cn)." of length ".strlen($cn)."<br>";
      echo $sn." is a ".gettype($sn)." of length ".strlen($sn)."<br>";
      echo $tn." is a ".gettype($tn)." of length ".strlen($tn)."<br>";
      echo $tyn." is a ".gettype($tyn)." of length ".strlen($tyn)."<br>";
      echo "</div>";
}
else {echo "No post<br>";}

include "../basecode-create_connection.php";
// this is coming from newQuestions.php
if ($cln == "all") {
 $query = $mysqli->query("SELECT * FROM questionbank");
 $txt = "ALL classes.";
 $msg = "any class";
}

else {

      $txt = "Class ".$cln;
      $msg = "Class ".$cln;
    }
echo "String start <br>";
//NOW WORKING ON ALL THE POST VARIABLES
    // $query = "$"."mysqli"."->"."query(\"SELECT * FROM questionbank WHERE";
    //
    if (strlen($cn) !== 0) { //classNumber is not blank
      $concn = " classNumber = ";
      $strconcat = $concn."'".$cn."'";
    }
    if (strlen($sn) !== 0) {  //subjectName is not blank
       if (strlen($strconcat) !== 0) { //check if strconcat is not blank
        $consn = " AND subjectName = ";  //since strconcat is not blank, means need 'AND' before next column name
        $strconcat = $strconcat.$consn."'".$sn."'";
      }
        else {
          $consn = " subjectName = ";
          $strconcat = $strconcat.$consn."'".$sn."'";  //since strconcat is blank, means doesn't need 'AND' before next column name
        }
    }

    if (strlen($tn) !== 0) {  //topicName is not blank
      if (strlen($strconcat) !== 0) { //check if strconcat is not blank
          $contn = " AND topicName = ";
          $strconcat = $strconcat.$contn."'".$tn."'";
        }
        else {
          $contn = " topicName = ";
          $strconcat = $strconcat.$contn."'".$tn."'";
        }   //since strconcat is blank, means doesn't need 'AND' before next column name
    }
    if (strlen($tyn) !== 0) { //typeName is not blank  &
      if (strlen($strconcat) !== 0) {
        $contyn = " AND topicName = ";
        $strconcat = $strconcat.$contyn."'".$tyn."'";     //since strconcat is not blank, means need 'AND' before next column name
          }
          else {
            $contyn = " typeName = ";
            $strconcat = $strconcat.$contyn."'".$tyn."'";
          }   //since strconcat is blank, means doesn't need 'AND' before next column name
    }
    $rr = "$"."mysqli"."->"."query(\"SELECT * FROM questionbank WHERE";
$rr = $rr.$strconcat." \")";
echo $rr;
//
$qstm = "\"SELECT * FROM questionbank WHERE".$strconcat." \"";
// echo $qstm;
$query = $mysqli->query($qstm);
    // echo $query;
    // echo " \")";
    // echo "<br> end string";

    echo "<caption><h5 class='centered'>Questions for ".$txt."</h5></caption>";  //comes from the choice made on index.php Questions button drop down

    $rowcount=mysqli_num_rows($query); //number of results returned by the query - 0 (if not present)
      if ($rowcount == 0) {echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";}

    while ($row=mysqli_fetch_assoc($query)) {
    //fetch all columns of the query results

          $rowId = $row['Id'];	//Id of the returned row
          echo "<tr id=$rowId>";
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



  // {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
