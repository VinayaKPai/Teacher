<?php

$queryString = "SELECT questionbank.Id as 'ID', questionbank.question as `Question`, questionbank.Option_1 as `Option 1`, questionbank.Option_2 as `Option 2`, questionbank.Option_3 as `Option 3`, questionbank.Option_4 as `Option 4`, questionbank.Option_5 as `Option 5`, questionbank.Option_6 as `Option 6` FROM questionbank, classes, questiontype, subjects, topics WHERE classes.id = questionbank.classNumber AND subjects.id = questionbank.subjectName AND topics.Id = questionbank.topicName AND questiontype.Id = questionbank.typeName ";
// classes.Class_Number as `Class`, subjects.Subject as `Subject`, topics.Topic_Name as `Topic`, questiontype.typeName as `Type`, 
?>