<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['nisn']);
unset($_SESSION['nign']);
unset($_SESSION['nikn']);
unset($_SESSION['name']);
unset($_SESSION['kelas']);
unset($_SESSION['email']);
unset($_SESSION['telephone']);
unset($_SESSION['password']);

session_unset();
session_destroy();
header('location:../../index.php?err=2');