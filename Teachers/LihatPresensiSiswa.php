<?php

include('../configs/Database.php');

$presensi_id = mysqli_query($db, "SELECT * FROM presensi WHERE mengajar_id = '" . $_GET['id'] . "'");
$data        = mysqli_fetch_array($presensi_id);
echo json_encode($data);
