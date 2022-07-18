<?php
function namaBulan($angka)
{
  switch ($angka) {
    case '1':
      $bulan = "Januari";
      break;
    case '2':
      $bulan = "Februari";
      break;
    case '3':
      $bulan = "Maret";
      break;
    case '4':
      $bulan = "April";
      break;
    case '5':
      $bulan = "Mei";
      break;
    case '6':
      $bulan = "Juni";
      break;
    case '7':
      $bulan = "Juli";
      break;
    case '8':
      $bulan = "Agustus";
      break;
    case '9':
      $bulan = "September";
    case '10':
      $bulan = "Oktober";
      break;
    case '11':
      $bulan = "November";
      break;
    case '12':
      $bulan = "Desember";
      break;
    default:
      $bulan = "Tidak ada bulan yang dipilih...";
      break;
  }

  return $bulan;
}

function tglIndonesia($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = namaBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}



// function untuk menampilkan nama hari ini dalam bahasa indonesia
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
function todayInt()
{
  $hari = date("D");

  switch ($hari) {
    case 'Sun':
      $hari_ini = "0";
      break;

    case 'Mon':
      $hari_ini = "1";
      break;

    case 'Tue':
      $hari_ini = "2";
      break;

    case 'Wed':
      $hari_ini = "3";
      break;

    case 'Thu':
      $hari_ini = "4";
      break;

    case 'Fri':
      $hari_ini = "5";
      break;

    case 'Sat':
      $hari_ini = "6";
      break;

    default:
      $hari_ini = "Tidak di ketahui";
      break;
  }
  return $hari_ini;
}


function namahari($tanggalnya)
{
  //fungsi mencari namahari
  //format $tgl YYYY-MM-DD
  //harviacode.com
  $tgl = substr($tanggalnya, 8, 2);
  $bln = substr($tanggalnya, 5, 2);
  $thn = substr($tanggalnya, 0, 4);
  $info = date('w', mktime(0, 0, 0, $bln, $tgl, $thn));
  switch ($info) {
    case '0':
      return "Minggu";
      break;
    case '1':
      return "Senin";
      break;
    case '2':
      return "Selasa";
      break;
    case '3':
      return "Rabu";
      break;
    case '4':
      return "Kamis";
      break;
    case '5':
      return "Jumat";
      break;
    case '6':
      return "Sabtu";
      break;
  };
}
?>

