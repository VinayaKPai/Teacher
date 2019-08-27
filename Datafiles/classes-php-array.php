<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
// $subjects = array(
//   array('id' => '8','Subject' => 'Biology'),
//   array('id' => '7','Subject' => 'Chemistry'),
//   array('id' => '12','Subject' => 'Civics'),
//   array('id' => '11','Subject' => 'Computer Science'),
//   array('id' => '2','Subject' => 'English'),
//   array('id' => '10','Subject' => 'Geography'),
//   array('id' => '1','Subject' => 'Hindi'),
//   array('id' => '9','Subject' => 'History'),
//   array('id' => '3','Subject' => 'Maths'),
//   array('id' => '6','Subject' => 'Physics'),
//   array('id' => '4','Subject' => 'Science'),
//   array('id' => '5','Subject' => 'Social Studies')
//
$query = $mysqli->query("SELECT * FROM classes");
while ($row = $query->fetch_assoc()){
  $classesRow = $row;
}
$classesOutput = json_encode($classesRow);

$testStringCl = "From Class";
?>
