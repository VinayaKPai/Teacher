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
  Questions {"questionID": 7, "question": "Which one of the following catches thieves and helps to search for lost things?", "option1": "Engineer", "option2": "Nurse ", "option3": "Policeman ", "option4": "Doctor ", "option5": "None of these", "option6": ""},
  {"questionID": 8, "question": "Which one of the following is used to send messages by using post office? ", "option1": "Postcard ", "option2": "Letter ", "option3": "E-mail ", "option4": "Both [a] and [b] ", "option5": "None of these", "option6": ""},
  {"questionID": 9, "question": "____ helps to put out the fire. ", "option1": "Fireman ", "option2": "Policeman ", "option3": "Carpenter ", "option4": "Shopkeeper ", "option5": "None of these", "option6": ""}


?>
