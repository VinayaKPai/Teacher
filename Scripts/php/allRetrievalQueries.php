<?php

  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deployAQT_QueryResultToHtmlDiv.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deploySavedAssessments_QueryResultToHtmlDiv.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/cttQueryResultToHtmlTable.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/sqlQueryResultToList.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/CSTQueryResultToHtmlTable.php";

  function aqtActivityQuery($type, $status, $mysqli) {
    //retrieve  deployments for /Activity/assignments.php, /Activity/tests.php, /Activity/quizzes.php
    //status is completed/ongoing/undeoployed
    // type is a/q/t
    // WORKING
          $str = '';
          $successFlag = '';
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
          a.assessment_Id AS 'Assessment ID',
          a.assessment_Title AS 'Title',
          json_arrayagg(
      		json_object(
        			'questionID',qb.qId,
        			'question',qb.question,
        			'option1',qb.Option_1,
        			'option2',qb.Option_2,
        			'option3',qb.Option_3,
        			'option4',qb.Option_4,
        			'option5',qb.Option_5,
        			'option6',qb.Option_6
      		)
      		)
          as 'Questions'
          FROM
               questionbank AS qb
           INNER JOIN assessment_questions AS aq
             on aq.question_id = qb.qId
           INNER JOIN assessments as a
             on a.assessment_Id = aq.assessment_Id
           LEFT JOIN deploymentlog as dl
             on dl.assessmentId = aq.assessment_Id
           LEFT JOIN classes as c
             on c.classId = dl.classId
           LEFT JOIN sections as s
             on s.sectionId = dl.sectionId
           -- GROUP BY a.assessment_Title
      	");
      if ($status == "ongoing") {
        $str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate > CURDATE() AND dl.deploySuccess = '1' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "completed") {
        $str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate < CURDATE() AND dl.deploySuccess = '1' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "undeployed") {
        $str = "WHERE dl.deploySuccess = '0' AND dl.depType = '$type'";
        $successFlag = 0;//need this separately for display
        $queryString = $queryString.$str ;
      }
      if ($status == "withdrawn") {
        $str = "WHERE dl.deploySuccess = '2' AND dl.depType = '$type'";
        $successFlag = 1;//need this separately for display
        $queryString = $queryString.$str ;
      }
      $queryString = $queryString."  GROUP BY dl.depId";

      $query = $mysqli->query($queryString);
      // $query should be returned
      deploymentsdiv($query, $type, $successFlag, $status);
  }

  function savedAssessmentsQuery( $mysqli) {
    //from Activities/assignments.php, Activities/quizzes.php, Activities/tests.php
    //to Scripts/php/deploySavedAssessments_QueryResultToHtmlDiv.php
    //WORKING
    $successFlag = '';
          $queryString = ("SELECT
    	       assessments.assessment_Title as 'Title',
             classes.classNumber as 'Class',
             classes.classId AS 'Class Id',
             assessments.assessment_Id AS 'Assessment ID',
             questionbank.classId AS 'QB Class Id',
    	json_arrayagg(
        json_object(
            'question',questionbank.question,
        		'option1',questionbank.Option_1,
        		'option2',questionbank.Option_2,
            'option3',questionbank.Option_3,
    		    'option4',questionbank.Option_4,
            'option5',questionbank.Option_5,
    		    'option6',questionbank.Option_6
            )
        ) as 'Questions',
        json_arrayagg(
        json_object(
            'classId',dp.classId,
            'classNumber',classes.classNumber,
        		'sectionId',dp.sectionId,
        		'deploySuccess',dp.deploySuccess,
            'startDate',dp.schStartDate,
            'endDate',dp.schEndDate
            )
        ) as 'Deployments'
      	FROM
      	`questionbank`
          	 JOIN assessment_questions as aq
              ON aq.question_id = questionbank.qId
               Join assessments
              ON aq.assessment_Id = assessments.assessment_Id
               join classes
              ON questionbank.classId = classes.classId
              LEFT JOIN deploymentlog as dp
              ON assessments.assessment_Id = dp.assessmentId
              GROUP BY assessments.assessment_Title;") ;

      $query = $mysqli->query($queryString);
      savedAssessmentsdiv($query, $successFlag);
  }

  function teachers ($mysqli,$stuQuery) {
    //from SetUpPages/newTeachers.php
    //to Scripts/php/teachersQueryResultToHtmlTable.php
    //WORKING
    $teacherQuery = $mysqli->query("SELECT DISTINCT
      U.userId AS 'T Id',
      U.firstName AS 'T First Name',
      U.middleName AS 'T Middle Name',
      U.lastName AS 'T Last Name',
      U.Email AS 'T External Email',
      U.systemEmail AS 'T Internal Email',
      U.phoneMobile AS 'T Mobile',
      U.visibility AS 'Current',json_arrayagg(DISTINCT json_object(
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

?>
