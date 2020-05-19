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

?>
