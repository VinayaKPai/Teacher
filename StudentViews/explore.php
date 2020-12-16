<html>
  <?php
  session_start();
    include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentActivityQueries.php";
    $userType = "Student";
    $pageCode = "S";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">
    <!-- <?php echo $_SESSION['user']; ?> -->
		<div class="container">
    <h3 style="background: var(--BodyGradient);">
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php";
      ?>
    </h3>
  </div>
  <div class="container">
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/Components/studentNavBar.php";
    ?>
  </div>
  <!-- <div class="container">


  </div> -->
  <div class="container">
    <h2><?php echo $_GET['sub']; ?></h2>
    <div>
      <a data-toggle="collapse" href="#openactivities">
        <button type="button" class="btn btn-primary sqbtn text-wrap" style="white-space: wrap;">Open<br> Activities</button>
      </a>
      <a href="#" style="margin: 3%;">
        <button type="button" class="btn btn-secondary sqbtn text-wrap"  style="white-space: wrap;">Completed Activities</button>
      </a>
      <a data-toggle="collapse" href="#readingmaterial">
        <button type="button" class="btn btn-info sqbtn text-wrap" style="white-space: wrap;">Reading Material</button>
      </a>
    </div>
  </div>
    <div class=" sqbtn collapse" id="readingmaterial" >
      <?php
        $dir = $_SERVER['DOCUMENT_ROOT']."/pdfs/";
        $folderName = "C".$_SESSION['classNumber'];
        $dir = $dir.$folderName;
        // Open a directory, and read its contents
        if (is_dir($dir)){

        if ($dh = opendir($dir)){
          while (($file = readdir($dh)) !== false){
            if (stristr($file,$_GET['sub'])) {
                echo "<a href='../../pdfs/".$folderName."/".$file."'>";
                echo $file . "</a><br>";
            }
          }
          closedir($dh);
        }
        }

      ?>


    </div>
    <div class="container collapse" id="openactivities">
      <script>
        function emptyResponseAlert() {
          alert ("Triggered");
        }
      </script>
      <?php
        $subject = $_GET['sub'];
        include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/generateOpenActivities.php";
      ?>
    </div>
  </body>
</html>
