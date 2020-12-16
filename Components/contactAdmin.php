<?php
  echo "<h5>Contact Admin</h5>";
  echo "<div style='align: center;'>";
  echo "<form action='../../Components/thankyou.php' method='POST'>";
    echo "<label class='radio'   style='font-size: 14px;'>
        <input type='radio' name='supportIssue' id='classAssignment' value='ca' checked>Reminder to assign classes
      </label>";
      echo "<label class='radio'   style='font-size: 14px;'>
          <input type='radio' name='supportIssue' id='classAssignment' value='xx' >Reminder to xxxxx
        </label>";
        echo "<label class='radio'   style='font-size: 14px;'>
            <input type='radio' name='supportIssue' id='classAssignment' value='yy' >Reminder to yyyy
          </label>";
          echo "<label class='radio'   style='font-size: 14px;'>
              <input type='radio' name='supportIssue' id='classAssignment' value='zz' >Reminder to zzzz
            </label>";
    echo "<button type='submit'>SUBMIT</button>";
  echo "</form>";
  echo "</div>";

 ?>
