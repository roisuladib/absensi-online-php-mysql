<?php

include('../../configs/Database.php');

$id             = $_POST['id'];
$kelas_id       = $_POST['kelas_id'];
$q_nisn         = mysqli_query($db, "SELECT nisn FROM siswa WHERE id = $id");
$nisn           = mysqli_fetch_array($q_nisn);
$nisn           = $nisn['nisn'];
$nama          = $_POST['nama'];
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
$foto_nama      = $_FILES['foto']['name'];
$foto_lama      = $_POST['foto_lama'];
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
      } else {
         unlink('../../public/uploads/' . $foto_lama);
         if (is_uploaded_file($foto_temp)) {
            move_uploaded_file($foto_temp, '../../public/uploads/' . $foto_upload);
         }
         $res = mysqli_query($db, "UPDATE siswa SET
            kelas_id       = '$kelas_id', 
            nama           = '$nama', 
            email          = '$email', 
            telephone      = '$telephone',
            jenis_kelamin  = '$jenis_kelamin', 
            tempat_lahir   = '$tempat_lahir', 
            tanggal_lahir  = '$tanggal_lahir', 
            agama          = '$agama',
            nama_ayah      = '$nama_ayah',
            nama_ibu       = '$nama_ibu', 
            pekerjaan_ayah = '$pekerjaan_ayah', 
            pekerjaan_ibu  = '$pekerjaan_ibu', 
            alamat         = '$alamat',
            status         = '$status',
            foto           = '$foto_upload'
            WHERE id       = $id
         ");
         if (!$res) {
            printf("Error: %s\n", mysqli_error($db));
         } else {
            header('location:../../admins/index.php?p=students&m=se');
         }
      }
   }
} else {
   $res = mysqli_query($db, "UPDATE siswa SET
      kelas_id       = '$kelas_id', 
      nama           = '$nama', 
      email          = '$email', 
      telephone      = '$telephone',
      jenis_kelamin  = '$jenis_kelamin', 
      agama          = '$agama',
      tempat_lahir   = '$tempat_lahir', 
      tanggal_lahir  = '$tanggal_lahir', 
      nama_ayah      = '$nama_ayah',
      nama_ibu       = '$nama_ibu', 
      pekerjaan_ayah = '$pekerjaan_ayah', 
      pekerjaan_ibu  = '$pekerjaan_ibu', 
      alamat         = '$alamat',
      status         = '$status'
      WHERE id       = $id
   ");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=students&m=se');
   }
}
