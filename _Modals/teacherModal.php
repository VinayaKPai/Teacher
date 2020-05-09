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
