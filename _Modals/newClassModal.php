<!-- New Class Modal -->
<script type="text/javascript">
	function chkblanks () {
		  var x = document.forms["newClassForm"]["classNumber"].value;
			var y = document.forms["newClassForm"]["sectionAlpha"].value;
		  if (x == "" || y == "") {
			alert("All fields are required");
			return false;
		  }
	}
</script>
<div id="newClassModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title roundedsquare">Add New Class with Section</h4>
      </div>
      <div class="modal-body">
		  <p>Select options in both dropdowns after checking the existing entries in the database</p>
		  <div class="row">
			  <div class="col-sm-6 centered" style="border: 1px solid Grey;">
				  <form name="newClassForm" action="../../AddNew/addnewclass.php"  onsubmit="return chkblanks()" method="post" target="_parent">
						  Class/Std: &emsp;
						  <select name="classNumber" id="classNumber">
							  <option id="blank" placeholder="Select Class"></option>
							  <option id="std1">I</option>
							  <option id="std2">II</option>
							  <option id="std3">III</option>
							  <option id="std4">IV</option>
							  <option id="std5">V</option>
							  <option id="std6">VI</option>
							  <option id="std7">VII</option>
							  <option id="std8">VIII</option>
							  <option id="std9">IX</option>
							  <option id="std10">X</option>
							  <option id="std11">XI</option>
							  <option id="std12">XII</option>
						  </select>

						  Section: &nbsp;
						  <select name="sectionAlpha" id="sectionAlpha">
							  <option id="A">A</option>
							  <option id="B">B</option>
							  <option id="C">C</option>
							  <option id="D">D</option>
							  <option id="E">E</option>
							  <option id="F">F</option>
						  </select>

					  <button name="Submit" id="submit" type="submit">SUBMIT</button>

				  </form>
			  </div>

		  <div id="chk" class="col-sm-6" style="border: 1px solid Grey;">
			<?php include "./AddNew/Existing/classes_taught_by_teachers.php"; ?>
		  </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Reports Modal End-->
