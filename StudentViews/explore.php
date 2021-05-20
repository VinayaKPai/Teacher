<html>
  <?php
  session_start();
    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
    $userType = "Student";
    $pageCode = "S";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">
    <!-- <?php echo $_SESSION['user']; ?> -->
		<div class="container">
    <h3 style="background: var(--BodyGradient);">
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php";
      ?>
    </h3>
  </div>
  <div class="container">
    <a href="../../StudentViews/indexS.php">
      <button type="button" class="btn btn-outline-primary">HOME</button>
    </a>
    <?php
    $buttonClass = "btn btn-primary";

    include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/studentNavBar.php";
    ?>
    <a href="../../StudentViews/explore.php?sub=My Old Stuff">
      <button type="button" class="btn btn-info">My Old Stuff</button>
    </a>
  </div>
  <!-- <div class="container">


  </div> -->
  <div class="container">
    <h2><?php echo $_GET['sub']; ?></h2>
    <div>
      <a data-toggle="collapse" href="#openactivities">
        <button type="button" class="btn btn-success sqbtn text-wrap" style="white-space: wrap;">Open<br> Activities</button>
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
      <?php
        $subject = $_GET['sub'];
        include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/generateOpenActivities.php";
      ?>
    </div>
  </body>
</html>
