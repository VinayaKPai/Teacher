<?php
  // include "basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  //This is not required. You will instead be included on the page where the display will happen
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/deployQueryResultToHtmlDiv.php";

//This function should just execute the query and then return the result (Which will be stored in a variable on the display page)
  function activity($type, $status, $mysqli ,$pageHeading) { //status is completed/ongoing/undeoployed/all type is a/q/t
$str = '';
$successFlag = '';
    $queryString = ("SELECT
    dl.depId AS 'Id',
    dl.depType AS 'Type',
    c.classNumber AS 'Class',
    c.classId AS 'Class Id',
    s.sectionId AS 'SectionId',
    s.Sections AS 'Section',
    dl.schStartDate AS 'Open From',
    dl.schEndDate AS 'Open Till',
    dl.deploySuccess AS 'Deployed?',
    a.assessment_Id AS 'Assessment ID',
    a.assessment_Title AS 'Title',
    CONCAT('[',json_arrayagg(
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
		),']') as 'Questions'
FROM
    deploymentlog as dl
INNER JOIN assessments as a
	ON a.assessment_Id = dl.assessmentId
INNER JOIN assessment_questions as aq
    ON aq.assessment_Id = a.assessment_Id
INNER JOIN questionbank as qb
	ON qb.qId = aq.question_id
INNER JOIN questiontype as qt
	on dl.depType = qt.qtId
INNER JOIN classes as c
	on c.classId = dl.classId
INNER JOIN sections as s
	on s.sectionId = dl.sectionId

	");



    if ($status == "ongoing") {
      $str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate > CURDATE() AND dl.deploySuccess = 1 AND dl.depType = '$type'";
      $successFlag = 1;//need this separately for display
      $queryString = $queryString.$str ;
    }
    if ($status == "completed") {
      $str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate < CURDATE() AND dl.deploySuccess = 1 AND dl.depType = '$type'";
      $successFlag = 1;//need this separately for display
      $queryString = $queryString.$str ;
    }
    if ($status == "undeployed") {
      $str = "WHERE dl.deploySuccess = 0 AND dl.depType = '$type'";
      $successFlag = 0;//need this separately for display
      $queryString = $queryString.$str ;
    }
    $queryString = $queryString."  GROUP BY dl.depId";
    // echo $queryString;


      if ($status == "all") {
        $queryString = ("SELECT
              a.assessment_Title AS 'Title',
              a.assessment_Id AS 'Assessment ID',
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
          		) as 'Questions',
          	json_arrayagg(DISTINCT
          		json_object(
          			'classId', dl.classId,
                      'section', dl.sectionId,
                      'startDate', dl.schStartDate,
                      'endDate', dl.schEndDate,
                      'deploySuccess', dl.deploySuccess
          		)
          		) as 'Deployments'
          FROM
              questionbank AS qb
          INNER JOIN assessment_questions AS aq
          	on aq.question_id = qb.qId
          INNER JOIN assessments as a
          	on a.assessment_Id = aq.assessment_Id
          LEFT JOIN deploymentlog as dl
          	on dl.assessmentId = aq.assessment_Id
          GROUP BY a.assessment_Title;") ;
      }
    $query = $mysqli->query($queryString);
    // $query should be returned
    div($query, $type, $successFlag, $status, $pageHeading);
  }


?>
