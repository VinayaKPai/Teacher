<h5 class='centered topbanner'>Explore
  <?php
  // This is a container for the specific class-section and only defines the Heading for the area
    echo $_GET['C']."-".$_GET['S'];

  ?>
</h5>

<?php
  $cl =  $_GET['c'];
  $sc = $_GET['s'];
    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/ClassSectionParts.php";
?>
