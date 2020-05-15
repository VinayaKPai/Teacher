<html>
  <head>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="../../stylesheet.css">
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
      include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    ?>
  </head>
  <body>
    <h4>First query = Assignments, no dates, success 1</h4>
    <?php
      $a = "A";
      $b = " < CURDATE()";
      $c = " > CURDATE()";
      $d = "1";
      activity($a,$b,$c,$d,$mysqli);
    ?>
    <h4>Second query = Tests, no dates, success 0</h4>
    <?php
      $a = "T";
      $b = "";
      $c = "";
      $d = "0";
      activity($a,$b,$c,$d,$mysqli);
    ?>
  </body>
</html>
