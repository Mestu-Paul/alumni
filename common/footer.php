<?php
$student_name = ["student name", "student name", "student name"];
$student_id = ["student id", "student id", "student id"];
?>

<div class="container-fluid text-center py-2" style="background-color: #3c2020; color:white;">
    <div class="text-start">Developed By</div>
    <div class="row justify-content-center">
        <?php
        for ($i = 0; $i < count($student_name); $i++) {
            echo '<div class="col">
          <p>' . $student_name[$i] . '</p>
          <p>' . $student_id[$i] . '</p>
        </div>';
        }
        ?>
    </div>
</div>