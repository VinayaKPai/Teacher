<html>
  <head>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  </head>
  <body>
    <table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">

    <h4 class='topbanner'>Currently $rowcount Tests in your setup.</h4>
      <tr>
        <th>SNo</th>
        <th>Title
          <hr>Class/Std</th>
        <th>Questions</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>".$slno."</td>
        <td>".$sid."</td>
        <td style='text-align: left;'>
          <div style='height: 200px; overflow: scroll;'>
            <span>".$qrow['question']."</span>
            <div class='left' style='padding: 2px;'>
              <ol style='list-style-type: lower-alpha;'>
                <li>".$qrow['Option_1']."</li>
                <li>".$qrow['Option_2']."</li>
                <li>".$qrow['Option_3']."</li>
                <li>".$qrow['Option_4']."</li>
                <li>".$qrow['Option_5']."</li>
                <li>".$qrow['Option_6']."</li>
              </ol>
            </div>
          </div>
        </td>
      </tr>
    </table>

  </body>

  <script src="jqs.js" type="text/javascript"></script>
</html>
<?php
    // SELECT
    //   questionbank.qId as 'ID',
    //   classes.classNumber as `Class`,
    //   subjects.Subject as `Subject`,
    //   topics.topicName as `Topic`,
    //   questiontype.typeName as `Type`,
    //   questionbank.question as `Question`,
    //   questionbank.Option_1 as `Option 1`,
    //   questionbank.Option_2 as `Option 2`,
    //   questionbank.Option_3 as `Option 3`,
    //   questionbank.Option_4 as `Option 4`,
    //   questionbank.Option_5 as `Option 5`,
    //   questionbank.Option_6 as `Option 6`
    // FROM
    //   questionbank,
    //   classes,
    //   questiontype,
    //   subjects,
    //   topics
    // WHERE
    //   classes.classId = questionbank.qb_classId
    // AND
    //   subjects.subjectId = questionbank.qb_subjectId
    // AND
    //   topics.topicId = questionbank.qb_topicId
    // AND
    //   questiontype.qtId = questionbank.qb_typeId
    // AND
    //   (classes.classNumber = '1' OR classes.classNumber = '2' OR classes.classNumber = '3' OR classes.classNumber = '4' )
    // AND
    //   (subjects.Subject = 'English' OR subjects.Subject = 'Hindi' OR subjects.Subject = 'Maths' OR subjects.Subject = 'Social Studies' )
  ?>
