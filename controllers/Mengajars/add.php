<?php

include('../../configs/Database.php');

$create_kode = mysqli_query($db, 'SElECT MAX(kode) AS kode FROM mengajar');
$res_kode    = mysqli_fetch_array($create_kode);
$get_kode    = $res_kode['kode'];
$inc         = (int) substr($get_kode, 4);
$inc++;

$kode         = 'MPJ-' . sprintf("%02s", $inc);
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

$res = mysqli_query($db, "INSERT INTO mengajar (
   guru_id, 
   kelas_id, 
   pelajaran_id,
   semester_id, 
   ajaran_id,
   kode,        
   hari,        
   jam_mulai,
   jam_selesai, 
   jam_ke     
) VALUES (
   '$guru_id', 
   '$kelas_id',
   '$pelajaran_id',
   '$semester_id', 
   '$ajaran_id',
   '$kode',        
   '$hari',        
   '$jam_mulai',
   '$jam_selesai', 
   '$jam_ke'  
)");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=mengajars&m=sa');
}
