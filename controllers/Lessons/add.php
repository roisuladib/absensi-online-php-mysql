<?php

include('../../configs/Database.php');

$create_kode = mysqli_query($db, 'SElECT MAX(kode) AS kode FROM pelajaran');
$res_kode    = mysqli_fetch_array($create_kode);
$get_kode    = $res_kode['kode'];
$inc         = (int) substr($get_kode, 3);
$inc++;

$kode           = 'MP-' . sprintf("%02s", $inc);
$nama_pelajaran = $_POST['nama_pelajaran'];

$check_dd = mysqli_query($db, "SELECT * FROM pelajaran WHERE nama_pelajaran = '". $nama_pelajaran ."'");
$res_dd   = mysqli_num_rows($check_dd);
if ($res_dd == 1 || $res_dd === '1') {
   header('location:../../admins/index.php?p=lessons&m=dd');
} else {
   $res = mysqli_query($db, "INSERT INTO pelajaran (kode, nama_pelajaran) VALUES ('$kode', '$nama_pelajaran')");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=lessons&m=sa');
   }
}
