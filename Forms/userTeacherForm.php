<script>
  function setTempPW(e) {
    var ei = e.value;
    document.getElementById("tpw").value = ei;
  }
</script>
<!-- <div class="centered" style="padding: 3px; border: 1px solid #413949; border-radius: 5px;"> -->


  <form name="newTeacherForm" action="../Scripts/php/allInsertQueries.php" method="post">
    <div class="form-group">
      <div class="col-sm-4">
          <label for="firstName">First Name
            <span class="glyphicon glyphicon-asterisk" style="color: Red">
            </span>
          </label>
          <input id="firstName" name="firstName" class="form-control" required />
      </div>
      <div class="col-sm-4">
          <label for="middleName">Middle Name</label>
          <input id="middleName" name="middleName" class="form-control" />
      </div>
      <div class="col-sm-4">
          <label for="lastName">Last Name
            <span class="glyphicon glyphicon-asterisk" style="color: Red">
            </span>
          </label>
          <input id="lastName" name="lastName" class="form-control" required />
      </div>
      <div class="col-sm-6">
          <label for="phoneMobile">Mobile
            <span class="glyphicon glyphicon-asterisk" style="color: Red">
            </span>
          </label>
          <input id="phoneMobile" name="phoneMobile" class="form-control" onkeyup="setTempPW(this)"/>
      </div>
      <div class="col-sm-6">
          <label for="email">Email
            <span class="glyphicon glyphicon-asterisk" style="color: Red">
            </span>
          </label>
          <input id="email" name="email" class="form-control" />
      </div>
    <div class="col-sm-4">
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/Components/joinYearDropDown.php";
      ?>
    </div>
    <div class="col-sm-4">
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/Components/endYearDropDown.php";
      ?>
    </div>
    <div style="padding: 10px; display: flex; justify-content: space-around;">
      <span><span><span class='red'>*</span>
        <input type="checkbox" name="confirm"  value="NTD" required>All data is correct</input>
      </span>
      <span>
        <button name="Submit" id="submit" type="submit">SUBMIT</button>
      </span>
    </div>

  </div>
  </form>
<!-- </div> -->
<!-- Add more teacher details -->
<!-- <div id="moreTeacherDetails" style="display: none; padding: 3px; border: 1px solid #413949; border-radius: 5px;">
  <h4>Add more teacher details</h4>
  <form name="additionalTeacherDetailsForm" action="../Scripts/php/allInsertQueries.php" method="post">
    <div style="padding: 10px; display: flex; justify-content: space-around;">
      <div class="col-sm-3">
          <span class='red'>*</span><?php $displayType = "dropdown"; include $_SERVER['DOCUMENT_ROOT']."/Components/teacherDropDown.php"; ?>
      </div>
      <div class="col-sm-3">
          <span class='red'>*</span><?php $displayType = "dropdown"; include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php"; ?>
      </div>
      <div class="col-sm-3">
          <span class='red'>*</span><?php include $_SERVER['DOCUMENT_ROOT']."/Components/sectionAlphaDropDown.php"; ?>
      </div>
      <div class="col-sm-3">
          <span class='red'>*</span><?php include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php"; ?>
      </div>

      <div><span><span class='red'>*</span>
        <input type="checkbox" name="confirm"  value="CTT" required>All data is correct</input>
      </span>

      <span>
        <button name="Submit" id="submit" type="submit">SUBMIT</button>
      </span>
    </div>
    </div>
  </form>
</div> -->
