<?php
$i = 0;

    while ($rowAssQ=$depQuestions->fetch_assoc()) {
        echo "<h6 class='h6'>Question <span class='red'>";
        echo $i + 1;
        echo "</span></h6><div>";
            displayDepDetails($rowAssQ);
            $i = $i + 1;
        echo "</div>";
    }
?>
