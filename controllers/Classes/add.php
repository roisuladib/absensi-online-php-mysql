<?php

include('../../configs/Database.php');

$nama_kelas = $_POST['nama_kelas'];
$ruang      = $_POST['ruang'];

$classes = mysqli_query($db, "SELECT * FROM kelas WHERE nama_kelas = '". $nama_kelas ."' AND ruang = '". $ruang ."'");
$class  = mysqli_num_rows($classes);
if ($class == 1 || $class === '1') {
   header('location:../../admins/index.php?p=classes&m=dd');
} else {
   $res = mysqli_query($db, "INSERT INTO kelas (nama_kelas, ruang) VALUES ('$nama_kelas', '$ruang')");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=classes&m=sa');
   }
}

