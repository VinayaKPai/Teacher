<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title centered">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">All Saved Assessments</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body" style="height: 400px; overflow: scroll;">
          <table style='width: 100%;'>
            <?php
             include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/activity.php";
             ?>
           </table>
           <p class="centered">**********  Saved <?php echo $pageHeading; ?>  **********</p>
         </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title centered">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Previously Completed <?php echo $pageHeading;?></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body" style="height: 400px; overflow: scroll;">
          <h4>Completed <?php echo $pageHeading;?></h4>
          <table style='width: 100%;'>
            <?php
              include $_SERVER['DOCUMENT_ROOT']."/"."Activity"."/completed".$pageHeading.".php";
            ?>
         </table>
         <p class="centered">**********  Completed <?php echo $pageHeading;?>  **********</p>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title centered">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Ongoing <?php echo $pageHeading;?></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body" style="height: 400px; overflow: scroll;"><h4>Ongoing <?php echo $pageHeading;?>s</h4>
        <table style='width: 100%;'>
          <?php
          include $_SERVER['DOCUMENT_ROOT']."/"."Activity"."/ongoing".$pageHeading.".php";
          ?>
        </table>
        <p class="centered">**********  Ongoing <?php echo $pageHeading;?>  **********</p>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title centered">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Future or Undeployed <?php echo $pageHeading;?></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body" style="height: 400px; overflow: scroll;">
          <table style='width: 100%;'>
            <?php
            include $_SERVER['DOCUMENT_ROOT']."/"."Activity"."/undeployed".$pageHeading.".php";
            ?>
          </table>
          <p class="centered">**********  Future or undeployed <?php echo $pageHeading;?>  **********</p>
        </div>
      </div>
    </div>

 </div>
