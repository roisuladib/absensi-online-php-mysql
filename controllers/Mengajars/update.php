<?php

include('../../configs/Database.php');

$id           = $_POST['id'];
$guru_id      = $_POST['guru_id'];
$kelas_id     = $_POST['kelas_id'];
$pelajaran_id = $_POST['pelajaran_id'];
$c_semester   = mysqli_query($db, "SElECT * FROM semester WHERE status = 1");
$r_semester   = mysqli_fetch_array($c_semester);
$semester_id  = $r_semester['id'];
$c_ajaran     = mysqli_query($db, "SElECT * FROM ajaran WHERE status = 1");
$r_ajaran     = mysqli_fetch_array($c_ajaran);
$ajaran_id    = $r_ajaran['id'];
$hari         = $_POST['hari'];
$jam_mulai    = $_POST['jam_mulai'];
$jam_selesai  = $_POST['jam_selesai'];
$jam_ke       = $_POST['jam_ke'];

$res = mysqli_query($db, "UPDATE mengajar SET 
   guru_id      = '$guru_id', 
   kelas_id     = '$kelas_id',
   pelajaran_id = '$pelajaran_id',
   semester_id  = '$semester_id', 
   ajaran_id    = '$ajaran_id',        
   hari         = '$hari',        
   jam_mulai    = '$jam_mulai',
   jam_selesai  = '$jam_selesai', 
   jam_ke       = '$jam_ke'
   WHERE id     = '$id'
");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=mengajars&m=se');
}
