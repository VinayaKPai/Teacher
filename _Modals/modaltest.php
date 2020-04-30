<?php include "../basecode-create_connection.php";
	echo $datetime1;

?>
<!-- Remote Modal -->
<div id="remoteModal" class="modal fade" role="dialog"  tabindex='-1'>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remote Modal Title</h4>
      </div>
      <div class="modal-body">
        <p>Remote modal text</p>
		  <input type="text" id="remoteModalInput" placeholder="Type Something here" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Remote Modal End-->
