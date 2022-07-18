<?php

include('../../configs/Database.php');

$semester = $_POST['semester'];
$status   = $_POST['status'];

$semesters = mysqli_query($db, "SELECT * FROM semester WHERE semester = '". $semester ."'");
$check  = mysqli_num_rows($semesters);
if ($check == 1) {
   header('location:../../admins/index.php?p=semesters&m=dd');
} else {
   $res = mysqli_query($db, "INSERT INTO semester (semester, status) VALUES ('$semester', '$status')");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=semesters&m=sa');
   }
}

