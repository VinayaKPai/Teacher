<?php

    SELECT
        a.assessment_Title AS 'Assessment Title',
        c.classNumber AS 'Class Number',
        qb.qId,
        qb.question,
        qb.Option_1,
        qb.Option_2,
        qb.Option_3,
        qb.Option_4,
        qb.Option_5,
        qb.Option_6
    FROM
        questionbank AS qb
    INNER JOIN assessment_questions AS aq
    	on aq.question_id = qb.qId
    INNER JOIN assessments as a
    	on a.assessment_Id = aq.assessment_Id
    INNER JOIN classes as c
    	on c.classId = qb.classId;



      Returns all data from deploymentlog, assessments, assessment_questions, questionbank
      // $queryString = "SELECT deploymentlog.depType AS 'Type', deploymentlog.depId AS 'Id', deploymentlog.classId AS 'Class', deploymentlog.sectionId AS 'Section', deploymentlog.schStartDate AS 'Open From', deploymentlog.schEndDate AS 'Open Till', deploymentlog.deploySuccess AS 'Deployed?', assessments.assessment_Title AS 'Title', assessments.assessment_Id, assessment_questions.question_id, questionbank.question, questionbank.Option_1, questionbank.Option_2, questionbank.Option_3, questionbank.Option_4, questionbank.Option_5, questionbank.Option_6 FROM deploymentlog, assessments, assessment_questions, questionbank WHERE deploymentlog.assessmentId = assessments.assessment_Id AND deploymentlog.depType = '$type' AND assessment_questions.question_id = questionbank.qId";
//Query to pull teacher-class-section-subject-Students
Returns Teachers-Classes-Sections-Students correctly but without []
SELECT DISTINCT
		U.userId AS 'Teacher ID',
		json_arrayagg( json_object(
			'FN',U.firstName,
			'MN',U.middleName,
			'LN',U.lastName,
			'Current',U.visibility
		) ) as 'Teacher',
		json_arrayagg(DISTINCT json_object(
			'Sub Id', Sub.subjectId,
			'Class Id',CTT.classId,
			'Sec Id', Sec.sectionId
		) ) as 'Subjects',
		json_arrayagg(DISTINCT json_object(
			'Stu Id', SD.userId,
			'S Id', SD.classId,
			'sectionId', SD.sectionId
		) ) as 'Students'
		FROM
			users AS U
				INNER JOIN classes_taught_by_teacher AS CTT
					on CTT.userId = U.userId
				INNER JOIN subjects AS Sub
					on Sub.subjectId = CTT.subjectId
				LEFT JOIN sections as Sec
					on Sec.sectionId= CTT.sectionId
				LEFT JOIN studentDetails as SD
					on SD.classId = CTT.classId
				LEFT JOIN classes as C1 on C1.classId = CTT.classId
		GROUP BY U.userId


Returns Classes-Sections-Students with correct []
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
  ");

      stuDiv($query);

Returns duplicates

select cOut.userId , cOut.classId , cOut.sectionId , cOut.subjectId, cIn.*
from     classes_taught_by_teacher as cOut

join (
    SELECT
    userId , classId , sectionId , subjectId, count(*)
FROM
    classes_taught_by_teacher
GROUP BY userId , classId , sectionId , subjectId
    having count(*) > 1
) cIn on
cOut.userId = cIn.userId AND cOut.classId = cIn.classId AND cOut.sectionId = cIn.sectionId AND cOut.subjectId = cIn.subjectId
?>
