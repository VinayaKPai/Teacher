<form name="newTeacherForm" action="../AddNew/addnewteacher.php" method="post">
  <div class="form-group">
    <label for="firstName">First Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="firstName" name="firstName" class="form-control" required />
    <label for="middleName">Middle Name</span></label> <input id="middleName" name="middleName" class="form-control" />
    <label for="lastName">Last Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="lastName" name="lastName" class="form-control" required />
    <label for="phoneMobile">Mobile<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="phoneMobile" name="phoneMobile" class="form-control" onkeyup="setTempPW(this)"/>
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
    <label for="joinYear">Join Year</label> <select id="joinYear" name="joinYear" >
      <option id="blanksa"></option>
      <option id="j2017">2017</option>
      <option id="j2018">2018</option>
      <option id="j2019">2019</option>
      <option id="j2020">2020</option>
      <option id="j2021">2021</option>
      <option id="j2022">2022</option>
    </select>
    <label for="endYear">End Year</label><select id="endYear" name="endYear" >
      <option id="blanksa"></option>
      <option id="l2017">2017</option>
      <option id="l2018">2018</option>
      <option id="l2019">2019</option>
      <option id="l2020">2020</option>
      <option id="l2021">2021</option>
      <option id="l2022">2022</option>
    </select><br>
    <label for="tpw">Assigned Temp PW </label><input id="tpw" name="tpw" disabled/>
  </div>

  <button name="Submit" id="submit" type="submit">SUBMIT</button>
</form>
