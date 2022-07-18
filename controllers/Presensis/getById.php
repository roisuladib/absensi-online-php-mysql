<?php

include('../../configs/Database.php');

$mengajar_id = mysqli_query($db, "SELECT * FROM mengajar WHERE id = '" . $_GET['id'] . "'");
$data        = mysqli_fetch_array($mengajar_id);
echo json_encode($data);
