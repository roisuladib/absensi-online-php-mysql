<?php

include('../../configs/Database.php');

$teacherId = mysqli_query($db, "SELECT * FROM guru WHERE id = '" . $_GET['id'] . "'");
$teacher   = mysqli_fetch_array($teacherId);
echo json_encode($teacher);
