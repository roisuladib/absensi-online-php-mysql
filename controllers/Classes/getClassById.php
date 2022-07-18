<?php

include('../../configs/Database.php');

$classId = mysqli_query($db, "SELECT * FROM kelas WHERE id = '" . $_GET['id'] . "'");
$data    = mysqli_fetch_array($classId);
echo json_encode($data);
