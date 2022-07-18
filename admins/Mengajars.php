<div class="row">
  <div class="col-12 col-md-12">
    <div class="card mb-4 px-3">
      <div class="card-header px-0 pb-0">
        <?php if (isset($_GET['m'])) { ?>
          <?php if ($_GET['m'] == 'sa') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menambah Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ea') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menambah Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'dd') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text"><strong>Jadwal Mengajar!</strong> Sudah Ada</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'se') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Mengubah Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ee') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Mengubah Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'sd') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menghapus Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ed') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menghapus Jadwal Mengajar</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        <?php } ?>
        <h4>Jadwal Mengajar</h4>
        <button type="button" class="btn bg-gradient-warning btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#add">
          Tambah
        </button>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 table-borderless table-hover" id="dataTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">#</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kode</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Guru</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kelas</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mata Pelajaran</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Hari</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jam Mulai</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jam Selesai</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jam Ke</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Semester</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jadwal Mengajar</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no              = 0;
              $mengajars       = mysqli_query($db, 'SELECT * FROM mengajar');
              while ($mengajar = mysqli_fetch_array($mengajars)) {
                $teachers      = mysqli_query($db, 'SELECT * FROM guru WHERE id = "' . $mengajar['guru_id'] . '"');
                $teacher       = mysqli_fetch_array($teachers);
                $classes       = mysqli_query($db, 'SELECT * FROM kelas WHERE id = "' . $mengajar['kelas_id'] . '"');
                $class         = mysqli_fetch_array($classes);
                $lessons       = mysqli_query($db, 'SELECT * FROM pelajaran WHERE id = "' . $mengajar['pelajaran_id'] . '"');
                $lesson        = mysqli_fetch_array($lessons);
                $semesters     = mysqli_query($db, 'SELECT * FROM semester WHERE id = "' . $mengajar['semester_id'] . '"');
                $semester      = mysqli_fetch_array($semesters);
                $ajarans       = mysqli_query($db, 'SELECT * FROM ajaran WHERE id = "' . $mengajar['ajaran_id'] . '"');
                $ajaran        = mysqli_fetch_array($ajarans);
                $kode          = $mengajar['kode'];
                $guru          = $teacher['nama'];
                $kelas         = $class['ruang'];
                $pelajaran     = $lesson['nama_pelajaran'];
                $ajar          = $ajaran['ajaran'];
                $sem           = $semester['semester'];
                $hari          = $mengajar['hari'];
                $jam_mulai     = $mengajar['jam_mulai'];
                $jam_selesai   = $mengajar['jam_selesai'];
                $jam_ke        = $mengajar['jam_ke'];
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
                  <td class="align-middle w-20">
                    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                      <a href="#" data-bs-target="#edit" data-id="<?= $mengajar['id'] ?>" id="editMengajar" data-bs-toggle="modal" title="Hapus <?= $pelajaran; ?> ?" class="icon icon-shape btn bg-gradient-info p-2 icon-sm border-radius-lg text-center m-0 me-1 d-flex align-items-center justify-content-center cursor-pointer">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64px" height="64px">
                          <path d="M22 51c-1-1-4-1-4-1l-.425-1.274c-.362-1.086-1.215-1.939-2.301-2.301L14 46c0 0 .5-2.5-1-4l25-25 8 10L22 51zM52 21l-9-9 4.68-4.68c0 0 3.5-1.5 7 2s2 7 2 7L52 21zM9 50l-1.843 4.476c-.614 1.49.877 2.981 2.367 2.367L14 55 9 50z" />
                        </svg>
                      </a>
                      <a href="../controllers/Mengajars/destroy.php?id=<?= $mengajar['id']; ?>" onClick="return confirm('Apakah kode <?= $kode; ?>, Yakin Hapus ?')" title="Hapus <?= $pelajaran; ?> ?" class="icon icon-shape btn bg-gradient-danger p-2 icon-sm border-radius-lg text-center m-0 ms-1 d-flex align-items-center justify-content-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path d="M296 64h-80a7.91 7.91 0 00-8 8v24h96V72a7.91 7.91 0 00-8-8z" fill="none" />
                          <path fill="#fff" d="M432 96h-96V72a40 40 0 00-40-40h-80a40 40 0 00-40 40v24H80a16 16 0 000 32h17l19 304.92c1.42 26.85 22 47.08 48 47.08h184c26.13 0 46.3-19.78 48-47l19-305h17a16 16 0 000-32zM192.57 416H192a16 16 0 01-16-15.43l-8-224a16 16 0 1132-1.14l8 224A16 16 0 01192.57 416zM272 400a16 16 0 01-32 0V176a16 16 0 0132 0zm32-304h-96V72a7.91 7.91 0 018-8h80a7.91 7.91 0 018 8zm32 304.57A16 16 0 01320 416h-.58A16 16 0 01304 399.43l8-224a16 16 0 1132 1.14z" />
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 px-3 pt-3 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Tambah Jadwal Mengajar</h3>
          </div>
          <div class="card-body p-3">
            <form role="form text-left" action="../controllers/Mengajars/add.php" method="POST">
              <label class="m-0 mb-2">Guru</label>
              <div class="input-group mb-2">
                <select class="form-control" name="guru_id">
                  <option selected disabled>~ Pilih Guru ~</option>
                  <?php
                  $teachers = mysqli_query($db, "SELECT * FROM guru");
                  while ($teacher = mysqli_fetch_array($teachers)) {
                    echo "
                        <option value='$teacher[id]'>$teacher[nama]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Kelas</label>
              <div class="input-group mb-2">
                <select class="form-control" name="kelas_id">
                  <option selected disabled>~ Pilih Kelas ~</option>
                  <?php
                  $classes     = mysqli_query($db, "SELECT * FROM kelas");
                  while ($class = mysqli_fetch_array($classes)) {
                    echo "
                        <option value='$class[id]'>$class[ruang]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Mata Pelajaran</label>
              <div class="input-group mb-2">
                <select class="form-control" name="pelajaran_id">
                  <option selected disabled>~ Pilih Mata Pelajaran ~</option>
                  <?php
                  $datas      = mysqli_query($db, "SELECT * FROM pelajaran");
                  while ($data = mysqli_fetch_array($datas)) {
                    echo "
                        <option value='$data[id]'>$data[nama_pelajaran]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Hari <span class="text-danger">*</span></label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="senin" value="1" checked />
                    <label class="custom-control-label" for="senin">Senin</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="selasa" value="2" />
                    <label class="custom-control-label" for="selasa">Selasa</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="rabu" value="3" />
                    <label class="custom-control-label" for="rabu">Rabu</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="kamis" value="4" />
                    <label class="custom-control-label" for="kamis">Kamis</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="jumat" value="5" />
                    <label class="custom-control-label" for="jumat">Jum'at</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="sabtu" value="6" />
                    <label class="custom-control-label" for="sabtu">Sabtu</label>
                  </div>
                </div>
              </div>
              <label class="m-0 mb-2">Jam Mulai</label>
              <div class="input-group mb-2">
                <input type="time" class="form-control" name="jam_mulai">
              </div>
              <label class="m-0 mb-2">Jam Selesai</label>
              <div class="input-group mb-2">
                <input type="time" class="form-control" name="jam_selesai">
              </div>
              <label class="m-0 mb-2">Jam Ke</label>
              <div class="input-group mb-2">
                <input type="text" placeholder="1-2" class="form-control" name="jam_ke">
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 px-3 pt-3 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Edit Jadwal Mengajar</h3>
          </div>
          <div class="card-body p-3">
            <form role="form text-left" action="../controllers/Mengajars/update.php" method="POST">
              <input type="hidden" name="id" id="editMengajarId">
              <label class="m-0 mb-2">Guru</label>
              <div class="input-group mb-2">
                <select class="form-control" name="guru_id" id="editMengajarGuru">
                  <option selected disabled>~ Pilih Guru ~</option>
                  <?php
                  $teachers = mysqli_query($db, "SELECT * FROM guru");
                  while ($teacher = mysqli_fetch_array($teachers)) {
                    echo "
                        <option value='$teacher[id]'>$teacher[nama]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Kelas</label>
              <div class="input-group mb-2">
                <select class="form-control" name="kelas_id" id="editMengajarKelas">
                  <option selected disabled>~ Pilih Kelas ~</option>
                  <?php
                  $classes     = mysqli_query($db, "SELECT * FROM kelas");
                  while ($class = mysqli_fetch_array($classes)) {
                    echo "
                        <option value='$class[id]'>$class[ruang]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Mata Pelajaran</label>
              <div class="input-group mb-2">
                <select class="form-control" name="pelajaran_id" id="editMengajarMakul">
                  <option selected disabled>~ Pilih Mata Pelajaran ~</option>
                  <?php
                  $datas      = mysqli_query($db, "SELECT * FROM pelajaran");
                  while ($data = mysqli_fetch_array($datas)) {
                    echo "
                        <option value='$data[id]'>$data[nama_pelajaran]</option>
                      ";
                  }
                  ?>
                </select>
              </div>
              <label class="m-0 mb-2">Hari <span class="text-danger">*</span></label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariSenin" value="1" />
                    <label class="custom-control-label" for="editMengajarHariSenin">Senin</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariSelasa" value="2" />
                    <label class="custom-control-label" for="editMengajarHariSelasa">Selasa</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariRabu" value="3" />
                    <label class="custom-control-label" for="editMengajarHariRabu">Rabu</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariKamis" value="4" />
                    <label class="custom-control-label" for="editMengajarHariKamis">Kamis</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariJumat" value="5" />
                    <label class="custom-control-label" for="editMengajarHariJumat">Jum'at</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="hari" id="editMengajarHariSabtu" value="6" />
                    <label class="custom-control-label" for="editMengajarHariSabtu">Sabtu</label>
                  </div>
                </div>
              </div>
              <label class="m-0 mb-2">Jam Mulai</label>
              <div class="input-group mb-2">
                <input type="time" class="form-control" name="jam_mulai" id="editMengajarJamMulai" />
              </div>
              <label class="m-0 mb-2">Jam Selesai</label>
              <div class="input-group mb-2">
                <input type="time" class="form-control" name="jam_selesai" id="editMengajarJamSelesai" />
              </div>
              <label class="m-0 mb-2">Jam Ke</label>
              <div class="input-group mb-2">
                <input type="text" placeholder="1-2" class="form-control" name="jam_ke" id="editMengajarJamKe" />
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