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
          <span style='color: Navy;'> $row['subjectName'] </span>
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
  [C Id] => 9
  [Class / Std] => IX
  [sectionName] => [
    {"SD C Id": 9, "Stu Sec name": "A", "SD sectionId": 1},
    {"SD C Id": 1, "Stu Sec name": "E", "SD sectionId": 5},
    {"SD C Id": 9, "Stu Sec name": "D", "SD sectionId": 4},
    {"SD C Id": 2, "Stu Sec name": "B", "SD sectionId": 2},
    {"SD C Id": 8, "Stu Sec name": "E", "SD sectionId": 5},
    {"SD C Id": 8, "Stu Sec name": "A", "SD sectionId": 1},
    {"SD C Id": 9, "Stu Sec name": "B", "SD sectionId": 2},
    {"SD C Id": 9, "Stu Sec name": "E", "SD sectionId": 5},
    {"SD C Id": 1, "Stu Sec name": "C", "SD sectionId": 3},
    {"SD C Id": 1, "Stu Sec name": "D", "SD sectionId": 4},
    {"SD C Id": 2, "Stu Sec name": "A", "SD sectionId": 1},
    {"SD C Id": 2, "Stu Sec name": "E", "SD sectionId": 5},
    {"SD C Id": 9, "Stu Sec name": "C", "SD sectionId": 3},
    {"SD C Id": 8, "Stu Sec name": "B", "SD sectionId": 2},
    {"SD C Id": 8, "Stu Sec name": "C", "SD sectionId": 3},
    {"SD C Id": 2, "Stu Sec name": "D", "SD sectionId": 4},
    {"SD C Id": 9, "Stu Sec name": "F", "SD sectionId": 6},
    {"SD C Id": 2, "Stu Sec name": "F", "SD sectionId": 6},
    {"SD C Id": 1, "Stu Sec name": "B", "SD sectionId": 2},
    {"SD C Id": 1, "Stu Sec name": "F", "SD sectionId": 6},
    {"SD C Id": 8, "Stu Sec name": "D", "SD sectionId": 4}
  ]
  [Students] => [
    {"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 52, "Stu RN": 2, "S First Name": "Pramod", "S Middle Name": "", "S Last Name": "Dumbo"},
    {"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 53, "Stu RN": 3, "S First Name": "Vartha", "S Middle Name": "", "S Last Name": "Manishu"},
    {"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 49, "Stu RN": 4, "S First Name": "Piddi", "S Middle Name": "", "S Last Name": "Koota"},
    {"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 55, "Stu RN": 5, "S First Name": "Ganju", "S Middle Name": "", "S Last Name": "Panju"},
    {"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 34, "Stu RN": 6, "S First Name": "Chor", "S Middle Name": "Bhajia", "S Last Name": ""},
    {"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 50, "Stu RN": 7, "S First Name": "Joori", "S Middle Name": "", "S Last Name": "Poori"},
    {"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 54, "Stu RN": 8, "S First Name": "Faltu", "S Middle Name": "", "S Last Name": "Baltu"},
    {"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 32, "Stu RN": 9, "S First Name": "Vijay", "S Middle Name": "", "S Last Name": "Vijuma"},
    {"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 33, "Stu RN": 10, "S First Name": "Aditya", "S Middle Name": "", "S Last Name": "Pai"},
    {"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 48, "Stu RN": 11, "S First Name": "fikk", "S Middle Name": "", "S Last Name": "Sicck"},
    {"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 31, "Stu RN": 12, "S First Name": "Abhju", "S Middle Name": "", "S Last Name": "Soja"},
    {"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 47, "Stu RN": 13, "S First Name": "Falor", "S Middle Name": "", "S Last Name": "Sofa"},
    {"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 46, "Stu RN": 14, "S First Name": "Droopy", "S Middle Name": "", "S Last Name": "Stuppi"},
    {"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 9, "Stu RN": 15, "S First Name": "Aabhra", "S Middle Name": "", "S Last Name": "Acharya"},
    {"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 10, "Stu RN": 16, "S First Name": "Aabharan", "S Middle Name": "", "S Last Name": "Agarwal"},
    {"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 11, "Stu RN": 17, "S First Name": "Aabhas", "S Middle Name": "", "S Last Name": "Agate"},
    {"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 12, "Stu RN": 18, "S First Name": "Aabhadua", "S Middle Name": "", "S Last Name": "Aggarwal"},
    {"Stu C Id": 1, "Stu sectionId": 4, "Stu Id": 13, "Stu RN": 19, "S First Name": "Aabhavannan", "S Middle Name": "", "S Last Name": "Agrawal"},
    {"Stu C Id": 2, "Stu sectionId": 1, "Stu Id": 14, "Stu RN": 20, "S First Name": "Aabheer", "S Middle Name": "", "S Last Name": "Ahluwalia"},
    {"Stu C Id": 2, "Stu sectionId": 1, "Stu Id": 15, "Stu RN": 21, "S First Name": "Aabher", "S Middle Name": "", "S Last Name": "Ahuja"},
    {"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 16, "Stu RN": 22, "S First Name": "Aacharappan", "S Middle Name": "", "S Last Name": "Amble"},
    {"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 17, "Stu RN": 23, "S First Name": "Aacharya", "S Middle Name": "", "S Last Name": "Anand"},
    {"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 18, "Stu RN": 24, "S First Name": "Aachman", "S Middle Name": "", "S Last Name": "Andra"},
    {"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 19, "Stu RN": 25, "S First Name": "Aachuthan", "S Middle Name": "", "S Last Name": "Anne"},
    {"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 22, "Stu RN": 26, "S First Name": "Aad", "S Middle Name": "", "S Last Name": "Apte"},
    {"Stu C Id": 8, "Stu sectionId": 3, "Stu Id": 20, "Stu RN": 27, "S First Name": "Aadalarasan", "S Middle Name": "", "S Last Name": "Arora"},
    {"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 21, "Stu RN": 28, "S First Name": "Aadalarasu", "S Middle Name": "", "S Last Name": "Arya"},
    {"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 23, "Stu RN": 29, "S First Name": "Aadarsh", "S Middle Name": "", "S Last Name": "Atwal"},
    {"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 24, "Stu RN": 30, "S First Name": "Aadavan", "S Middle Name": "", "S Last Name": "Aurora"},
    {"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 25, "Stu RN": 31, "S First Name": "Aadavan", "S Middle Name": "", "S Last Name": "Babu"},
    {"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 26, "Stu RN": 32, "S First Name": "Aaddhar", "S Middle Name": "", "S Last Name": "Badal"},{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 27, "Stu RN": 33, "S First Name": "Aadeep", "S Middle Name": "", "S Last Name": "Badami"},{"Stu C Id": 1, "Stu sectionId": 6, "Stu Id": 28, "Stu RN": 34, "S First Name": "Aadesh", "S Middle Name": "", "S Last Name": "Bahl"},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 29, "Stu RN": 35, "S First Name": "Aadeshwar", "S Middle Name": "", "S Last Name": "Bahri"},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 30, "Stu RN": 36, "S First Name": "Aadhan", "S Middle Name": "", "S Last Name": "Bail"},{"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 35, "Stu RN": 37, "S First Name": "Daamodar", "S Middle Name": "", "S Last Name": "Bains"},{"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 36, "Stu RN": 38, "S First Name": "Daarshik", "S Middle Name": "", "S Last Name": "Bajaj"},{"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 37, "Stu RN": 39, "S First Name": "Daaruk", "S Middle Name": "", "S Last Name": "Bajwa"},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 38, "Stu RN": 40, "S First Name": "Daarun", "S Middle Name": "", "S Last Name": "Bakshi"},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 39, "Stu RN": 41, "S First Name": "Daasu", "S Middle Name": "", "S Last Name": "Bal"},{"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 40, "Stu RN": 42, "S First Name": "Dabang", "S Middle Name": "", "S Last Name": "Bala"},{"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 41, "Stu RN": 43, "S First Name": "Dabeet", "S Middle Name": "", "S Last Name": "Bala"},{"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 42, "Stu RN": 44, "S First Name": "Dabhiti", "S Middle Name": "", "S Last Name": "Balakrishnan"},{"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 43, "Stu RN": 45, "S First Name": "Dabnshu", "S Middle Name": "", "S Last Name": "Balan"},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 44, "Stu RN": 46, "S First Name": "Dadasaheb", "S Middle Name": "", "S Last Name": "Balasubramanian"},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 45, "Stu RN": 47, "S First Name": "Dadhica", "S Middle Name": "", "S Last Name": "Balay"},{"Stu C Id": 8, "Stu sectionId": 4, "Stu Id": 56, "Stu RN": 48, "S First Name": "Priti", "S Middle Name": null, "S Last Name": "Ganguli"},{"Stu C Id": 8, "Stu sectionId": 4, "Stu Id": 57, "Stu RN": 49, "S First Name": "Anuja", "S Middle Name": null, "S Last Name": "Sujan"},{"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 58, "Stu RN": 50, "S First Name": "Dhuri", "S Middle Name": null, "S Last Name": "Ghuri"},{"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 59, "Stu RN": 51, "S First Name": "Momo", "S Middle Name": null, "S Last Name": "Jojo"},{"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 60, "Stu RN": 52, "S First Name": "Gobi", "S Middle Name": null, "S Last Name": "Jojo"},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 61, "Stu RN": 54, "S First Name": "Tydim", "S Middle Name": null, "S Last Name": "Duredi"},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 62, "Stu RN": 55, "S First Name": "Tydim", "S Middle Name": null, "S Last Name": "Guj"},{"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 70, "Stu RN": 56, "S First Name": "MMM", "S Middle Name": "as", "S Last Name": "dase"},{"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 63, "Stu RN": 57, "S First Name": "Ighu", "S Middle Name": null, "S Last Name": "Guhuh"},{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 64, "Stu RN": 58, "S First Name": "Ighu", "S Middle Name": null, "S Last Name": "Hughug"},{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 65, "Stu RN": 59, "S First Name": "zxcfd", "S Middle Name": null, "S Last Name": "cvbdsf"},{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 66, "Stu RN": 60, "S First Name": "zxc", "S Middle Name": null, "S Last Name": "cvb"},{"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 67, "Stu RN": 61, "S First Name": "ded", "S Middle Name": null, "S Last Name": "cd"},{"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 68, "Stu RN": 62, "S First Name": "frg", "S Middle Name": null, "S Last Name": "ghj"},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 69, "Stu RN": 64, "S First Name": "rewte", "S Middle Name": null, "S Last Name": "desa"}] [Count] => 61 )

?>
