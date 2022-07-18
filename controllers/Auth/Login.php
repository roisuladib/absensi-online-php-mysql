<?php

include('../../configs/Database.php');

session_start();

$nin      = $_POST['nin'];
$password = md5($_POST['password']);
$role     = $_POST['role'];


if ($role == 0) {
   $teachers      = mysqli_query($db, "SELECT * FROM guru WHERE nign = '$nin' AND password = '$password' ");
   $check_teacher = mysqli_num_rows($teachers);
   $teacher       = mysqli_fetch_array($teachers);
   
   if ($check_teacher == 0) {
      header('location:../../index.php?err=1');
   } else {
      echo 'NotOk';
      $_SESSION['id'] = $teacher['id'];
      $_SESSION['nign'] = $teacher['nign'];
      $_SESSION['nama'] = $teacher['nama'];
      $_SESSION['email'] = $teacher['email'];
      $_SESSION['telephone'] = $teacher['telephone'];
      $_SESSION['alamat'] = $teacher['alamat'];
      header('location:../../teachers/index.php');
   }
} else if ($role == 1) {
   $students      = mysqli_query($db, "SELECT * FROM siswa WHERE nisn = '$nin' AND password = '$password' ");
   $check_student = mysqli_num_rows($students);
   $student       = mysqli_fetch_array($students);
   $classes       = mysqli_query($db, "SELECT * FROM kelas WHERE id = '". $student['kelas_id'] ."'");
   $class         = mysqli_fetch_array($classes);

   if ($check_student == 0) {
      header('location:../../index.php?err=1');
   } else {
      $_SESSION['id']   = $student['id'];
      $_SESSION['nisn'] = $student['nisn'];
      $_SESSION['kelas'] = $class['ruang'];
      $_SESSION['nama'] = $student['nama'];
      $_SESSION['email'] = $student['email'];
      $_SESSION['telephone'] = $student['telephone'];
      $_SESSION['alamat'] = $student['alamat'];
      header('location:../../students/index.php');
   }
} else {
   $admins      = mysqli_query($db, "SELECT * FROM admin WHERE nikn = '$nin' AND password = '$password' ");
   $check_admin = mysqli_num_rows($admins);
   $admin       = mysqli_fetch_array($admins);
   if ($check_admin == 0) {
      header('location:../../index.php?err=1');
   } else {
      $_SESSION['id'] = $admin['id'];
      $_SESSION['nikn'] = $admin['nikn'];
      $_SESSION['nama'] = $admin['nama'];
      $_SESSION['email'] = $admin['email'];
      $_SESSION['telephone'] = $admin['telephone'];
      $_SESSION['alamat'] = $admin['alamat'];
      header('location:../../admins/index.php');
   }
}
