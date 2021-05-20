<div class='container-flex' style='text-align: left;'>
  <?php
  // used in Components\PageComponents\ClassSectionParts.php -> Components\PageComponents\studentsDisplayContainer.php
    studentSummaryDetailsThisClass($mysqli,$cl,$sc);
    function studentsDisplay($mysqli,$query){
      // print_r($query->fetch_assoc());

            while ($row=$query->fetch_assoc()){
              // echo "<div class='cards white'>
              //   <h5>Name: ".$row['St FN']." ".$row['St MN']." ".$row['St LN']."</h5>
              //   <p>Roll No:".$row['ST RN']."</p>
              //   <p>Class-Section: ".$row['ST CId']."-".$row['ST SecId']."</p>";
              // echo "</div>";
              include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/singleStudentComponent.php";
            }
    }

  ?>
</div>
