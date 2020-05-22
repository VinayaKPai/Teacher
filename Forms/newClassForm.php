<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
  <div>
    <?php
        $displayType = "dropdown";
        include $_SERVER['DOCUMENT_ROOT']."/Components/teacherDropDown.php";
    ?>
  </div>
  <div>
    <?php
        $displayType = "dropdown";
        include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
    ?>
  </div>
  <div>
    <?php
        $displayType = "dropdown";
        include $_SERVER['DOCUMENT_ROOT']."/Components/sectionAlphaDropDown.php";
    ?>
  </div>
  <div>
    <?php
        $displayType = "dropdown";
        include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
    ?>
  </div>
  <button name="Submit" id="submit" type="submit">SUBMIT</button>

</form>
