<?php

include('../../configs/Database.php');

$id = $_GET['id'];

$foto_ambil   = mysqli_query($db, "SELECT foto FROM guru WHERE id = '$id'");
$foto_fetch   = mysqli_fetch_array($foto_ambil);
$foto_nama    = $foto_fetch['foto']; 

if (!empty($foto_nama)) {
   unlink('../../public/uploads/' . $foto_nama);
}
$destroy    = mysqli_query($db, "DELETE FROM guru WHERE id = '$id'");

if (!$destroy) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=teachers&m=sd');
}
