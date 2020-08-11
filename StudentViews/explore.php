<html>
  <?php
  session_start();
    include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentActivityQueries.php";
    $userType = "Student";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">
		<div class="container">
    <h3 class="centered" style="background: var(--BodyGradient);">
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
  <div class="container">


  </div>
  <div class="container">
    <h2><?php echo $_GET['sub']; ?></h2>
    <a href="#">
      <button type="button" class="btn btn-primary sqbtn">Open Activities</button>
    </a>
    <a href="#">
      <button type="button" class="btn btn-secondary sqbtn">Completed Activities</button>
    </a>
      <button type="button" class="btn btn-info sqbtn"><a data-toggle="collapse" href="#readingmaterial">Reading Material</a></button>
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

  </div>
  </body>
</html>
