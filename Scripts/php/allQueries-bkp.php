<?php
  // include "basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deployQueryResultToHtmlDiv.php";


  function activity($type, $status, $mysqli) {
    $queryString = "SELECT deploymentlog.depType AS 'Type', deploymentlog.depId AS 'Id', deploymentlog.classId AS 'Class', deploymentlog.sectionId AS 'Section', deploymentlog.schStartDate AS 'Open From', deploymentlog.schEndDate AS 'Open Till', deploymentlog.deploySuccess AS 'Deployed?', assessments.assessment_Title AS 'Title', assessments.assessment_Id FROM deploymentlog, assessments WHERE deploymentlog.assessmentId = assessments.assessment_Id AND deploymentlog.depType = '$type'";

    $queryString1 = "SELECT * FROM assessments";
    $query1 = '';
    $cnt1 = '';

    $stdt = '';

    $successFlag = '';
    if ($status == "ongoing") {
      $str = "deploymentlog.schStartDate < CURDATE() AND deploymentlog.schEndDate > CURDATE() AND deploymentlog.deploySuccess = 1";
      $successFlag = 1;
      $queryString = $queryString." AND ".$str ;
    }
    if ($status == "completed") {
      $str = "deploymentlog.schStartDate < CURDATE() AND deploymentlog.schEndDate < CURDATE() AND deploymentlog.deploySuccess = 1";
      $successFlag = 1;
      $queryString = $queryString." AND ".$str ;
    }
    if ($status == "undeployed") {
      $str = "deploymentlog.deploySuccess = 0";
      $successFlag = 0;
      $queryString = $queryString." AND ".$str ;
    }
    if ($status == "all") {
      //THE query itself has to be different because this needs to picjk from assessments table and not deploymentlog table
      $queryString = "SELECT assessments.assessment_Id, assessments.assessment_Title AS 'Title', assessment_questions.question_id AS 'Questions', assessments.assessment_Id AS 'Id' FROM assessments, assessment_questions WHERE assessments.assessment_Id = assessment_questions.assessment_Id ";
    }


    echo $queryString;

    $query = $mysqli->query($queryString);

    $cnt = mysqli_num_rows($query);
    if ($cnt>0) {
        while ($row=$query->fetch_assoc()) {
          $assId = $row['Id'];
          // echo "From outer assessments.assessment_Id".$assId."-";
          $qquery = $mysqli->query("SELECT assessment_questions.assessment_Id AS 'Id', questionbank.classId AS 'Class', questionbank.qId, questionbank.question , questionbank.Option_1, questionbank.Option_2, questionbank.Option_3, questionbank.Option_4, questionbank.Option_5, questionbank.Option_6 FROM questionbank, assessments, assessment_questions WHERE assessments.assessment_Id = $assId AND assessment_questions.assessment_Id =  $assId AND assessment_questions.question_id = questionbank.qId");

          //TRYING TO GET THE QUESTIONS FROM THE QUESTIONBANK USING ASSESSMENT_QUESTIONS table
          $rrow=$qquery->fetch_assoc();
echo "SELECT assessment_questions.assessment_Id AS 'Id', questionbank.classId AS 'Class', questionbank.qId, questionbank.question, questionbank.Option_1, questionbank.Option_2, questionbank.Option_3, questionbank.Option_4, questionbank.Option_5, questionbank.Option_6 FROM questionbank, assessments, assessment_questions WHERE assessments.assessment_Id = $assId AND assessment_questions.assessment_Id =  $assId AND assessment_questions.question_id = questionbank.qId";
      }
        div($query, $qquery, $cnt, $type, $successFlag, $status);
    }
    else {
      div(false, false, 0, $type, $successFlag, $status);
    }
  }

// // Ref: Activity/completed quizzes
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'Q' AND deploymentlog.schEndDate < CURDATE() AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId");
//
// // Ref: Activity/completed tests
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'T' AND deploymentlog.schEndDate < '$curdate' AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId ");
//
// // Ref: Activity/ongoing assignments
// 	$query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'A' AND deploymentlog.schStartDate < '$curdate' AND deploymentlog.schEndDate > '$curdate' AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId ");
//
// // Ref: Activity/ongoing quizzes
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'Q' AND deploymentlog.schStartDate < curdate() AND deploymentlog.schEndDate > curdate() AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId");
//
// // Ref: Activity/ongoing tests
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'T' AND deploymentlog.schStartDate < '$curdate' AND deploymentlog.schEndDate > '$curdate' AND deploymentlog.deploySuccess = 1 AND assessments.assessment_Id = deploymentlog.assessmentId ");
//
// // Ref: Activity/undeployed assignments
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'A' AND  deploymentlog.deploySuccess = 0 AND assessments.assessment_Id = deploymentlog.assessmentId");
//
// // Ref: Activity/undeployed quizzes
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'Q' AND  deploymentlog.deploySuccess = 0 AND assessments.assessment_Id = deploymentlog.assessmentId");
//
// // Ref: Activity/undeployed tests
//   $query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'T' AND  deploymentlog.deploySuccess = 0 AND assessments.assessment_Id = deploymentlog.assessmentId");

