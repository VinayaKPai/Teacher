<?php
//create connection
/*
$host="localhost";
$user="vkpsolut_vinaya";
$wd="vinayapai25363";
$db="vkpsolut_vkpsolutions_demo";
$mysqli = new mysqli($host, $user,$wd,$db);
*/

// old connection string
// $mysqli = new mysqli("localhost", "vkpso_admin","PassWord1234!@#$","vkpsolut_teachers_tools");
// new connection string for teachers_tool
$mysqli = new mysqli("localhost", "vkpso_admin","PassWord1234!@#$","teachers_tool");

//check connection and raise error on failure
if ($mysqli->connect_errno) {
    echo " (ERROR encountered!!!!" . $mysqli->connect_errno . ") Sorry!!!!" ;
}

//capture date time
$data = $_SERVER["REQUETIME"];
$datetime = date('d/m/Y H:i:s', $data);

$data1 = $_SERVER["REQUETIME"] + 1000;
$datetime1 = date('d/m/Y H:i:s', $data1);
//echo "server request time  + 1000 is : ", $datetime1, "<br />";


$data2 = $_SERVER["REQUETIME"] + 3600;
$datetime2 = date('d/m/Y H:i:s', $data2);
//echo "server request time  + 3600 is : ", $datetime2, "<br />";

$data3 = $_SERVER["REQUETIME"] + 50000;
$datetime3 = date('d/m/Y H:i:s', $data3);
//echo "server request time  + 50000 is : ", $datetime3, "<br />";

$data4 = $_SERVER["REQUETIME"] + 100000;
$datetime4 = date('d/m/Y H:i:s', $data4);
//echo "server request time  + 100000 is : ", $datetime4, "<br />";

//requester's ipaddress
    $ipaddress = $_SERVER["REMOTE_ADDR"] ;
//echo "requester's ipaddress is : ", $ipaddress , "<br />";

?>
