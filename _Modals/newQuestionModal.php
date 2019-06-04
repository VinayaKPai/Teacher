<!-- New Question Modal -->
<div id="newQuestionModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Question to you Database</h4>
      </div>
      <div class="modal-body">
        <p>Fill ALL fields to use this question in your Tests</p>
		  <form action="../../AddNew/addnewquestion.php" method="post">
		  	Subject: <input type="text" id="1" />
			Topic: <input type="text" id="2" />
			Type: <input type="text" id="3" />
			Question: <input type="text" id="4" />
			<button type="submit" name="submit" id="submit">ADD Question</button>
		  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- New Question Modal End-->