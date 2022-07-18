<?php

include('../../configs/Database.php');

   $id = $_GET['id'];

   $res = mysqli_query($db, "DELETE FROM wali_kelas WHERE id = '$id'");
   if (!$res) {
      printf("Error: %s\n", mysqli_error($db));
   } else {
      header('location:../../admins/index.php?p=wali-kelas&m=sd');
   }