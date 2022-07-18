<?php

include('../../configs/Database.php');

date_default_timezone_get();

$mengajar_id = $_POST['mengajar_id'];
$siswa_id    = $_POST['siswa_id'];
$waktu        = date('Y-m-d');
$jenis       = $_POST['jenis'];
$keterangan  = $_POST['keterangan'];

// $c_pertemuan = mysqli_query($db, 'SElECT MAX(pertemuan) AS pertemuan FROM presensi');
// $r_pertemuan = mysqli_fetch_array($c_pertemuan);
// $pertemuan   = $r_pertemuan['pertemuan'];
// $pertemuan++;

$check_presensi = mysqli_query($db, 'SElECT * FROM presensi WHERE siswa_id = "'. $siswa_id .'" AND mengajar_id = "'. $mengajar_id .'" AND waktu = "'. $waktu .'"');
$res_presensi   = mysqli_num_rows($check_presensi);
if ($res_presensi == 1) {
   header('location:../../Students/index.php?p=presensis&m=dd');
} else {
   $res = mysqli_query($db, "INSERT INTO presensi (mengajar_id, siswa_id, waktu, jenis, keterangan) VALUES ('$mengajar_id', '$siswa_id', '$waktu', '$jenis', '$keterangan')");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../Students/index.php?p=presensis&m=sa');
   }
}

