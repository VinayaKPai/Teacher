<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../stylesheet.css">
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
      include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
      $pageHeading = "Test Page";
    ?>
  </head>
  <body class="body">
    <?php echo $datetime; ?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/Components/top.php"; ?>
    <h4 class="topbanner">First TEST query = Assignments, ongoing, success 1</h4>
    <div class="container">
      <?php
        $a = "A";
        $b = " < CURDATE()";
        $c = " > CURDATE()";
        $d = "1";
        activity($a,$b,$c,$d,$mysqli);
      ?>
    </div>
    <h4 class="topbanner">Second TEST query = Tests, no dates, success 0</h4>
    <div class="container">
    <?php
      $a = "T";
      $b = "";
      $c = "";
      $d = "0";
      activity($a,$b,$c,$d,$mysqli);
    ?>
  </div>
  </body>
</html>
