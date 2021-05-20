<div class="container panel modal-content roundedsquare cards white" style="height=80%;">
  <form action="../../Scripts/php/login.php" method="post" style="padding: 5%; margin:2%; border: 2px solid #4B0082;">
    <div class="centered" style="float: center;">
      <label class="radio-inline sqbtn "  style="font-size: 14px;">
        <input type="radio" name="Utype" id="Teacher" value="T" checked>Teacher
      </label>
      <label class="radio-inline sqbtn" style="font-size: 14px;">
        <input type="radio" name="Utype" id="Student" value="S">Student
      </label>
      <label class="radio-inline sqbtn" style="font-size: 14px;">
        <input type="radio" name="Utype" id="Admin" value="A">Admin
      </label>
    </div>
    <div style="padding: 5%;">
      <label for="#phemail" class="col-sm-5" style="font-size: 12px;">Phone / Email  </label>
      <input  class="col-sm-5 green" id="phemail" name="phemail"/>
    </div>
    <div style="padding: 5%;">
      <label for="#password"  class="col-sm-5" style="font-size: 12px;">Password</label>
      <input  class="col-sm-5 green" id="password"  type="password" name="password" />
    </div>
    <div style="padding: 5%;">
      <button class="btn btn-info" type="Submit" name="Submit">Login</button>
    </div>
  </form>
</div>
