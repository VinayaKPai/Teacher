<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";
//THIS FUNCTION RETURNS THE QUESTIONS FOR THE SELECTED TOPIC FROM THE QUESTIONBANK
  $topicId = $_GET['topicId'];

        $rwcnt = 0;

        $query = $mysqli->query("SELECT * FROM questionbank, topics, classes, subjects WHERE questionbank.qb_topicId = $topicId AND topics.topicId = $topicId AND classes.classId = questionbank.qb_classId AND subjects.subjectId = topics.topic_subjectId");

        $cnt = mysqli_num_rows($query);

        if ($cnt == 0) {
          $tquery = $mysqli->query("SELECT * FROM topics, classes, subjects WHERE `topicId` = $topicId AND subjects.subjectId = topics.topic_subjectId AND classes.classId = topics.topic_classId");
            $trow=$tquery->fetch_assoc();
            echo  "<div class='modal-header centered' style='font-weight: bold; color: #f0f0f0;'>CLASS: ".$trow['classNumber']." &emsp; SUBJECT: ".$trow['Subject']."
                      <button type='button' class='close' data-dismiss='modal' onclick='resetModal()''>&times;</button>
                  </div>
                  <div class='modal-body'>" ;
          echo "<h4 class='modal-title centered' style='color: Red; background: #DDD;'>Topic <span  style='text-decoration: underline;'>". $trow['topicName']."</span>Number of questions: <span  style='text-decoration: underline;'>0</span></h4></div><div class='modal-footer'>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div>";
        }
        else {
          $row=$query->fetch_assoc();
          echo  "<div class='modal-header centered' style='font-weight: bold; color: #f0f0f0;'>CLASS: ".$row['classNumber']." &emsp; SUBJECT: ".$row['Subject']."
                    <button type='button' class='close' data-dismiss='modal' onclick='resetModal()''>&times;</button>
                </div>
                <div class='modal-body'>" ;
                  echo "<h4 class='modal-title centered'>Topic:<span style='text-decoration: underline; color: Green;'> ".$row['topicName'] ."</span> Number of questions: <span style='text-decoration: underline; color: Green;'>".$cnt ."</span></h4>";
          echo "<table style='background: #dedede; '>
                <thead style='border-bottom: 1px solid #000; background: #0a0a0c'>
                  <th class='col-sm-2'>Sl No.</th>
                  <th class='col-sm-2'>Question</th>
                  <th class='col-sm-2'>Option 1</th>
                  <th class='col-sm-2'>Option 2</th>
                  <th class='col-sm-2'>Option 3</th>
                  <th class='col-sm-2'>Option 4</th>
                  <th class='col-sm-2'>Option 5</th>
                  <th class='col-sm-2'>Option 6</th>
                  <th class='col-sm-3'>ACTION</th>
                </thead>";

          while ($row=$query->fetch_assoc()) {
            $rwcnt = $rwcnt + 1;
            $title = $row['topicName'];
            echo "<tr title='$title'>";
            echo "<td style='padding:5px; border-right:solid 1px black;' class='col-sm-1'>".$rwcnt."</td>
                  <td style='padding:5px; border-right:solid 1px black;' class='col-sm-9'>".$row['question']."</td>
                  <td>".$row['Option_1'] ."</td>
                  <td>".$row['Option_2']." </td>
                  <td>".$row['Option_3'] ."</td>
                  <td>".$row['Option_4'] ."</td>
                  <td>".$row['Option_5'] ."</td>
                  <td>".$row['Option_6'] ."</td>
                  <td class='col-sm-2'>
                    <button class='btn-xs btn-info' style='float:right;' style='color:white; cursor: pointer;' onclick='removeQuestion()' >Delete</button>
                  </td>";
            echo "</tr>";
            }
        echo "</table></div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div>";
      }

?>
