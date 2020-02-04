<html>
    <div class="row">
      <div class="col-sm-3">
        <h5>Title:
          <span style='color: Navy;'> $row['testTilte'] </span>
        </h5>
      </div>
      <div class='col-sm-3'>
        <h5>Class/Std:
          <span style='color: Navy;'> $row['classNumber']
          </span>
        </h5>
      </div>
      <div class='col-sm-3'>
        <h5>Subject:
          <span style='color: Navy;'> $row['Subject'] </span>
        </h5>
      </div>
      <div class='col-sm-3 small'>
        Start Date <input class='small' name=$testId type='date' />
        <button class='small' id=$testId onclick='deploy(this)'>Deploy</button>
    </div>
    <h6 id="dep_da">Deployment schedule:
      <span style='float:right;'>
        <ul>
          <li> $startDate['schStartDate'] </li>
          <h6>No tests have been deployed yet</h6>
        </ul>
      </span>
    </h6>
  </div>
  <div class='jumbotron small'>
    <span> $qrow['question'] </span>
    <div class='container'>
      <ol style='list-style-type: lower-alpha;'>
        <li> $qrow['Option_1'] </li>
        <li> $qrow['Option_2'] </li>
        <li> $qrow['Option_3'] </li>
        <li> $qrow['Option_4'] </li>
        <li> $qrow['Option_5'] </li>
        <li> $qrow['Option_6'] </li>
      </ol>
    </div>
  </div>
  <hr style='border:solid 1px green;'>




  <body>

<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

</html>
<?php
    Array ( [classNumber] => Array ( [1] => 1 [2] => 2 [3] => 3 [8] => 8 ) [subjectName] => Array ( [English] => English [Hindi] => Hindi ) [topicName] => [typeName] => )
    SELECT questionbank.qId as 'ID', classes.classNumber as `Class`, subjects.Subject as `Subject`, topics.topicName as `Topic`, questiontype.typeName as `Type`, questionbank.question as `Question`, questionbank.Option_1 as `Option 1`, questionbank.Option_2 as `Option 2`, questionbank.Option_3 as `Option 3`, questionbank.Option_4 as `Option 4`, questionbank.Option_5 as `Option 5`, questionbank.Option_6 as `Option 6`
    FROM questionbank, classes, questiontype, subjects, topics
    WHERE classes.classId = questionbank.qb_classId
      AND subjects.subjectId = questionbank.qb_subjectId
      AND topics.topicId = questionbank.qb_topicId
      AND questiontype.qtId = questionbank.qb_typeId
      AND (classes.classNumber = '1'
        OR classes.classNumber = '2'
        OR classes.classNumber = '3'
        OR classes.classNumber = '8' )
      AND (subjects.Subject = 'English'
        OR subjects.Subject = 'Hindi' )
?>
