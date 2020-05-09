<?php

function addClassNumbersToQueryString( $queryString, $selectedClassNumbers ) {
  // if ($classNumberExists) {
    // $queryString = $queryString." AND "; // REMOVING THIS LINE AFTER BACKING UP THE QUESTIONS . PHP SHOULD BE RESTORED IF ORIGINAL FILE IS USED
  // }
  $queryString = $queryString."(";
  for ($x = 0; $x < count($selectedClassNumbers); $x++) {
          if($x > 0) {
            $queryString = $queryString."OR ";  //The OR needs to be added to the statement only if there are more than 1 selected entries
          }
          $queryString = $queryString."classId = '".$selectedClassNumbers[$x]."' ";  //Adding of the class number is common to all statements, and so this will always get executed.
          // $queryString = $queryString."classId = '".$selectedClassNumbers[$x]."' ";
  }
  $queryString = $queryString.") ";
  return $queryString;
}

function addSubjectNamesToQueryString( $queryString, $classNumberExists, $selectedSubjectNames ) {
  // if ($classNumberExists) {
    $queryString = $queryString." AND ";
  // }
  $queryString = $queryString."(";
  for ($x = 0; $x < count($selectedSubjectNames); $x++) {
    if($x > 0) {
      $queryString = $queryString."OR ";  //The OR needs to be added to the statement only if there are more than 1 selected entries
    }
    // $queryString = $queryString."subjects.Subject = '".$selectedSubjectNames[$x]."' ";  //Adding of the class number is common to all statements, and so this will always get executed.
    $queryString = $queryString."subjectId = '".$selectedSubjectNames[$x]."' ";
  }
  $queryString = $queryString.") ";
  // echo $queryString;
  return $queryString;
}
//
// function addTopicNameToQueryString( $queryString, $classNumberExists, $subjectNameExists, $selectedTopicName ) {
//   if ($selectedTopicName!="") {
//     // if ( $classNumberExists || $subjectNameExists) {
//       $queryString = $queryString."AND ";
//     // }
//     $queryString = $queryString."topics.Name = '".$selectedTopicName."' ";
//     // $queryString = $queryString."<br>";
//   }
//   return $queryString;
// }
//
// function addTypeNameToQueryString( $queryString, $classNumberExists, $subjectNameExists, $topicNameExists, $selectedTypeName) {
//   if ($selectedTypeName!="") {
//     // if ($classNumberExists || $subjectNameExists || $topicNameExists) {
//       $queryString = $queryString."AND ";
//     // }
//     $queryString = $queryString."questiontype.typeName = '".$selectedTypeName."' ";
//     // $queryString = $queryString."<br>";
//   }
//   return $queryString;
// }
function addQuestionIdsToQueryString( $queryString, $selectedQuestionIds ) {
  // if ($classNumberExists) {
    // $queryString = $queryString." AND "; // REMOVING THIS LINE AFTER BACKING UP THE QUESTIONS . PHP SHOULD BE RESTORED IF ORIGINAL FILE IS USED
  // }
  $queryString = $queryString."(";
  for ($x = 0; $x < count($selectedQuestionIds); $x++) {
          if($x > 0) {
            $queryString = $queryString."OR ";  //The OR needs to be added to the statement only if there are more than 1 selected entries
          }
          $queryString = $queryString."qId = '".$selectedQuestionIds[$x]."' ";
  }
  $queryString = $queryString.") ";
  return $queryString;
}



?>
