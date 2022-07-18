<?php

include('../../configs/Database.php');

$create_nign = mysqli_query($db, 'SElECT MAX(nign) AS fill_nign FROM guru');
$data        = mysqli_fetch_array($create_nign);
$fill_nign   = $data['fill_nign'];
$inc         = (int) substr($fill_nign, 3);
$inc++;
$date        = substr(date('Y'), 2);
$code        = 1;
$nign        = $date . $code . sprintf('%04s', $inc);

$nama           = $_POST['nama'];
$email          = $_POST['email'];
$telephone      = $_POST['telephone'];
$password       = md5($nign);
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tempat_lahir   = $_POST['tempat_lahir'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$agama          = $_POST['agama'];
$pendidikan     = $_POST['pendidikan'];
$jurusan        = $_POST['jurusan'];
$alamat         = $_POST['alamat'];
$status         = $_POST['status'];
$jabatan        = $_POST['jabatan'];
$angkatan       = date('Y-m-d h:i:s');
$foto_nama      = $_FILES['foto']['name'];
$foto_size      = $_FILES['foto']['size'];
$foto_temp      = $_FILES['foto']['tmp_name'];
$foto_ext       = pathinfo($foto_nama, PATHINFO_EXTENSION);
$foto_upload    = $nign . '.' . $foto_ext;
$foto_req_ext   = ['jpg', 'jpeg', 'png'];
$foto_req_size  = 2097152;

if (!empty($foto_nama)) {
   if ($foto_size > $foto_req_size) {
      header('location:../../admins/index.php?p=teachers&m=s');
   } else {
      if (in_array($foto_ext, $foto_req_ext) === false) {
         header('location:../../admins/index.php?p=teachers&m=e');
      } else if (is_uploaded_file($foto_temp)) {
         move_uploaded_file($foto_temp, '../../public/uploads/' . $foto_upload);
         $res = mysqli_query($db, "INSERT INTO guru (
            nign, 
            nama, 
            email, 
            telephone, 
            password, 
            jenis_kelamin, 
            tempat_lahir, 
            tanggal_lahir, 
            agama, 
            pendidikan, 
            jurusan, 
            alamat, 
            status, 
            jabatan, 
            angkatan, 
            status, 
            foto
         ) VALUES (
            '$nign', 
            '$nama', 
            '$email', 
            '$telephone', 
            '$password', 
            '$jenis_kelamin', 
            '$tempat_lahir', 
            '$tanggal_lahir', 
            '$agama', 
            '$pendidikan', 
            '$jurusan', 
            '$alamat', 
            '$status', 
            '$jabatan', 
            '$angkatan', 
            '$foto_upload'
         )");
         if (!$res) {
            printf("Error: %s\n", mysqli_error($db));
         } else {
            header('location:../../admins/index.php?p=teachers&m=sa');
         }
      }
   }
} else {
   $res = mysqli_query($db, "INSERT INTO guru (
      nign, 
      nama, 
      email, 
      telephone, 
      password, 
      jenis_kelamin, 
      tempat_lahir, 
      tanggal_lahir, 
      agama, 
      pendidikan, 
      jurusan, 
      alamat, 
      status,
      jabatan, 
      angkatan
   ) VALUES (
      '$nign', 
      '$nama', 
      '$email', 
      '$telephone', 
      '$password', 
      '$jenis_kelamin', 
      '$tempat_lahir', 
      '$tanggal_lahir', 
      '$agama', 
      '$pendidikan', 
      '$jurusan', 
      '$alamat', 
      '$status',
      '$jabatan', 
      '$angkatan'
   )");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=teachers&m=sa');
   }
}
