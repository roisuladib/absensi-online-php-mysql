<?php

include('../../configs/Database.php');

$create_nisn = mysqli_query($db, 'SElECT MAX(nisn) AS fill_nisn FROM siswa');
$data        = mysqli_fetch_array($create_nisn);
$nisn        = $data['fill_nisn'];
$inc         = (int) substr($nisn, 2, 5);
$inc++;
$date        = substr(date('Y'), 2);

$nisn           = $date . sprintf("%05s", $inc);
$kelas_id       = $_POST['kelas_id'];
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$telephone      = $_POST['telephone'];
$password       = md5($nisn);
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tempat_lahir   = $_POST['tempat_lahir'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$agama          = $_POST['agama'];
$nama_ayah      = $_POST['nama_ayah'];
$nama_ibu       = $_POST['nama_ibu'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
$pekerjaan_ibu  = $_POST['pekerjaan_ibu'];
$alamat         = $_POST['alamat'];
$status         = $_POST['status'];
$angkatan       = date('Y');
$foto_nama      = $_FILES['foto']['name'];
$foto_size      = $_FILES['foto']['size'];
$foto_temp      = $_FILES['foto']['tmp_name'];
$foto_ext       = pathinfo($foto_nama, PATHINFO_EXTENSION);
$foto_upload    = $nisn . '.' . $foto_ext;
$foto_req_ext   = ['jpg', 'jpeg', 'png'];
$foto_req_size  = 2097152;

if (!empty($foto_nama)) {
   if ($foto_size > $foto_req_size) {
      header('location:../../admins/index.php?p=students&m=s');
   } else {
      if (in_array($foto_ext, $foto_req_ext) === false) {
         header('location:../../admins/index.php?p=students&m=e');
      } else if (is_uploaded_file($foto_temp)) {
         move_uploaded_file($foto_temp, '../../public/uploads/' . $foto_upload);
         $res = mysqli_query($db, "INSERT INTO siswa (
            kelas_id, 
            nisn, 
            nama, 
            email, 
            telephone, 
            password, 
            jenis_kelamin, 
            tempat_lahir, 
            tanggal_lahir, 
            agama,
            nama_ayah, 
            nama_ibu, 
            pekerjaan_ayah, 
            pekerjaan_ibu, 
            alamat, 
            angkatan, 
            status, 
            foto
         ) VALUES (
            '$kelas_id', 
            '$nisn', 
            '$nama', 
            '$email', 
            '$telephone', 
            '$password', 
            '$jenis_kelamin', 
            '$tempat_lahir', 
            '$tanggal_lahir', 
            '$agama',
            '$nama_ayah', 
            '$nama_ibu', 
            '$pekerjaan_ayah', 
            '$pekerjaan_ibu', 
            '$alamat', 
            '$angkatan', 
            '$status', 
            '$foto_upload'
         )");
         if (!$res) {
            printf("Error: %s\n", mysqli_error($db));
         } else {
            header('location:../../admins/index.php?p=students&m=sa');
         }
      }
   }
} else {
   $res = mysqli_query($db, "INSERT INTO siswa (
      kelas_id, 
      nisn, 
      nama, 
      email, 
      telephone, 
      password, 
      jenis_kelamin, 
      tempat_lahir, 
      tanggal_lahir, 
      agama,
      nama_ayah, 
      nama_ibu, 
      pekerjaan_ayah, 
      pekerjaan_ibu, 
      alamat,
      angkatan,
      status
   ) VALUES (
      '$kelas_id', 
      '$nisn', 
      '$nama', 
      '$email', 
      '$telephone', 
      '$password', 
      '$jenis_kelamin', 
      '$tempat_lahir', 
      '$tanggal_lahir', 
      '$agama',
      '$nama_ayah', 
      '$nama_ibu', 
      '$pekerjaan_ayah', 
      '$pekerjaan_ibu', 
      '$alamat', 
      '$angkatan', 
      '$status'
   )");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=students&m=sa');
   }
}
