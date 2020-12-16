<?php
  if (isset($_SESSION['clsec'])) {
      echo "<div class='container-fluid'>";
        if ($_SESSION['clsec']!='') {
          echo "<h5>You have ".count($_SESSION['clsec'])." classes: </h5>";
          echo "<div>
                  <h6><ul class='list-group list-group-horizontal d-flex flex-wrap'  style='justify-content: space-between;'>";
                    foreach ($_SESSION['clsec'] as $value) {
                      echo "<li class='list-group-item'>".$value."</li>";
                    }
          echo "</ul></h6></div>";
          include $_SERVER['DOCUMENT_ROOT']."/Components/createNewAssessmentBtn.php";
          }
        else {
          echo "<h4>You don't have any classes assigned yet!</h4>";
        }
      echo "</div>";
    }
    else {
      echo "<h4>Looks like you don't have any assigned classes. Please contact Admin!</h4>";
      echo "<div class='centered'>";
      include $_SERVER['DOCUMENT_ROOT']."/Components/contactAdmin.php";
      echo "</div>";
    }

?>
