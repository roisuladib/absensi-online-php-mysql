<?php

include('../../configs/Database.php');

$lesson_id = mysqli_query($db, "SELECT * FROM pelajaran WHERE id = '" . $_GET['id'] . "'");
$data    = mysqli_fetch_array($lesson_id);
echo json_encode($data);
