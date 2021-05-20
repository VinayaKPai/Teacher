<html>
  <?php
  session_start();
    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    $pageCode = "S";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">
    <div class="container">
      <?php
      // include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/logintimebtn.php";

      ?>
      <h3 class="centered" style="background: var(--BodyGradient);">
        <?php
          include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php";
        ?>
      </h3>
    <?php
      // include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
      include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/questioResponseDisplay.php";
      echo "<div class='container-flex cards'>";
      include $_SERVER['DOCUMENT_ROOT']."/Components/starttime.php";
      echo "</div><div class='container card'";
      print_r($_SESSION);
      foreach ($_POST as $key => $val) {
        if ($key=="Submit" || $key=="Save") {
          $val = "Yes";
          echo $key . ": ".$val;
        }
        else {

            echo "Q-Id: ".$key." <br>Ans: ".$val."<br>";

        }
      }
      echo "</div>";
    ?>
  </div>
  </body>
</html>
