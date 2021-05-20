
<form name="newClassForm" action="../Scripts/php/allInsertQueries.php" method="post">

  <div style="display: flex; justify-content: space-between;">
    <?php
        // $pageheading = "CTT";
        $displayType = "dropdown";
        echo "<span><span class='red'>*</span>";
        include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/teacherDropDown.php";
        echo "</span>";
        echo "<span><span class='red'>*</span>";
        include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/classNumberDropDown.php";
        echo "</span>";
        echo "<span><span class='red'>*</span>";
        include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/sectionAlphaDropDown.php";
        echo "</span>";
        echo "<span><span class='red'>*</span>";
        include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/subjectDropDown.php";
        echo "</span>";
    ?>
  </div>
  <div style="padding: 10px; display: flex; justify-content: space-around;">
    <span><span><span class='red'>*</span>
      <input type="checkbox" name="confirm"  value="<?php echo $pageCode; ?>" required>All data is correct</input>
    </span>
    <span>
      <button name="Submit" id="Submit" type="submit">SUBMIT</button>
    </span>
  </div>

</form>
