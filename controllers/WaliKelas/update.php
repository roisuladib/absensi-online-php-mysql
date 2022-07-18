<?php

include('../../configs/Database.php');

$id       = $_POST['id'];
$kelas_id = $_POST['kelas_id'];
$guru_id   = $_POST['guru_id'];

$res = mysqli_query($db, "UPDATE wali_kelas SET kelas_id = '$kelas_id', guru_id = '$guru_id' WHERE id = '$id'");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=wali-kelas&m=se');
}
