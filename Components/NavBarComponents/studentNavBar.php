<?php
    $subjects = studentSubjects($mysqli, $_SESSION['userId']);
    while ($result = $subjects->fetch_array()) {

      echo "<a href='../../StudentViews/explore.php?sub=".$result['Subject']."&subId=".$result['Subject Id']."'>
      <button type='button' class='".$buttonClass."'>".$result['Subject']."</button>
      </a>";

    }
?>
