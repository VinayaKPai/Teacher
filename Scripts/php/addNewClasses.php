<?php //include "../../../basecode-create_connection.php";
echo "PRINTING POST \n";
print_r($_POST);
echo "***************** PHP FILE**************** \n";
// $pdata = $_POST;
// print_r($_POST);
//
//
// echo gettype($pdata)." = type of $ pdata \n";
// echo count($pdata)." = count of $ pdata\n";

$codedstr = json_encode($_POST);
echo gettype($codedstr)." = type of $ codedstr \n";
echo $codedstr."\n";
echo "*****************END PHP FILE**************** \n";



//
?>
