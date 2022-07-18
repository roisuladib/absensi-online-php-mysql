<div class="row">
  <div class="col-12 col-md-7">
    <div class="card mb-4 px-3">
      <div class="card-header px-0 pb-0">
        <?php if (isset($_GET['m'])) { ?>
          <?php if ($_GET['m'] == 'sa') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menambah Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ea') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menambah Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'dd') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text"><strong>Kelas!</strong> Sudah Ada</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'se') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Mengubah Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ee') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Mengubah Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'sd') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menghapus Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ed') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menghapus Data Kelas</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        <?php } ?>
        <h4>Kelas</h4>
        <button type="button" class="btn bg-gradient-warning btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#classesAdd">
          Tambah
        </button>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 table-borderless table-hover" id="dataTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">#</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nam Kelas</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ruang</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no            = 0;
              $clasess       = mysqli_query($db, 'SELECT * FROM kelas');
              while ($class = mysqli_fetch_array($clasess)) {
                $no++;
              ?>
                <tr>
                  <td class="text-center w-2 text-gray-900 text-xs font-weight-bolder">
                    <?= $no; ?>.
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder">
                    <?= $class['nama_kelas']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $class['ruang']; ?>
                  </td>
                  <td class="align-middle w-20">
                    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                      <a href="#" data-bs-target="#classesEdit" data-id="<?= $class['id'] ?>" id="editClass" data-bs-toggle="modal" title="Hapus <?= $class['nama_kelas']; ?> ?" class="icon icon-shape btn bg-gradient-info p-2 icon-sm border-radius-lg text-center m-0 me-1 d-flex align-items-center justify-content-center cursor-pointer">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64px" height="64px">
                          <path d="M22 51c-1-1-4-1-4-1l-.425-1.274c-.362-1.086-1.215-1.939-2.301-2.301L14 46c0 0 .5-2.5-1-4l25-25 8 10L22 51zM52 21l-9-9 4.68-4.68c0 0 3.5-1.5 7 2s2 7 2 7L52 21zM9 50l-1.843 4.476c-.614 1.49.877 2.981 2.367 2.367L14 55 9 50z" />
                        </svg>
                      </a>
                      <a href="../controllers/Classes/destroy.php?id=<?= $class['id']; ?>" onClick="return confirm('Apakah Kode <?= $class['nama_kelas']; ?>, Yakin Hapus ?')" title="Hapus <?= $class['nama_kelas']; ?> ?" class="icon icon-shape btn bg-gradient-danger p-2 icon-sm border-radius-lg text-center m-0 ms-1 d-flex align-items-center justify-content-center cursor-pointer">
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

<div class="modal fade" id="classesAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Tambah Kelas</h3>
          </div>
          <div class="card-body p-3">
            <form role="form text-left" action="../controllers/Classes/add.php" method="POST">
              <label class="m-0">Nama Kelas</label>
              <div class="input-group mb-2">
                <input autofocus type="number" class="form-control" name="nama_kelas" id="nama_kelas" required>
              </div>
              <label class="m-0">Ruang</label>
              <div class="input-group mb-2">
                <input type="text" class="form-control" name="ruang" id="ruang" required>
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
<div class="modal fade" id="classesEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Edit Kelas</h3>
          </div>
          <div class="card-body p-3">
            <form role="form text-left" action="../controllers/Classes/update.php" method="POST">
              <input type="hidden" name="id" id="editClassId">
              <label class="m-0">Nama Kelas</label>
              <div class="input-group mb-2">
                <input autofocus type="number" class="form-control" name="nama_kelas" id="editClassName" required>
              </div>
              <label class="m-0">Ruang</label>
              <div class="input-group mb-2">
                <input type="text" class="form-control" name="ruang" id="editClassRuang" required>
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