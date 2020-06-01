<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../stylesheet.css">
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/CSTquerries.php";
      include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
      $pageHeading = "Classes-Sections-Teachers";
    ?>
  </head>
  <body class="body">
    <?php echo $datetime; ?>
    <div class="container">
      <?php include $_SERVER['DOCUMENT_ROOT']."/Components/top.php"; ?>
    </div>
    <!-- <div class="container">
      <?php
      for ($a=1;$a<13;$a++) {
        classes_sections_teachers($a,$mysqli,$pageHeading);
      }
      ?>
    </div> -->

<div>ASDF
<?php
$s1 =
'{"Class Id": 8, "Sec Id": 3, "Sub Id": 2},{"Class Id": 8, "Sec Id": 4, "Sub Id": 2},{"Class Id": 1, "Sec Id": 2, "Sub Id": 5},{"Class Id": 1, "Sec Id": 1, "Sub Id": 5}';
$js1 = "[".$s1."]";
echo gettype($js1)."<br>";
print_r($js1);
$s2 = '
  {"C Id": 8, "sectionId": 4, "Stu Id": 57},
  {"C Id": 8, "sectionId": 1, "Stu Id": 48},
  {"C Id": 8, "sectionId": 2, "Stu Id": 44},
  {"C Id": 8, "sectionId": 5, "Stu Id": 54},
  {"C Id": 8, "sectionId": 1, "Stu Id": 68},
  {"C Id": 1, "sectionId": 5, "Stu Id": 63},
  {"C Id": 8, "sectionId": 5, "Stu Id": 9},
  {"C Id": 1, "sectionId": 6, "Stu Id": 28},
  {"C Id": 8, "sectionId": 5, "Stu Id": 39},
  {"C Id": 8, "sectionId": 1, "Stu Id": 33},
  {"C Id": 8, "sectionId": 4, "Stu Id": 56},
  {"C Id": 8, "sectionId": 5, "Stu Id": 50},
  {"C Id": 1, "sectionId": 3, "Stu Id": 11},
  {"C Id": 8, "sectionId": 2, "Stu Id": 30},
  {"C Id": 1, "sectionId": 3, "Stu Id": 41},
  {"C Id": 1, "sectionId": 4, "Stu Id": 13},
  {"C Id": 1, "sectionId": 5, "Stu Id": 53},
  {"C Id": 8, "sectionId": 2, "Stu Id": 19},
  {"C Id": 1, "sectionId": 2, "Stu Id": 27},
  {"C Id": 1, "sectionId": 2, "Stu Id": 64},
  {"C Id": 8, "sectionId": 1, "Stu Id": 31},
  {"C Id": 8, "sectionId": 2, "Stu Id": 45},
  {"C Id": 8, "sectionId": 5, "Stu Id": 32},
  {"C Id": 8, "sectionId": 3, "Stu Id": 20} ' ;
  echo $s2;
