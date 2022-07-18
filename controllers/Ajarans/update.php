<?php

include('../../configs/Database.php');

$id       = $_POST['id'];
$ajaran =  $_POST['ajaran'];
$status   = $_POST['status'];

$res = mysqli_query($db, "UPDATE ajaran SET ajaran = '$ajaran', status = '$status' WHERE id = '$id'");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=tahun-ajaran&m=se');
}
