<?php

include('../../configs/Database.php');

$semester_id = mysqli_query($db, "SELECT * FROM semester WHERE id = '" . $_GET['id'] . "'");
$data        = mysqli_fetch_array($semester_id);
echo json_encode($data);