<div class="row">
  <div class="col-12">
    <div class="card card-frame mb-4">
      <div class="card-body">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 table-borderless">
            <tr class="text-primary font-weight-bolder">
              <td class="w-7 p-0">NAMA</td>
              <td class="p-0">: <?= $_SESSION['nama']; ?></td>
            </tr>
            <tr class="text-primary font-weight-bolder">
              <td class="w-7 p-0">NISN</td>
              <td class="p-0">: <?= $_SESSION['nisn']; ?></td>
            </tr>
            <tr class="text-primary font-weight-bolder">
              <td class="w-7 p-0">KELAS</td>
              <td class="p-0">: <?= $_SESSION['kelas']; ?></td>
            </tr>
            <tr class="text-primary font-weight-bolder">
              <td class="w-7 p-0">HARI</td>
              <td class="p-0">: <?= hari_ini() . ', ' . date('d / ') . namaBulan(date('m')) . date(' / Y  ⏰'); ?> <span id="time" class="text-danger"></span> </td>
            </tr>
          </table>
        </div>
        <?php if (isset($_GET['m'])) { ?>
          <?php if ($_GET['m'] == 'sa') { ?>
            <div class="alert alert-success text-white" role="alert">
              Presensi Sukses
            </div>
          <?php } elseif ($_GET['m'] == 'dd') { ?>
            <div class="alert alert-danger text-white" role="alert">
              Anda Sudah Presensi Hari ini
            </div>
          <?php } elseif ($_GET['m'] == 'se') { ?>
            <div class="alert alert-success text-white" role="alert">
              Berhasil Mengubah Tahun Ajaran
            </div>
          <?php } elseif ($_GET['m'] == 'ee') { ?>
            <div class="alert alert-danger text-white" role="alert">
              Gagal Mengubah Tahun Ajaran
            </div>
          <?php } elseif ($_GET['m'] == 'sd') { ?>
            <div class="alert alert-primary text-white" role="alert">
              Berhasil Menghapus Tahun Ajaran
            </div>
          <?php } elseif ($_GET['m'] == 'ed') { ?>
            <div class="alert alert-danger text-white" role="alert">
              Gagal Menghapus Tahun Ajaran
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php
  $siswas    = mysqli_query($db, "SELECT * FROM siswa WHERE id = '". $_SESSION['id'] ."'");
  $siswa     = mysqli_fetch_array($siswas);
  $mengajars = mysqli_query($db, "SELECT * FROM mengajar WHERE kelas_id = '" . $siswa['kelas_id'] . "' AND hari = '" . todayInt() . "'");
  while ($mengajar = mysqli_fetch_array($mengajars)) {
    $teachers      = mysqli_query($db, 'SELECT * FROM guru WHERE id = "' . $mengajar['guru_id'] . '"');
    $teacher       = mysqli_fetch_array($teachers);
    // $classes       = mysqli_query($db, 'SELECT * FROM kelas WHERE id = "' . $mengajar['kelas_id'] . '"');
    // $class         = mysqli_fetch_array($classes);
    $lessons       = mysqli_query($db, 'SELECT * FROM pelajaran WHERE id = "' . $mengajar['pelajaran_id'] . '"');
    $lesson        = mysqli_fetch_array($lessons);
    $semesters     = mysqli_query($db, 'SELECT * FROM semester WHERE id = "' . $mengajar['semester_id'] . '"');
    $semester      = mysqli_fetch_array($semesters);
    $ajarans       = mysqli_query($db, 'SELECT * FROM ajaran WHERE id = "' . $mengajar['ajaran_id'] . '"');
    $ajaran        = mysqli_fetch_array($ajarans);
  ?>
    <div class="col-12 col-sm-4">
      <div class="card bg-white move-on-hover mb-3">
        <div class="card-body p-3 border-info" style="border-left: 4px solid">
          <div class="d-flex">
            <div class="overflow-hidden rounded-pill" style="height: 100px; width: 100px;" />
            <img 
              class="bg-cover w-100 h-100 d-block" 
              src="<?= ($teacher['foto'] === null || $teacher['foto'] === '')
              ? '../public/images/img-avatar.png'
              : '../public/uploads/' . $teacher['foto'] ?>" 
              alt="<?= $teacher['nama']; ?>" 
              title="<?= $lesson['nama_pelajaran']; ?>" 
            />
          </div>
          <div class="ps-3 d-flex flex-column">
            <h4 class="text-gray-800 mb-2"><?= $lesson['nama_pelajaran']; ?></h4>
            <p class="m-0 mb-2"><?= $teacher['nama']; ?></p>
            <span class="badge badge-pill badge-md bg-gradient-danger">
              <?= substr($mengajar['jam_mulai'], 0, 5) . ' - ' . substr($mengajar['jam_selesai'], 0, 5); ?>
            </span>
            <button 
              type="button" 
              id="absenSekarang"
              data-id="<?= $mengajar['id'];?>"
              data-bs-toggle="modal" 
              data-bs-target="#absen" 
              class="btn bg-gradient-primary m-0 mt-3">
                📝 &nbsp; Presensi
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>
</div>

<div class="modal fade" id="absen" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 px-3 pt-3 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Absen</h3>
          </div>
          <div class="card-body p-3">
            <form role="form text-left" action="../controllers/Presensis/add.php" method="POST">    
              <input type="hidden" name="siswa_id" value="<?= $_SESSION['id'];?>" />          
              <input type="hidden" name="mengajar_id" id="mengajarId" />          
              <label class="m-0 mb-2">Jenis Absensi <span class="text-danger">*</span></label>
              <div class="row">
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="H" name="jenis" id="H" />
                    <label class="cursor-pointer" for="H">Hadir</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="I" name="jenis" id="I" />
                    <label class="cursor-pointer" for="I">Ijin</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="S" name="jenis" id="S" />
                    <label class="cursor-pointer" for="S">Sakit</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="A" name="jenis" id="A" />
                    <label class="cursor-pointer" for="A">Absen</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="C" name="jenis" id="C" />
                    <label class="cursor-pointer" for="C">Cuti</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="T" name="jenis" id="T" />
                    <label class="cursor-pointer" for="T">Telat</label>
                  </div>
                </div>
              </div>
              <label class="m-0 mb-2">Keterangan</label>
              <div class="input-group mb-2">
                <textarea class="form-control" name="keterangan" rows="4"></textarea>
              </div>    
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary btn-md w-100 mt-3 mb-2">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>