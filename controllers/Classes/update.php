<?php

include('../../configs/Database.php');

$id         = $_POST['id'];
$nama_kelas = $_POST['nama_kelas'];
$ruang      = $_POST['ruang'];

$res = mysqli_query($db, "UPDATE kelas SET nama_kelas = '$nama_kelas', ruang = '$ruang' WHERE id = '$id'");

if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=classes&m=se');
}
