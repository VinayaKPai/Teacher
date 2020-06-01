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
    <h6 id="da">Deployment schedule:
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
Array (
  [C Id] => 1
  [Class / Std] => I
  [Sections] => [
    {"SD C Id": 1, "Stu Sec name": "C", "SD sectionId": 3},
    {"SD C Id": 1, "Stu Sec name": "B", "SD sectionId": 2},{"SD C Id": 1, "Stu Sec name": "F", "SD sectionId": 6},{"SD C Id": 1, "Stu Sec name": "E", "SD sectionId": 5},{"SD C Id": 1, "Stu Sec name": "D", "SD sectionId": 4}
  ]
  [Students] => [{"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 41, "Stu RN": 43, "S First Name": "Dabeet", "S Middle Name": "", "S Last Name": "Bala"},{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 64, "Stu RN": 58, "S First Name": "Ighu", "S Middle Name": null, "S Last Name": "Hughug"},{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 27, "Stu RN": 33, "S First Name": "Aadeep", "S Middle Name": "", "S Last Name": "Badami"},{"Stu C Id": 1, "Stu sectionId": 6, "Stu Id": 28, "Stu RN": 34, "S First Name": "Aadesh", "S Middle Name": "", "S Last Name": "Bahl"},{"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 63, "Stu RN": 57, "S First Name": "Ighu", "S Middle Name": null, "S Last Name": "Guhuh"},{"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 53, "Stu RN": 3, "S First Name": "Vartha", "S Middle Name": "", "S Last Name": "Manishu"},{"Stu C Id": 1, "Stu sectionId": 4, "Stu Id": 13, "Stu RN": 19, "S First Name": "Aabhavannan", "S Middle Name": "", "S Last Name": "Agrawal"},{"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 11, "Stu RN": 17, "S First Name": "Aabhas", "S Middle Name": "", "S Last Name": "Agate"}] 
  [Count] => 8 )
?>
