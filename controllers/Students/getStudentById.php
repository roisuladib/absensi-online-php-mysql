<?php

include('../../configs/Database.php');

$studentId = mysqli_query($db, "SELECT * FROM siswa WHERE id = '" . $_GET['id'] . "'");
$student    = mysqli_fetch_array($studentId);
echo json_encode($student);
