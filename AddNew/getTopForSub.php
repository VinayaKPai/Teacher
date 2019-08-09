<?php
header('Content-Type: application/json');
	include "../basecode-create_connection.php";

$rowTopicArray = array();

$arrayGET = $_GET;
// print_r($arrayGET);echo "<br>";
// print_r(array_keys($arrayGET));echo "<br>";
//
// echo "<br>";
$queryArray=[];
$queryString;
$cn = [];
$sn = [];
$i; $j;
$yes = 0;

for ($a=0;$a<count($arrayGET);$a++) {
		$key = array_keys($arrayGET)[$a];
		// echo gettype($key)."  ".$key."<br>";
		$explodeKey = explode(',',$key);
				// echo $key." = ";
				// print_r($explodeKey);
				// echo " is an ".gettype($explodeKey)."and count of ".count($explodeKey)."<br>";
				array_push($queryArray,explode(',',array_values($arrayGET)[$a]));
			}
// echo " query array = ";
// print_r($queryArray);
// echo "<br> type of 0 = ".gettype($queryArray[0]);print_r($queryArray[0]);
// echo "<br>";





$queryString = "SELECT * FROM `topics` WHERE ";

          for ($x = 0; $x < count($queryArray[0]); $x++) {  //$queryArray[0] is array of subjects in $arrayGET
                if($x == 0) {
                    $queryString = $queryString."(`classNumber`=  '".$queryArray[0][$x]."' "; //first class in array can be appended to querySTRING directly
                } else {
                    $queryString = $queryString."OR `classNumber`= '".$queryArray[0][$x]."' ";  //every subsequent class needs to be appended with an "OR" to the query string
                }
          }
        $queryString = $queryString.") ";

        // if(count($queryArray)>0) { // If the arrayGET( same as in $queryArray )has classNumbers too, then we need an "AND in the query string"
        //   $queryString = $queryString."AND ";
        // }

				if ($queryArray[1]!="" OR $queryArray[1]!=NULL) {
					$queryString = $queryString."AND ";
		        for ($x = 0; $x < count($queryArray[1]); $x++) {  //$queryArray[1] is array of classes in $arrayGET

		            if($x == 0) {
		                $queryString = $queryString."(`subjectName`= '".$queryArray[1][$x]."' ";  //first class in array can be appended to querySTRING directly
		            } else {
		              $queryString = $queryString."OR `subjectName`= '".$queryArray[1][$x]."' ";  //every subsequent class needs to be appended with an "OR" to the query string
		            }
          	}
				}

  $queryString = $queryString.") "; //close the queryString


echo $queryString;

$query = $mysqli->query($queryString);

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 or many (if present).
if ($rowcount<1) {echo "No records";}
	while ($row=mysqli_fetch_assoc($query)){	//fetch all columns of the query results

		$top = $row['topicName'];
		// array_push($rowTopicArray,$top);	//Id of the returned row
		echo "<option name='$top' id='$top'>$top</option>";

}


		// $sendTopicArray = json_encode($rowTopicArray);
		// echo $sendTopicArray;


mysqli_close($mysqli);
?>
