<?php
$myArray=array('aa','bb','cc','dd');
while (list ($key, $val) = each ($myArray) ) echo $key.$val;
reset($myArray);
while (list ($key, $val) = each ($myArray) ) echo $val;
?>
