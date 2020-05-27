<form name="newTeacherForm" action="../AddNew/addnewteacher.php" method="post">
  <div class="form-group">
    <label for="firstName">First Name
      <span class="glyphicon glyphicon-asterisk" style="color: Red">
      </span>
    </label>
    <input id="firstName" name="firstName" class="form-control" required />
    <label for="middleName">Middle Name</label>
    <input id="middleName" name="middleName" class="form-control" />
    <label for="lastName">Last Name
      <span class="glyphicon glyphicon-asterisk" style="color: Red">
      </span>
    </label>
    <input id="lastName" name="lastName" class="form-control" required />
    <label for="phoneMobile">Mobile
      <span class="glyphicon glyphicon-asterisk" style="color: Red">
      </span>
    </label>
    <input id="phoneMobile" name="phoneMobile" class="form-control" onkeyup="setTempPW(this)"/>
    <script>
      function setTempPW(e) {
        var ei = e.value;
        document.getElementById("tpw").value = ei;
      }
    </script>
  </div>
  <div class="form-group">
    <label for="email">Email</label><input id="email" name="email" class="form-control" />
  </div>
  <div class="form-group">
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Components/joinYearDropDown.php";
    ?>
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Components/endYearDropDown.php";
    ?>
    <label for="tpw">Assigned Temp PW </label><input id="tpw" name="tpw" disabled/>
  </div>

  <button name="Submit" id="submit" type="submit">SUBMIT</button>
</form>
