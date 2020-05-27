<!-- New Student Modal -->
<div id="teacherModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">More Teacher Details Header</h4>
      </div>
      <div class="modal-body">
		  <div class="row">
			  <div class="col-sm-6" style="border: 1px solid black; height: 100%;">
				  Add Class_Section_Subject form
				  <hr />
				  <form action="../AddNew/addnewstudent.php" method="post">
					  First Name : <input typ="text" name="firstName" id="firstName"/><br />
					  Last Name : <input typ="text" name="lastName" id="lastName"/><br />
					  Email : <input typ="text" name="email" id="email"/><br />
					  Mobile : <input typ="text" name="phoneMobile" id="phoneMobile"/><br /><br />
					  <button name="Submit" id="submit" type="submit">SUBMIT</button>
				  </form>
			  </div>
			  <div class="col-sm-6" style="border: 1px solid black;">
				  <h6 class="centered">Existing Students</h6>
				  <hr />
				  <div>
						  <?php $query = $mysqli->query("SELECT * FROM users");
							$rowcount=mysqli_num_rows($query);
							echo "Currently ".$rowcount." students<br />";
						  ?>
				  </div>
				  <?php include "./AddNew/Existing/teachers.php"; ?>
			  </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- New Test Modal End-->
<div id="exploreModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span  id="exploreItem"></span></span></h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6" style="border: 1px solid black; height: 100%;">
                        <h4>Time Table</h4>
                        <hr />
                        <p> Explore Modal body</p>
                      </div>
                      <div class="col-sm-6" style="border: 1px solid black;">
                        <h4 class="centered"><span  id="expClass"></span><span  id="expSection"> - <span  id="expSubject"></span><span id="exploreSpan"></span></h4>
                        <hr />
                        <div id="exploreajaxRes">
                          Ajax Res
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>


<div id="teacherModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
  <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="text-align: center;">
              <span  id="teacherName"></span>
            </h4>
          </div>
          <div class="modal-body">
          <div class="row">
            <div class="col-sm-6" style="border: 1px solid black; height: 100%;">
              <h4 style="text-align: center;">Add Class, Section, Subject</span></h4>
              <hr />
              <form action="/AddNew/addnewclasses_taught_by_teachers.php" method="post" id="add_det_form">
                  <?php $displayType = "dropdown";
                    include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
                    echo "<br>";
                    include $_SERVER['DOCUMENT_ROOT']."/Components/sectionAlphaDropDown.php";
                    echo "<br>";
                    include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
                  ?>
                  <br>
                  <input id="teacherId" name="teacherId" hidden> </input>
                  <button class="btn btn-default" name="Submit" id="submit" type="submit" style="margin: auto;">SUBMIT</button>
              </form>
            </div>
            <div class="col-sm-6" style="border: 1px solid black;">
              <h4 class="centered"><span id="modalSpan"></span> teaches:</h4>
              <hr />
              <h6 class='centered'>To see students for each class click Explore button</h6>
              <div id="ajaxRes">
                <?php
                  include "../Scripts/php/singleTeacherClasses.php";
                ?>
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
  </div>
