<?php
  print_r($_POST);
  echo "<br>";
  foreach ($_POST as $key => $val) {
    echo "Q-Id: ".$key." Ans: ".$val."<br>";
  }

?>
