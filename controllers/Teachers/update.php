<?php

include('../../configs/Database.php');

$id             = $_POST['id'];
$q_nign         = mysqli_query($db, "SELECT nign FROM guru WHERE id = $id");
$nign           = mysqli_fetch_array($q_nign);
$nign           = $nign['nign'];
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
$foto_lama      = $_POST['foto_lama'];
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
      } else {
         unlink('../../public/uploads/' . $foto_lama);
         if (is_uploaded_file($foto_temp)) {
            move_uploaded_file($foto_temp, '../../public/uploads/' . $foto_upload);
         }
         $res = mysqli_query($db, "UPDATE guru SET
            nama          = '$nama', 
            email         = '$email', 
            telephone     = '$telephone',
            jenis_kelamin = '$jenis_kelamin', 
            tempat_lahir  = '$tempat_lahir', 
            tanggal_lahir = '$tanggal_lahir',             
            agama         = '$agama',             
            pendidikan    = '$pendidikan',             
            jurusan       = '$jurusan',             
            alamat        = '$alamat',
            status        = '$status',
            jabatan       = '$jabatan',
            foto          = '$foto_upload'
            WHERE id      = $id
         ");
         if (!$res) {
            printf("Error: %s\n", mysqli_error($db));
         } else {
            header('location:../../admins/index.php?p=teachers&m=se');
         }
      }
   }
} else {
   $res = mysqli_query($db, "UPDATE guru SET
      nama          = '$nama', 
      email         = '$email', 
      telephone     = '$telephone',
      jenis_kelamin = '$jenis_kelamin', 
      tempat_lahir  = '$tempat_lahir', 
      tanggal_lahir = '$tanggal_lahir',             
      agama         = '$agama',             
      pendidikan    = '$pendidikan',             
      jurusan       = '$jurusan',             
      alamat        = '$alamat',
      status        = '$status',
      jabatan       = '$jabatan'
      WHERE id      = $id
   ");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=teachers&m=se');
   }
}
