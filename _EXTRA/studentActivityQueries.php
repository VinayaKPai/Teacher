<?php
include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deployAQT_QueryResultToHtmlDiv.php";

      function testViews($type, $status, $mysqli) { //using views testViews
        // $str = '';
        $successFlag = '';
        $queryString = ("SELECT * FROM `completed` WHERE `Class Id`='$status' AND `SectionId`='$type' ");

         $query = $mysqli->query($queryString);
         //function deploymentsdiv( $result, $type, $successFlag, $status ) - parameters req'd for
         deploymentsdiv($query, $type, $successFlag, $status);
      }
 ?>
