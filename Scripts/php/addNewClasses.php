<?php //include "../../../basecode-create_connection.php";

echo "*****************GET ARRAY**************** \n";
    print_r($_GET);
		echo "*****************GET ARRAY**************** \n";

$data = $_GET; //$data will hold classNumber and section Alpha objects
for ($i=0;$i<count($data);$i++) {
	print_r($data[$i]);
}

// if (empty($data)) {
// 	echo " $ GET data is empty in add classes php\n";
// }
// else
// echo "\n";
// print_r($data);
// echo "$ GET data printed \n";
// for ($i=0; $i<count($data); $i++) {
// 	// $dataitem = $data[$i];
// 	// echo $dataitem." is inside for loop in add classes \n";
// 	echo $i."inside for loop \n";
// }

echo "*****************END PHP FILE**************** \n";



//
?>
