<?php

include('../../configs/Database.php');

$id       = $_POST['id'];
$semester =  $_POST['semester'];
$status   = $_POST['status'];

$res = mysqli_query($db, "UPDATE semester SET semester = '$semester', status = '$status' WHERE id = '$id'");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=semesters&m=se');
}
