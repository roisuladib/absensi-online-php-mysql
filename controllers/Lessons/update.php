<?php

include('../../configs/Database.php');

$id             = $_POST['id'];
$nama_pelajaran = $_POST['nama_pelajaran'];

$res = mysqli_query($db, "UPDATE pelajaran SET nama_pelajaran = '$nama_pelajaran' WHERE id = '$id'");
if (!$res) {
   printf("Error: %s\n", mysqli_error($db));
} else {
   header('location:../../admins/index.php?p=lessons&m=se');
}
