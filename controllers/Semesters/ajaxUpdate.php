<?php

include('../../configs/Database.php');

$semester_id = mysqli_query($db, "UPDATE semester SET status = '". $_GET['status']. "' WHERE id = '" . $_GET['id'] . "'");
$data        = mysqli_fetch_array($semester_id);
echo json_encode($data);
