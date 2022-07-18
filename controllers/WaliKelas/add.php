<?php

include('../../configs/Database.php');

$kelas_id = $_POST['kelas_id'];
$guru_id   = $_POST['guru_id'];

$res = mysqli_query($db, "INSERT INTO wali_kelas (kelas_id, guru_id) VALUES ('$kelas_id', '$guru_id')");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=wali-kelas&m=sa');
}
