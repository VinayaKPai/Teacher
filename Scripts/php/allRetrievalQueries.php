<?php
// NOTE- ALL JSON TYPE QUERIES ARE IN THE BKP OF THIS FILE
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deployAQT_QueryResultToHtmlDiv.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deploySavedAssessments_QueryResultToHtmlDiv.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/cttQueryResultToHtmlTable.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/sqlQueryResultToList.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/CSTQueryResultToHtmlTable.php";

  function aqtActivityQuery($type,$status,$secClassId, $secSectionId, $pageHeading, $mysqli) {
    //EVERYTHING OTHER THAN QUESTION DATA HERE
          $str = '';
          $successFlag = '';
        /*
        This query should be split into 2. By doing the following the need for json_arrayagg will dissappear.
        1. For getting all the deployments.
        2. For getting all the questions related to the assessment.
          Desctiption:
          The reason you need json aggregate right now is because, you will get 1 entry for each deployment and as an assessment can have multiple questions, you will need to merge them into 1.

          If you get all deployments and questions seperately then you can you can just get the query and with very little processing, you can do the display part of it.
         */
      	$queryString = ("SELECT
          dl.depId AS 'Id',
          dl.depType AS 'Type',
          c.classNumber AS 'Class',
          c.classId AS 'Class Id',
          s.sectionId AS 'SectionId',
          s.sectionName AS 'Section',
          dl.schStartDate AS 'Open From',
          dl.schEndDate AS 'Open Till',
          dl.deploySuccess AS 'Deployed?',
          dl.assessmentId AS 'Assessment ID'
          FROM
          deploymentlog AS dl
           INNER JOIN classes as c
             on c.classId = dl.classId
           INNER JOIN sections as s
             on s.sectionId = dl.sectionId
          WHERE
            dl.classId = $secClassId
          AND
            dl.sectionId = $secSectionId");
      if ($status == "ongoing") {
        $str = " AND dl.schStartDate < CURDATE() AND dl.schEndDate > CURDATE() AND dl.deploySuccess = '1' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "completed") {
        $str = " AND dl.schStartDate < CURDATE() AND dl.schEndDate < CURDATE() AND dl.deploySuccess = '1' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "undeployed") {
        $str = " AND dl.deploySuccess = '0' AND dl.depType = '$type'";
        $successFlag = 0;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "withdrawn") {
        $str = " AND dl.deploySuccess = '2' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }

      $queryString = $queryString."  ORDER BY dl.classId, dl.sectionId ASC";
      $query = $mysqli->query($queryString);
      return $query;
  }

  function aqtActivityQuestions($assId,$mysqli) {
    // $classes = implode(", ",$_SESSION['c']);
    // ONLY the questions data for the AQT query here
        /*
        This query should be split into 2. By doing the following the need for json_arrayagg will dissappear.
        1. For getting all the deployments.
        2. For getting all the questions related to the assessment.
          Desctiption:
          The reason you need json aggregate right now is because, you will get 1 entry for each deployment and as an assessment can have multiple questions, you will need to merge them into 1.

          If you get all deployments and questions seperately then you can you can just get the query and with very little processing, you can do the display part of it.
         */
         $queryAssQ = $mysqli->query("SELECT
          a.assessment_Id AS 'Assessment ID',
          -- a.assessment_Title AS 'Title',
          qb.qId AS 'questionID',
          qb.question AS	'question',
          qb.Option_1 AS	'option1',
          qb.Option_2 AS 'option2',
          qb.Option_3 AS 'option3',
          qb.Option_4 AS 'option4',
          qb.Option_5 AS 'option5',
          qb.Option_6 AS	'option6'
          -- count(a.assessment_Id) AS 'COUNT'
          FROM
               questionbank AS qb
           INNER JOIN assessment_questions AS aq
             on aq.question_id = qb.qId
           INNER JOIN assessments as a
             on a.assessment_Id = aq.assessment_Id
          WHERE a.assessment_Id = '$assId'");
          return $queryAssQ;
  }

  //need to get the assessment title for heading, which cannot be done from outside the while statement of the display code in ActivitySectionPanel.php
  function aqtDepTitle($assId,$mysqli) {
    $titleQuery = $mysqli->query("SELECT `assessment_Title` FROM assessments WHERE `assessment_Id` = '$assId'");
    $title = $titleQuery->fetch_assoc();
    return $title;
  }


  function savedAssessmentsQuery( $mysqli) {
    //from Activities/assignments.php, Activities/quizzes.php, Activities/tests.php
    //to Scripts/php/deploySavedAssessments_QueryResultToHtmlDiv.php

          $queryString = ("SELECT
    	       assessments.assessment_Title as 'Title',
             classes.classNumber as 'Class',
             classes.classId AS 'Class Id',
             assessments.assessment_Id AS 'Assessment ID',
             questionbank.classId AS 'QB Class Id',
              questionbank.question AS 'question',
              questionbank.Option_1 AS 'option1',
              questionbank.Option_2 AS 'option2',
              questionbank.Option_3 AS 'option3',
              questionbank.Option_4 AS 'option4',
              questionbank.Option_5 AS 'option5',
              questionbank.Option_6 AS 'option6'
        FROM
      	`questionbank`
          	 JOIN assessment_questions as aq
              ON aq.question_id = questionbank.qId
               Join assessments
              ON aq.assessment_Id = assessments.assessment_Id
               join classes
              ON questionbank.classId = classes.classId
              WHERE classes.classId = 2
              GROUP BY assessments.assessment_Title
              ;") ;

      $query = $mysqli->query($queryString);
      // savedAssessmentsdiv($query, $successFlag);
      savedAssessmentsdiv($query);
  }

  function teachers ($mysqli,$stuQuery) {
    //from SetUpPages/newTeachers.php
    //to Scripts/php/teachersQueryResultToHtmlTable.php
    //WORKING
    /*
    This query shows Subjects and sections for all teachers.

    If you execute this query for 1 teacher at a time, then you dont need to json_arrayagg.

    At the moment if there are 5 teachers teaching 4 subjects for 3 sections, then you will get 5*4*3 number of rows.

    If you do it per teacher, then
     */
    $teacherQuery = $mysqli->query("SELECT DISTINCT
      U.userId AS 'T Id',
      U.firstName AS 'T First Name',
      U.middleName AS 'T Middle Name',
      U.lastName AS 'T Last Name',
      U.Email AS 'T External Email',
      U.systemEmail AS 'T Internal Email',
      U.phoneMobile AS 'T Mobile',
      U.visibility AS 'Current',
      json_arrayagg(DISTINCT json_object(
          'Class Id',CTT.classId,
          'Class Num', C.classNumber,
          'Sec Id', Sec.sectionId,
          'Sec Name', Sec.sectionName,
          'Sub Id', Sub.subjectId,
          'Sub Name', Sub.subjectName
        ) ) as 'CSSubjects',
        json_arrayagg(DISTINCT json_object(
            'SD C Id', CTT.classId,
            'SD Class Num', C.classNumber,
            'Stu Sec name', Sec.sectionName,
            'SD sectionId', Sec.sectionId
          ) ) as 'CSections'
        FROM
          users AS U
            INNER JOIN classes_taught_by_teacher AS CTT
              on CTT.userId = U.userId
            INNER JOIN subjects AS Sub
              on Sub.subjectId = CTT.subjectId
            LEFT JOIN classes as C
              on C.classId= CTT.classId
            LEFT JOIN sections as Sec
              on Sec.sectionId= CTT.sectionId
        GROUP BY U.userId
              ORDER BY U.userId ASC");
        table ($mysqli, $teacherQuery,$stuQuery);

  }

  function teachersWithoutClasses ($mysqli) {
    //from SetUpPages/newTeachers.php
    //to Scripts/php/teachersQueryResultToHtmlTable.php
    //WORKING
    $teacherQuery = $mysqli->query("SELECT *
      FROM `users`
      WHERE `role` = 'T'
      -- AND `visibility` = 'Y'
      AND users.userId
      NOT IN (
        SELECT userId FROM classes_taught_by_teacher)");
        sqlQueryToList ($teacherQuery);

  }

  function students ($mysqli, $pageHeading) {
    //from SetUpPages/newStudents.php
    //to Scripts/php/studentsQueryResultToHtmlDiv.php
    //WORKING
      $query = $mysqli->query("SELECT DISTINCT
          C.classId AS 'C Id',
          C.classNumber AS 'Class / Std',
            json_arrayagg(DISTINCT json_object(
              'SD C Id', SD.classId,
              'Stu Sec name', Sec.sectionName,
              'SD sectionId', SD.sectionId
            ) ) as 'Sections',
            json_arrayagg(DISTINCT json_object(
              'Stu C Id', SD.classId,
              'Stu sectionId', SD.sectionId,
              'Stu Id', SD.userId,
              'Stu RN', SD.rollNumber,
              'S First Name', U.firstName,
              'S Middle Name', U.middleName,
              'S Last Name', U.lastName
            ) ) as 'Students',
            COUNT(SD.userId) AS 'Count'
          FROM
            classes as C
          INNER JOIN studentDetails AS SD
            ON SD.classId = C.classId
          LEFT JOIN sections AS Sec
            ON Sec.sectionId = SD.sectionId
          INNER JOIN users as U
            ON U.userId = SD.userId
          Group BY C.classId
          ORDER BY C.classId ASC, Sec.sectionId ASC
        ");
            stuDiv($query,$pageHeading);
            return ($query->fetch_assoc());
  }

  function studentsForTeacher($mysqli) {
    //from SetUpPages/newTeachers.php
    //to teachers() in Scripts/php/allRetrievalQueries.php
    ////WORKING
    	$stuQuery = $mysqli->query("SELECT
        SD.userId AS 'U Id',
    		SD.classId,
    		C.classNumber AS 'Class',
    		SD.sectionId,
    		S.sectionName AS 'Section',
    		U.firstName AS 'F Name',
    		U.middleName AS 'M Name',
    		U.lastName AS 'L Name',
    		SD.rollNumber AS 'R No.'
    		FROM studentDetails AS SD
    		INNER JOIN classes AS C ON C.classId = SD.classId
    		INNER JOIN sections AS S ON S.sectionId = SD.sectionId
    		INNER JOIN users AS U ON U.userId = SD.userId
    		ORDER BY SD.classId ASC, SD.sectionId ASC
    		");
    teachers($mysqli,$stuQuery);
    }

  function classesTaughtByTeachers($mysqli) {
    //from SetUpPages/newSubjects.php
    //to Scripts/php/cttQueryResultToHtmlTable.php
    $query = $mysqli->query("SELECT DISTINCT
      Sub.subjectId AS 'Sub Id',
      Sub.subjectName AS'Sub Name',
      json_arrayagg(DISTINCT json_object(
        'T First Name', U.firstName,
        'T Middle Name', U.middleName,
        'T Last Name', U.lastName,
        'T Class Id',CTT.classId,
        'T Sec Name', Sec.sectionName,
        'T Sub Id', Sub.subjectId
      ) ) as 'Teachers',
      json_arrayagg(DISTINCT json_object(
          'Cl Id',CTT.classId,
          'Cl Num', C.classNumber
        ) ) as 'Cls',
      json_arrayagg(DISTINCT json_object(
          'Class Id',CTT.classId,
          'Class Num', C.classNumber,
          'Sec Id', Sec.sectionId,
          'Sec Name', Sec.sectionName
        ) ) as 'CSections'
        FROM
          subjects AS Sub
            INNER JOIN classes_taught_by_teacher AS CTT
              on CTT.subjectId = Sub.subjectId
            INNER JOIN users AS U
              on U.userId = CTT.userId
            LEFT JOIN classes as C
              on C.classId= CTT.classId
            LEFT JOIN sections as Sec
              on Sec.sectionId= CTT.sectionId
        GROUP BY Sub.subjectId
              ORDER BY Sub.subjectId ASC
        ");
    cttQueryResultToHtmlTable ( $query);
  }

  function studentsForATeacher($mysqli,$teacherId, $classId,$sectionId) {
    //this function is now working perfectly
    $query = $mysqli->query("SELECT DISTINCT
      SD.classId AS 'CId',
      C.classNumber AS 'STD',
      SD.sectionId AS 'Sec Id',
      Sec.sectionName AS 'Section',
      U.userId AS 'User Id',
      SD.rollNumber AS 'ST RN',
      U.firstName AS 'St FN',
      U.middleName AS 'St MN',
      U.lastName AS 'St LN',
      SD.classId AS 'ST CId',
      SD.sectionId AS 'ST SecId'
      FROM
        studentdetails AS SD
          INNER JOIN users AS U
            on U.userId = SD.userId
          INNER JOIN classes_taught_by_teacher as ctt
          	on ctt.classId = SD.classId AND
            ctt.sectionId = SD.sectionId
          LEFT JOIN classes as C
            on C.classId= SD.classId
          LEFT JOIN sections as Sec
            on Sec.sectionId= SD.sectionId

        WHERE ctt.userId = '$teacherId' AND
              SD.classId = '$classId' AND
              SD.sectionId = '$sectionId'
              ORDER BY SD.classId, SD.sectionId, U.firstName ASC"
    );
    return $query;
    // teacherStudentDiv ( $query);//Scripts\php\studentsQueryResultToHtmlDiv.php
    //this function is now working perfectly
  }

  function studentsDetailsForATeacher($mysqli,$teacherId,$sessionClassId,$secSectionId) {
    $query = $mysqli->query("SELECT DISTINCT
    	SD.classId AS 'CId',
      C.classNumber AS 'STD',
      SD.sectionId AS 'Sec Id',
      Sec.sectionName AS 'Section',
      json_arrayagg(DISTINCT json_object(
          'User Id',U.userId,
          'ST RN',SD.rollNumber,
          'St FN',U.firstName,
          'St MN',U.middleName,
          'St LN',U.lastName,
          'ST CId',SD.classId,
          'ST SecId',SD.sectionId
        ) ) as 'CSections'
        FROM
          studentdetails AS SD
            INNER JOIN users AS U
              on U.userId = SD.userId
            LEFT JOIN classes as C
              on C.classId= SD.classId
            LEFT JOIN sections as Sec
              on Sec.sectionId= SD.sectionId

        GROUP BY SD.classId, SD.sectionId
              ORDER BY SD.classId ASC"
    );
    // teacherStudentDiv ( $query);//Scripts\php\studentsQueryResultToHtmlDiv.php
  }
  function studentsForATeacher_bkp($mysqli,$teacherId) {
    $query = $mysqli->query("SELECT DISTINCT
      SD.classId AS 'CId',
      C.classNumber AS 'STD',
      SD.sectionId AS 'Sec Id',
      Sec.sectionName AS 'Section',
      json_arrayagg(DISTINCT json_object(
          'User Id',U.userId,
          'ST RN',SD.rollNumber,
          'St FN',U.firstName,
          'St MN',U.middleName,
          'St LN',U.lastName,
          'ST CId',SD.classId,
          'ST SecId',SD.sectionId
        ) ) as 'CSections'
        FROM
          studentdetails AS SD
            INNER JOIN users AS U
              on U.userId = SD.userId
            LEFT JOIN classes as C
              on C.classId= SD.classId
            LEFT JOIN sections as Sec
              on Sec.sectionId= SD.sectionId

        GROUP BY SD.classId, SD.sectionId
              ORDER BY SD.classId ASC"
    );
    // teacherStudentDiv ( $query);//Scripts\php\studentsQueryResultToHtmlDiv.php
  }
function studentSummaryDetailsThisClass ($mysqli,$clId,$clsecsId) {
  //get all students for this specific class+section
  $query = $mysqli->query("SELECT
        U.userId AS 'User Id',
        SD.rollNumber AS 'ST RN',
        U.firstName AS 'St FN',
        U.middleName AS 'St MN',
        U.lastName AS 'St LN',
        SD.classId AS 'ST CId',
        SD.sectionId AS 'ST SecId'

      FROM
        studentdetails AS SD
          INNER JOIN users AS U
            on U.userId = SD.userId
          LEFT JOIN classes as C
            on C.classId= SD.classId
          LEFT JOIN sections as Sec
            on Sec.sectionId= SD.sectionId
      WHERE SD.classId = $clId
      AND SD.sectionId = $clsecsId
      -- GROUP BY SD.classId, SD.sectionId
            ORDER BY SD.classId ASC"
  );
// print_r($query->fetch_assoc());
studentsDisplay($mysqli,$query);

}

function singleStudentComprehensive() {
  echo "<h5>Assignments</h5>";
    echo "<div><span>Open - Completed</span></div>";
  echo "<h5>Quizzes</h5>";
    echo "<div><span>Open - Completed</span></div>";
  echo "<h5>Tests</h5>";
    echo "<div><span>Open - Completed</span></div>";

}

function studentSubjects($mysqli, $userId) {
  $query = $mysqli->query("SELECT
    U.userId AS 'Id',
    S.subjectName AS 'Subject',
    S.subjectId AS 'Subject Id',
    SD.classId AS 'Class',
    U.firstName AS 'FN',
    U.middleName AS 'MN',
    U.lastName AS 'L'

    FROM `users` AS U
    INNER JOIN student_subjects AS SS
    ON SS.userId = U.userId
    INNER JOIN `subjects` AS S
    ON S.subjectId = SS.subjectId
    INNER JOIN `studentdetails` AS SD
    ON SD.userId = U.userId
    WHERE U.userId = '$userId'");
    return $query;

}


?>