// Ref: AddNew/checkclasssections
//   $query = $mysqli->query("SELECT * FROM classes_taught_by_teachers WHERE classNumber = '$classNumber' AND sectionAlpha = '$sectionAlpha'");
//
// Ref: AddNew/checkstudents
//   $query = $mysqli->query("SELECT * FROM studentdetails WHERE firstName = '$firstName' AND lastName = '$lastName' AND phoneMobile = '$phoneMobile'");
//
// Ref: Existing/activity
//   $query = $mysqli->query("SELECT * FROM assessments");
//   $qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");
//   $requery = $mysqli->query("SELECT * FROM deploymentlog WHERE `assessmentId`= $aid ");
//
// Ref: Exixting/classes_taught_by_teachers
// $query = $mysqli->query("SELECT users.userId, users.firstName, users.middleName, users.lastName, classes.classNumber, sections.Sections, subjects.Subject
//           FROM users, classes_taught_by_teacher, classes, sections, subjects
//           WHERE users.userId = classes_taught_by_teacher.userId AND classes.classId = classes_taught_by_teacher.classId AND sections.sectionId = classes_taught_by_teacher.sectionId AND classes_taught_by_teacher.subjectId = subjects.subjectId ORDER BY classes.classId ASC, sections.Sections ASC,  subjects.Subject ASC ");
//
// Ref: Existing/students
//   $query = $mysqli->query("SELECT * FROM users, studentdetails, classes, sections WHERE users.userId = studentdetails.userId AND users.role = 'S'
//   AND classes.classId = studentdetails.classId AND sections.sectionId = studentdetails.sectionId ORDER BY classes.classId, sections.sectionId");
//
// Ref: Existing/subjects
//   $query = $mysqli->query("SELECT * FROM classes_taught_by_teacher ORDER BY `classId`");
//
// Ref: Exixting/teachers
//   $query = $mysqli->query("SELECT * FROM users WHERE `visibility` = 'Y' AND `role` = 'T'");
//
// Ref: Existing/todo
//   $query = $mysqli->query("SELECT * FROM todolist");
//
// Ref: Existing/topics
//   $query = $mysqli->query("SELECT * FROM topics, classes, subjects WHERE topics.classId = classes.classId AND topics.subjectId = Subjects.subjectId ORDER BY `classId`");
//
// Ref: ADDNew/getSubForClass
//   $query = $mysqli->query("SELECT DISTINCT subjectName FROM subjects WHERE classNumber = '$classNumber'");
//
// Ref: Components/classNumberDropDown
//   $query = $mysqli->query("SELECT * FROM classes ORDER BY `classId` ASC");
//
// Ref: Components/subjectDropDown
//   $query = $mysqli->query("SELECT * FROM subjects");
//
// Ref: Components/teacherDropdown
//   $query = $mysqli->query("SELECT * FROM users WHERE `role` = 'T' AND `visibility` = 1 "
//
// Ref: topicDropDown
//   $query = $mysqli->query("SELECT * FROM topics");
//
// Ref: Components/topics
//   $query = $mysqli->query("SELECT * FROM topics");
//
// Ref: Components/typeDropDown
//   $query = $mysqli->query("SELECT DISTINCT typeName FROM questiontype");
//
// Ref: Scripts/php/exploreStudent
//   $query = $mysqli->query("SELECT * FROM users, studentdetails, classes, sections WHERE users.userId = $studentId AND classes.classId = studentdetails.classId AND sections.sectionId = studentdetails.sectionId ");
//
// Ref: Scripts/php/exploreTeacher
//   $query = $mysqli->query("SELECT users.firstName, users.middleName, users.lastName, classes.classNumber, sections.Sections FROM users, studentdetails, classes, sections WHERE users.userId = studentdetails.userId AND studentdetails.sectionId = $sectionId AND studentdetails.classId = $classId AND studentdetails.classId = classes.classId AND studentdetails.sectionId = sections.sectionId ");
//
// Ref: Scripts/php/singleStudentDetails
//   $query = $mysqli->query("SELECT users.Email, users.systemEmail, users.joinYear, users.endYear, users.phoneMobile, users.firstName, users.middleName, users.lastName, classes.classId, classes.classNumber, sections.sectionId, sections.Sections, studentdetails.rollNumber
//   FROM
//   users,
//   studentdetails,
//   classes,
//   sections
//   WHERE
//   studentdetails.userId = $studentId AND
//   users.userId = studentdetails.userId AND
//   classes.classId = studentdetails.classId AND
//   sections.sectionId = studentdetails.sectionId
//   ORDER BY classes.classId ASC, sections.sectionId ASC");
//
// Ref: Scripts/php/singleTeacherClasses
// $query = $mysqli->query("SELECT DISTINCT users.firstName, users.middleName, users.lastName, classes.classId, classes.classNumber, sections.sectionId, sections.Sections, subjects.Subject
//   FROM
//   users,
//   classes_taught_by_teacher,
//   teachers,
//   classes,
//   sections,
//   subjects
//   WHERE
//   classes_taught_by_teacher.userId = $teacherId AND
//   users.userId = classes_taught_by_teacher.userId AND
//   classes.classId = classes_taught_by_teacher.classId AND
//   sections.sectionId = classes_taught_by_teacher.sectionId AND
//   subjects.subjectId = classes_taught_by_teacher.subjectId
//   ORDER BY classes.classId ASC, sections.sectionId ASC");
//
// Ref: Scripts/php/singleTopicDetails
//   $query = $mysqli->query("SELECT * FROM questionbank, topics, classes, subjects WHERE questionbank.topicId = $topicId AND topics.topicId = $topicId AND classes.classId = questionbank.classId AND subjects.subjectId = topics.subjectId");
//
// Ref: /students //Not sure if it is being used anywhere
//   $query = $mysqli->query("SELECT * FROM studentdetails");

?>
