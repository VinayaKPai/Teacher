<style>
 table {width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';}
</style>
<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
include $_SERVER['DOCUMENT_ROOT'].'../Scripts/php/queryBuilder.php';
include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";

// this is coming from newQuestions.php
$queryString;
$arrayPOST = $_POST;
$arrayGET = $_GET;
  if ($arrayGET)  {
      $getSubjectName = explode (",", $_GET['subjectName']);
      $getClassNUMber = explode (",", $_GET['classNumber']);
    }
$selectedClassNumbers = [];
if (isset($arrayPOST['classNumber'])) {$selectedClassNumbers = array_values($arrayPOST['classNumber']);}
if (isset($arrayGET['classNumber'])) {
  $selectedClassNumbers = $getClassNUMber;
}
$selectedSubjectNames = [];
if (isset($arrayPOST['subjectName'])) {$selectedSubjectNames = array_keys($arrayPOST['subjectName']);}
if (isset($arrayGET['subjectName'])) {$selectedSubjectNames = $getSubjectName;}

// $selectedTopicName;
// if (isset($arrayPOST['topicName'])) {$selectedTopicName = $arrayPOST['topicName'];}
// $selectedTypeName;
// if (isset($arrayPOST['typeName'])) {$selectedTypeName = $arrayPOST['typeName'];}


//BUILD A QUERY STRING USING THE CLASSNUMBERS AND SUBJECTNAMES COMING FROM THE FORM WITH SUBMIT BUTTON ON NEWQUESTIONS PAGE
//THIS WILL DISPLAY ALL THE QUESTIONS IN THE DB FOR THAT COMBO OF CLASSNUMBERS AND/OR SUBJECTNAMES
//FURTHER FILTERING OF THE QUESTIONS IS HANDLES IN THE filterRecords.js file
if ($selectedClassNumbers || $selectedSubjectNames) {
        // $queryString = "SELECT questionbank.qId AS 'ID', classes.classNumber AS `Class`, subjects.Subject AS `Subject`, topics.topicName AS `Topic`, questiontype.typeName AS `Type`, questionbank.question AS `Question`, questionbank.Option_1 AS `Option 1`, questionbank.Option_2 AS `Option 2`, questionbank.Option_3 AS `Option 3`, questionbank.Option_4 AS `Option 4`, questionbank.Option_5 AS `Option 5`, questionbank.Option_6 AS `Option 6` FROM questionbank, classes, questiontype, subjects, topics WHERE " ;


        $queryString = "SELECT * FROM questionbank, classes, subjects WHERE ";


        if ($selectedClassNumbers) {
          $queryString = addClassNumbersToQueryString($queryString, $selectedClassNumbers);
        }

          if ($selectedSubjectNames) {
            if ($arrayPOST) {
            $queryString = addSubjectNamesToQueryString($queryString, isset($arrayPOST['classNumber']), $selectedSubjectNames );
            }
            if ($arrayGET) {
            $queryString = addSubjectNamesToQueryString($queryString, isset($arrayGET['classNumber']), $selectedSubjectNames );
            }
          }

          // if($selectedTopicName) {
          //   $queryString = addTopicNameToQueryString( $queryString, isset($arrayPOST['classNumber']), isset($arrayPOST['subjectName']), $selectedTopicName );
          // }
          //
          // if($selectedTypeName) {
          //   $queryString = addTypeNameToQueryString( $queryString, isset($arrayPOST['classNumber']), isset($arrayPOST['subjectName']), isset($arrayPOST['topicName']), $selectedTypeName );
          // }

// $queryString = $queryString." AND classes.classId = questionbank.classId AND subjects.subjectId = questionbank.subjectId ";
$queryString = $queryString." AND classes.classId = questionbank.classId AND subjects.subjectId = questionbank.subjectId";
        echo $queryString;
        $queryResult = $mysqli->query($queryString);  //use the queryString built above
        // if ($_POST){print_r($queryResult);}
        // table(false, $queryResult);
        // echo "<div>
        //         <span style='float: left'> There are ".mysqli_num_rows($queryResult)." question in the QB</span>
        //         <span class='col-6 dropdown' style='float: right;'>With selected questions create a
        //           <button id='assignment' class='btn btn-info' onclick='selectActivity(this)'>Assignment </button>
        //         	<button id='test' class='btn btn-info' onclick='selectActivity(this)'>Test </button>
        //         	<button id='quiz' class='btn btn-info' onclick='selectActivity(this)'>Quiz </button>
        //           <button id='CBSEpractice' class='btn btn-info' onclick='selectActivity(this)'>CBSE Practice </button>
        //         </span>
        //       </div>";
        $row=$queryResult->fetch_assoc();
        // header row

        $rwcnt = 0;
        echo "<table>
                <thead>
                  <th>S No.</th>
                  <th>Class</th>
                  <th>Subject</th>
                  <th>Question</th>
                  <th>Option 1</th>
                  <th>Option 2</th>
                  <th>Option 3</th>
                  <th>Option 4</th>
                  <th>Option 5</th>
                  <th>Option 6</th>
                  <th>Action</th>
              </thead>";
        while ($row=$queryResult->fetch_assoc()) {
          $rwcnt = $rwcnt + 1;
          $qid = $row['qId'];
            // table body
            echo "<tr>
                    <td>".$rwcnt."</td>
                    <td>".$row['classNumber']."</td>
                    <td>".$row['Subject']."</td>
                    <td>".$row['question']."</td>
                    <td>".$row['Option_1']."</td>
                    <td>".$row['Option_2']."</td>
                    <td>".$row['Option_3']."</td>
                    <td>".$row['Option_4']."</td>
                    <td>".$row['Option_5']."</td>
                    <td>".$row['Option_6']."</td>
                    <td><input type='checkbox' id='$qid' name='qid' onclick='selectedQuestionDisplay(this)'/></td>
                  </tr>";
        }
        echo "</table>";
        // {header('Location: ../../SetupPages/newQuestions.php');}
        	//mysqli_close($mysqli);
}

?>
