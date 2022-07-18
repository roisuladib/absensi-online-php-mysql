<?php

include('../../configs/Database.php');

$ajaran_id = mysqli_query($db, "SELECT * FROM ajaran WHERE id = '" . $_GET['id'] . "'");
$data      = mysqli_fetch_array($ajaran_id);
echo json_encode($data);