$js2 = "[".$s2."]";
echo gettype($js2)."<br>";
print_r($js2);
?>
</div>





    <!-- <a href="../../SetUpPages/newQuestions.php">
      <h4 class="btn btn-block topbanner">Create A New Assessment
        <small style="padding: 10px; color: White;">This will take you to the question bank</small>
      </h4>
      Note: This will only create an assessment. To schedule a deployment, you'll need to come back here and deploy it.
    </a> -->
    <!-- <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "completed";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div> -->
    <!-- <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "ongoing";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div>
    <div class="container">
      <div class="panel-group" id="accordion">
        <?php
          $b = "undeployed";
          activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div>
    <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "all";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div> -->
    <?php
    // get Teacher-class-section-Subject
    "SELECT
    	DISTINCT
    		users.firstName,
    		users.middleName,
    		users.lastName,
    		classes.classId,
    		classes.classNumber,
    		sections.sectionId,
    		sections.Sections,
    		subjects.Subject
     FROM
     users,
     classes_taught_by_teacher,
     classes,
     sections,
     subjects
     WHERE
     classes_taught_by_teacher.userId = $teacherId AND
     users.userId = classes_taught_by_teacher.userId AND
     classes.classId = classes_taught_by_teacher.classId AND
     sections.sectionId = classes_taught_by_teacher.sectionId AND
     subjects.subjectId = classes_taught_by_teacher.subjectId
     ORDER BY classes.classId ASC, sections.sectionId ASC");

    //to get appropriate student details
    "SELECT
    	users.firstName,
    	users.middleName,
    	users.lastName,
    	classes.classNumber,
    	sections.Sections
    	FROM
    		users,
    		studentdetails,
    		classes,
    		sections
    	WHERE
    		users.userId = studentdetails.userId AND
    		studentdetails.sectionId = $sectionId AND
    		studentdetails.classId = $classId AND
    		studentdetails.classId = classes.classId AND
    		studentdetails.sectionId = sections.sectionId "


    "SELECT
    		userId AS 'Id',
    		firstName AS 'First Name',
    		middleName AS 'Middle Name',
    		lastName AS 'Last Name',
    		Email AS 'External Email',
    		systemEmail AS 'Internal Email',
    		joinYear AS 'Joined',
    		phoneMobile AS 'Mobile'
    	FROM users
    	WHERE `visibility` = 'Y'
    	AND `role` = 'T'"

    users, studentdetails, classes, sections
    users, classes_taught_by_teacher, teachers, classes, sections, subjects

    //ABOVE ARE THE THREE WORKING QUERIES
    //BELOW are the merged queries which seem to give the correct data but display is screwed
    SELECT DISTINCT
    				U.userId AS 'T Id',
    				U.firstName AS 'T First Name',
    				U.middleName AS 'T Middle Name',
    				U.lastName AS 'T Last Name',
    				U.Email AS 'T External Email',
    				U.systemEmail AS 'T Internal Email',
    				U.phoneMobile AS 'T Mobile',
    				U.visibility AS 'Current',
    			json_arrayagg(DISTINCT json_object(
    				'Sub Id', Sub.subjectId,
    				'Class Id',CTT.classId,
    				'Sec Id', Sec.sectionId
    			) ) as 'Subjects',
    			json_arrayagg(DISTINCT json_object(
    				'C Id', SD.classId,
    				'sectionId', SD.sectionId,
    				'Stu Id', SD.userId
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
    					-- LEFT JOIN classes as C1 on C1.classId = CTT.classId
    			GROUP BY U.userId
                ORDER BY U.userId, CTT.classId, CTT.sectionId, SD.userId

    ------------------------------------
    $query = $mysqli->query(
    	"SELECT *
    		FROM
    			users,
    			studentdetails,
    			classes,
    			sections
    		WHERE
    			users.userId = studentdetails.userId AND
    			users.role = 'S' AND
    			classes.classId = studentdetails.classId AND
    			sections.sectionId = studentdetails.sectionId
    			ORDER BY classes.classId, sections.sectionId");

    $query = $mysqli->query(
    		"SELECT
    			users.firstName,
    			users.middleName,
    			users.lastName,
    			classes.classId,
    			classes.classNumber,
    			sections.sectionId,
    			sections.Sections,
    			studentdetails.rollNumber,
    			users.Email,
    			users.systemEmail,
    			users.joinYear,
    			users.endYear,
    			users.phoneMobile
    			FROM
    				users,
    				studentdetails,
    				classes,
    				sections
    			WHERE
    				users.userId = studentdetails.userId AND
    				users.role = 'S' AND
    				classes.classId = studentdetails.classId AND
    				sections.sectionId = studentdetails.sectionId
    			ORDER BY classes.classId ASC, sections.sectionId ASC"
    	-------------------------------------------

    	SELECT DISTINCT
    			C.classId AS 'C Id',
    			C.classNumber AS 'Class / Std',
    				json_arrayagg(DISTINCT json_object(
    					'SD C Id', SD.classId,
    					'SD sectionId', SD.sectionId,
    					json_arrayagg(DISTINCT json_object(
    						'Stu C Id', SD.classId,
    						'Stu sectionId', SD.sectionId,
    						'Stu Id', SD.userId,

    					) ) as 'Students'
    				) ) as 'Sections',

    			FROM
    				classes as C
    			INNER JOIN studentDetails AS SD
    				ON SD.classId = C.classId
    			LEFT JOIN sections AS Sec
    				ON Sec.sectionId = SD.sectionId
    			INNER JOIN users as U
    				ON U.userId = SD.userId

    			Group BY C.classId
    --------------------------------
    $class

    'C Id' = 1
    'Class / Std' = I
    'Sections' =
    	[
    		{"SD C Id": 1, "SD sectionId": 3},
    		{"SD C Id": 1, "SD sectionId": 2},
    		{"SD C Id": 1, "SD sectionId": 6},
    		{"SD C Id": 1, "SD sectionId": 5},
    		{"SD C Id": 1, "SD sectionId": 4}
    	]
    	******$secs**json_decode( $class['Sections']************
    	Array (
    		 [0] => Array ( [SD C Id] => 1 [SD sectionId] => 3 )
    		 [1] => Array ( [SD C Id] => 1 [SD sectionId] => 2 )
    		 [2] => Array ( [SD C Id] => 1 [SD sectionId] => 6 )
    		 [3] => Array ( [SD C Id] => 1 [SD sectionId] => 5 )
    		 [4] => Array ( [SD C Id] => 1 [SD sectionId] => 4 )
    		  )
    	******$secs**json_decode( $class['Sections']************
    	^^^^^^^^^^^^^^^^^
    	Class 1 section 3
    	Array (
    		[0] => Array ( [Stu C Id] => 1 [Stu sectionId] => 3 [Stu Id] => 41 )
    		[1] => Array ( [Stu C Id] => 1 [Stu sectionId] => 2 [Stu Id] => 64 )
    		[2] => Array ( [Stu C Id] => 1 [Stu sectionId] => 2 [Stu Id] => 27 )
    		[3] => Array ( [Stu C Id] => 1 [Stu sectionId] => 6 [Stu Id] => 28 )
    		[4] => Array ( [Stu C Id] => 1 [Stu sectionId] => 5 [Stu Id] => 63 )
    		[5] => Array ( [Stu C Id] => 1 [Stu sectionId] => 5 [Stu Id] => 53 )
    		[6] => Array ( [Stu C Id] => 1 [Stu sectionId] => 4 [Stu Id] => 13 )
    		[7] => Array ( [Stu C Id] => 1 [Stu sectionId] => 3 [Stu Id] => 11 ) )
    	^^^^^^^^^^^^^^^^^
    'Students' =
    	[
    		{"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 41},
    		{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 64},
    		{"Stu C Id": 1, "Stu sectionId": 2, "Stu Id": 27},
    		{"Stu C Id": 1, "Stu sectionId": 6, "Stu Id": 28},
    		{"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 63},
    		{"Stu C Id": 1, "Stu sectionId": 5, "Stu Id": 53},
    		{"Stu C Id": 1, "Stu sectionId": 4, "Stu Id": 13},
    		{"Stu C Id": 1, "Stu sectionId": 3, "Stu Id": 11}
    	]
    	^^^^^^^^^^^^^^^^^$studs^^^^^^^^^^^^^^^^
    	Array (
    		[0] => Array ( [Stu C Id] => 1 [Stu sectionId] => 3 [Stu Id] => 41 )
    		[1] => Array ( [Stu C Id] => 1 [Stu sectionId] => 2 [Stu Id] => 64 )
    		[2] => Array ( [Stu C Id] => 1 [Stu sectionId] => 2 [Stu Id] => 27 )
    		[3] => Array ( [Stu C Id] => 1 [Stu sectionId] => 6 [Stu Id] => 28 )
    		[4] => Array ( [Stu C Id] => 1 [Stu sectionId] => 5 [Stu Id] => 63 )
    		[5] => Array ( [Stu C Id] => 1 [Stu sectionId] => 5 [Stu Id] => 53 )
    		[6] => Array ( [Stu C Id] => 1 [Stu sectionId] => 4 [Stu Id] => 13 )
    		[7] => Array ( [Stu C Id] => 1 [Stu sectionId] => 3 [Stu Id] => 11 ) )
    	^^^^^^^^^^^^^^^^^^$studs^^^^^^^^^^^^^^^
    ------------------$class--------------------------

    2
    II
    [{"SD C Id": 2, "SD sectionId": 2},{"SD C Id": 2, "SD sectionId": 6},{"SD C Id": 2, "SD sectionId": 4},{"SD C Id": 2, "SD sectionId": 5},{"SD C Id": 2, "SD sectionId": 1}]
    [{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 55},{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 34},{"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 26},{"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 37},{"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 58},{"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 24},{"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 59},{"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 60},{"Stu C Id": 2, "Stu sectionId": 1, "Stu Id": 14},{"Stu C Id": 2, "Stu sectionId": 5, "Stu Id": 16},{"Stu C Id": 2, "Stu sectionId": 1, "Stu Id": 15},{"Stu C Id": 2, "Stu sectionId": 4, "Stu Id": 70},{"Stu C Id": 2, "Stu sectionId": 6, "Stu Id": 67},{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 66},{"Stu C Id": 2, "Stu sectionId": 2, "Stu Id": 65}]
    8
    VIII
    [{"SD C Id": 8, "SD sectionId": 4},{"SD C Id": 8, "SD sectionId": 2},{"SD C Id": 8, "SD sectionId": 1},{"SD C Id": 8, "SD sectionId": 5},{"SD C Id": 8, "SD sectionId": 3}]
    [{"Stu C Id": 8, "Stu sectionId": 4, "Stu Id": 57},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 44},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 45},{"Stu C Id": 8, "Stu sectionId": 4, "Stu Id": 56},{"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 48},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 50},{"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 68},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 9},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 54},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 30},{"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 31},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 39},{"Stu C Id": 8, "Stu sectionId": 5, "Stu Id": 32},{"Stu C Id": 8, "Stu sectionId": 1, "Stu Id": 33},{"Stu C Id": 8, "Stu sectionId": 2, "Stu Id": 19},{"Stu C Id": 8, "Stu sectionId": 3, "Stu Id": 20}]
    9
    IX
    [{"SD C Id": 9, "SD sectionId": 3},{"SD C Id": 9, "SD sectionId": 6},{"SD C Id": 9, "SD sectionId": 4},{"SD C Id": 9, "SD sectionId": 5},{"SD C Id": 9, "SD sectionId": 1},{"SD C Id": 9, "SD sectionId": 2}]
    [{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 22},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 61},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 62},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 21},{"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 18},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 17},{"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 12},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 69},{"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 23},{"Stu C Id": 9, "Stu sectionId": 6, "Stu Id": 25},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 29},{"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 42},{"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 43},{"Stu C Id": 9, "Stu sectionId": 3, "Stu Id": 38},{"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 46},{"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 47},{"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 36},{"Stu C Id": 9, "Stu sectionId": 4, "Stu Id": 49},{"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 35},{"Stu C Id": 9, "Stu sectionId": 1, "Stu Id": 52},{"Stu C Id": 9, "Stu sectionId": 5, "Stu Id": 40},{"Stu C Id": 9, "Stu sectionId": 2, "Stu Id": 10}]
    =================30-5-2020=========================
    ?>

  </body>
</html>
