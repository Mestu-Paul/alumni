<?php
$student_name = ["Md Abdul Alim", "Nayel Ahmed Samin", "Zarin Hossain Jhuma"];
$student_id = ["111120032", "111120041", "111120055"];
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
        <div class="col">
            <p><a href="../../user/frontend/about.php">About</a></p>
            <p><a href="../../user/frontend/contact.php">Contact With Us</a></p>
        </div>
    </div>
</div>