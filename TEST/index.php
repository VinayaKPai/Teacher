<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../stylesheet.css">
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
      include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
      $pageHeading = "Classes-Sections-Teachers";
      // $a = "A";
    ?>
  </head>
  <body class="body">
    <?php echo $datetime; ?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/Components/top.php"; ?>

    <?php
    $b = "completed";
    classes_sections_teachers($a,$b,$mysqli,$pageHeading);
    ?>
Classes-Sections-Teachers()









    <!-- <a href="../../SetUpPages/newQuestions.php">
      <h4 class="btn btn-block topbanner">Create A New Assessment
        <small style="padding: 10px; color: White;">This will take you to the question bank</small>
      </h4>
      Note: This will only create an assessment. To schedule a deployment, you'll need to come back here and deploy it.
    </a> -->
    <!-- <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "completed";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div> -->
    <!-- <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "ongoing";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div>
    <div class="container">
      <div class="panel-group" id="accordion">
        <?php
          $b = "undeployed";
          activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div>
    <div class="container">
      <div class="panel-group" id="accordion">
        <?php
        $b = "all";
        activity($a,$b,$mysqli,$pageHeading);
        ?>
      </div>
    </div> -->
  </body>
</html>
