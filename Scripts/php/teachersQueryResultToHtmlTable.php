<?php
function table( $result ) {
  if($result == false) {

    // tableHead(  $result );
    // tableBody(  $result );
    // echo '</table>';
  } else {
    $result->fetch_array( MYSQLI_ASSOC );
    // print_r($result);
    if ($result) {
        $rowcount=mysqli_num_rows($result);
        if ($rowcount > 0) {
          $cls = "'color: Green;'";
        }
        else { $cls = "'color: Red;'";}
      }
      echo "<h4 class='topbanner'>Currently $rowcount Teachers in your setup</h4>" ;
    echo "<table style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
    tableHead(  $result );
    tableBody(  $result );
    echo '</table>';
  }
}

function tableHead(  $result ) {
echo "<p>Below is New display using functions. Prefer to replace the modals with expandable sections.</p>";
        echo '<thead>';
        foreach ( $result as $teacher ) {
            echo '<tr>';
            foreach ( $teacher as $k => $y ) {
                echo '<th>' . ucfirst( $k ) . '</th>';
            }
            echo '<th>Action</th></tr>';
            break;
        }
        echo '</thead>';


}

function tableBody(  $result ) {

        echo '<tbody>';
        foreach ( $result as $teacher ) {
          $tId = $teacher['Id'];
          echo "<tr>";
          displayTeacherData($teacher);
          echo "</tr>";
        }
        echo '</tbody>';

}

function displayTeacherData($teacher) {
      $tId = $teacher['Id'];
      $togId = "t".$tId;
      $fn = $teacher['First Name'];
      $mn = $teacher['Middle Name'];
      $ln = $teacher['Last Name'];

      $pm = $teacher['Mobile'];
      $remIdDB = $teacher['First Name']."-".$teacher['Middle Name']."-".$teacher['Last Name'].$teacher['Mobile'];
      $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;
      foreach ( $teacher as $y ) {
          echo "<td><a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a></td>";
      }
      echo "<td>
        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
      </td></tr>";
      echo "<tr  class='panel panel-default'>
          <td colspan=9>
            <div>
                <div class='panel-heading'>
                    <div id='".$togId."' class='panel-collapse collapse'>
                  <div class='panel-body'>
                    ".$fn." ".$mn." ".$ln." Modal data goes here
                  </div>
                </div>
              </div>
          </td></tr>";
}

 ?>
