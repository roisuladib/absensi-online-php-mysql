<?php

include '../configs/Database.php';

$id        = $_GET['id'];
$ajaran    = $_GET['ajaran'];
$mengajars = mysqli_query($db, "SELECT * FROM mengajar WHERE ajaran_id = '" . $id . "'");

function hari_ini()
{
   $hari = date("D");

   switch ($hari) {
      case 'Sun':
         $hari_ini = "Minggu";
         break;

      case 'Mon':
         $hari_ini = "Senin";
         break;

      case 'Tue':
         $hari_ini = "Selasa";
         break;

      case 'Wed':
         $hari_ini = "Rabu";
         break;

      case 'Thu':
         $hari_ini = "Kamis";
         break;

      case 'Fri':
         $hari_ini = "Jum'at";
         break;

      case 'Sat':
         $hari_ini = "Sabtu";
         break;

      default:
         $hari_ini = "Tidak di ketahui";
         break;
   }

   return "<b>" . $hari_ini . "</b>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
   <title>Laporan Tahun Ajaran <?= $ajaran; ?></title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <script src="../assets/js/plugins/awesome.min.js" crossorigin="anonymous"></script>
   <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.3" rel="stylesheet" />
   <style>
      /* Screen Only */
      @media screen {
         .noprint {
            display: block !important;
         }

         .noshow {
            display: none !important;
         }
      }

      /* Print Only */
      @media print {
         .noprint {
            display: none !important;
         }

         .noshow {
            display: block !important;
         }
      }

      body,
      td,
      th {
         font-size: 14px;
      }
   </style>
</head>

<body>
   <div align="center">
      <span class="noprint">
         <br />
         <a href="javascript:window.print();" class="btn bg-gradient-primary">
            <i class="fa fa-print"></i>
            Cetak
         </a>
         <a href="javascript:window.close();" class="btn bg-gradient-danger">
            <i class="fa fa-power-off"></i>
            Close
         </a>
         <br />
      </span>
      <cfoutput>
         <div class="table-responsive p-0 p-0">
            <table class="table align-items-center mb-0 table-borderless">
               <tbody>
                  <tr>
                     <td><img src="../assets/img/tut-wuri-handayani-7759.png" align="left" style="max-width: 110px;" hspace="50"></td>
                     <td>
                        <h3 class="mb-4">SDN 06 Tegalsari Pemalang</h3>
                        <h5><?= "LAPORAN JADWAL MENGAJAR"?></h5>   
                        <h6><?= 'Tahun Ajaran ' . $ajaran; ?></h6>   
                        <p class="text-xs"><?= hari_ini() . ', ' . date('d-m-Y') . ' ⏰ '; ?><i id="clock"></i></p>
                        <script>
                           document.querySelector('#clock').textContent = `${String(new Date().getHours())} : ${String(new Date().getMinutes())}`;
                        </script>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <hr class="border mb-5"  />
         <div class="table-responsive p-0 p-0">
            <table class="table align-items-center mb-0 table-borderless table-hover">
               <thead>
                  <tr>
                  <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">#</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Kode</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Guru</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Kelas</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Mata Pelajaran</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Hari</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Jam Mulai</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Jam Selesai</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Jam Ke</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Semester</th>
                   <th class="text-uppercase text-gray-500 text-xs font-weight-bolder ps-2">Tahun Ajaran</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 0;
                  while ($mengajar = mysqli_fetch_array($mengajars)) {
                     $teachers     = mysqli_query($db, 'SELECT * FROM guru WHERE id = "' . $mengajar['guru_id'] . '"');
                     $teacher      = mysqli_fetch_array($teachers);
                     $classes      = mysqli_query($db, 'SELECT * FROM kelas WHERE id = "' . $mengajar['kelas_id'] . '"');
                     $class        = mysqli_fetch_array($classes);
                     $lessons      = mysqli_query($db, 'SELECT * FROM pelajaran WHERE id = "' . $mengajar['pelajaran_id'] . '"');
                     $lesson       = mysqli_fetch_array($lessons);
                     $semesters    = mysqli_query($db, 'SELECT * FROM semester WHERE id = "' . $mengajar['semester_id'] . '"');
                     $semester     = mysqli_fetch_array($semesters);
                     $ajarans      = mysqli_query($db, 'SELECT * FROM ajaran WHERE id = "' . $mengajar['ajaran_id'] . '"');
                     $ajaran       = mysqli_fetch_array($ajarans);
                     $kode         = $mengajar['kode'];
                     $guru         = $teacher['nama'];
                     $kelas        = $class['ruang'];
                     $pelajaran    = $lesson['nama_pelajaran'];
                     $ajar         = $ajaran['ajaran'];
                     $sem          = $semester['semester'];
                     $hari         = $mengajar['hari'];
                     $jam_mulai    = $mengajar['jam_mulai'];
                     $jam_selesai  = $mengajar['jam_selesai'];
                     $jam_ke       = $mengajar['jam_ke'];
                     $no++;
                  ?>
                     <tr>
                     <td class="text-center w-2 text-gray-900 text-xs font-weight-bolder">
                       <?= $no; ?>.
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $kode ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $guru ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $kelas ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $pelajaran ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?php
                       switch ($hari) {
                         case $hari == 1:
                           echo 'Senin';
                           break;
                         case $hari == 2:
                           echo 'Selasa';
                           break;
                         case $hari == 3:
                           echo 'Rabu';
                           break;
                         case $hari == 4:
                           echo 'Kamis';
                           break;
                         case $hari == 5:
                           echo 'Jum\'at';
                           break;
                         case $hari == 6:
                           echo 'Sabtu';
                           break;
   
                         default:
                           'Hari';
                           break;
                       }
                       ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= substr($jam_mulai, 0, 5) ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= substr($jam_selesai, 0, 5) ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $jam_ke ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $sem ?>
                     </td>
                     <td class="text-gray-900 text-sm font-weight-bolder">
                       <?= $ajar ?>
                     </td>
                   </tr>
               <?php } ?>
               </tbody>
            </table>
         </div>
         <div class="table-responsive p-0 mt-5">
            <table class="table align-items-center mb-0 table-borderless">
               <tbody>
                  <tr>
                     <td class="text-gray-900 text-sm w-50 text-center">
                        <br /><br />
                        Mengetahui,
                        <br />
                        Kepala Sekolah
                        <br /><br /><br /><br /><br />
                        (Indah Lia Kumala, Sp.d)
                        <br />
                        NIGN: 302349428673
                     </td>
                     <td class="text-gray-900 text-sm w-50 text-center">
                        Semarang, <?= date("d / m / Y"); ?>
                        <br /><br />
                        <br />
                        Wakil Kepala Sekolah
                        <br /><br /><br /><br /><br />
                        (Kang Koding, S.Kom)
                        <br />
                        NIGN: 302349428673
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </cfoutput>
   </div>
   <script>
      window.print();
      window.onfocus = () => window.close();
   </script>
</body>

</html>