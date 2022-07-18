<?php

include('../../configs/Database.php');

$ajaran   = $_POST['ajaran'];
$status   = $_POST['status'];

$ajarans = mysqli_query($db, "SELECT * FROM ajaran WHERE ajaran = '". $ajaran ."'");
$check  = mysqli_num_rows($ajarans);
if ($check == 1) {
   header('location:../../admins/index.php?p=tahun-ajaran&m=dd');
} else {
   $res = mysqli_query($db, "INSERT INTO ajaran (ajaran, status) VALUES ('$ajaran', '$status')");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=tahun-ajaran&m=sa');
   }
}
