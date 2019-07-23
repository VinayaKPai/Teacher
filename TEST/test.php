<?php
$myArray=array('aa','bb','cc','dd');
while (list ($key, $val) = each ($myArray) ) echo $key.$val;
reset($myArray);
while (list ($key, $val) = each ($myArray) ) echo $val;
// stdClass Object (
//   [name] => Id
//   [orgname] => Id
//   [table] => questionbank
//   [orgtable] => questionbank
//   [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 3
//   [length] => 4
//   [charsetnr] => 63
//   [flags] => 49667
//   [type] => 3
//   [decimals] => 0 )
// stdClass Object (
//   [name] => classNumber
//   [orgname] => classNumber
//   [table] => questionbank
//   [orgtable] => questionbank [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 2
//   [length] => 4
//   [charsetnr] => 8
//   [flags] => 4097
//   [type] => 253
//   [decimals] => 0 )
// stdClass Object (
//   [name] => subjectName
//   [orgname] => subjectName
//   [table] => questionbank
//   [orgtable] => questionbank [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 13
//   [length] => 25
//   [charsetnr] => 8
//   [flags] => 4097
//   [type] => 253
//   [decimals] => 0 )
// stdClass Object (
//   [name] => topicName
//   [orgname] => topicName
//   [table] => questionbank
//   [orgtable] => questionbank
//   [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 13
//   [length] => 100
//   [charsetnr] => 8
//   [flags] => 4097
//   [type] => 253
//   [decimals] => 0 )
// stdClass Object (
//   [name] => typeName
//   [orgname] => typeName
//   [table] => questionbank
//   [orgtable] => questionbank
//   [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 4
//   [length] => 5
//   [charsetnr] => 8
//   [flags] => 4097
//   [type] => 253
//   [decimals] => 0 )
// stdClass Object (
//   [name] => question
//   [orgname] => question
//   [table] => questionbank
//   [orgtable] => questionbank [def] => [db] => vkpsolut_teachers_tools
//   [catalog] => def
//   [max_length] => 220
//   [length] => 225
//   [charsetnr] => 8
//   [flags] => 4097
//   [type] => 253
//   [decimals] => 0 )
?>
