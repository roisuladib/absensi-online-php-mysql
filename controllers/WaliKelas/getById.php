<?php

include('../../configs/Database.php');

$wali_kelas_id = mysqli_query($db, "SELECT * FROM wali_kelas WHERE id = '" . $_GET['id'] . "'");
$data         = mysqli_fetch_array($wali_kelas_id);
echo json_encode($data);
