<div class="row">
  <div class="col-12">
    <div class="card mb-4 px-3">
      <div class="card-header px-0 pb-0">
        <?php if (isset($_GET['m'])) { ?>
          <?php if ($_GET['m'] == 'sa') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menambah Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ea') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menambah Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'dd') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text"><strong>Guru!</strong> Sudah Ada</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'se') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Mengubah Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ee') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Mengubah Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'sd') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menghapus Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ed') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menghapus Guru</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        <?php } ?>
        <h4>Guru</h4>
        <button type="button" class="btn bg-gradient-warning btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#teachersAdd">
          Tambah
        </button>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 table-borderless table-hover" id="dataTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">#</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Foto</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">NIGN</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Angkatan</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Telephone</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">JK</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tempat Lahir</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Agama</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Pendidikan</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jurusan</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Alamat</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no            = 0;
              $teachers       = mysqli_query($db, 'SELECT * FROM guru');
              while ($teacher = mysqli_fetch_array($teachers)) {
                $no++;
              ?>
                <tr>
                  <td class="text-center w-2 text-gray-900 text-xs font-weight-bolder">
                    <?= $no; ?>.
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder" data-bs-toggle="modal" data-bs-target="#modalPreviewImgTable">
                    <?php
                    if (!empty($teacher['foto'])) {
                      echo "
                        <div class='overflow-hidden rounded-pill cursor-pointer' style='width: 50px; height: 50px;'>
                          <img class='bg-cover w-100 h-100' src='../public/uploads/$teacher[foto]' alt='Placeholder' id='getPrev'>
                        </div>
                      ";
                    } else {
                      echo "
                        <div class='overflow-hidden rounded-pill cursor-pointer' style='width: 50px; height: 50px;'>
                          <img class='bg-cover w-100 h-100' src='../public/images/img-avatar.png' alt='Placeholder' id='getPrev'>
                        </div>
                      ";
                    }
                    ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder">
                    <?= $teacher['nign']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['nama']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['jabatan']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= implode('-', array_reverse(explode('-', explode(' ', $teacher['angkatan'])[0]))); ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <span class="badge <?= ($teacher['status'] == 0) ? 'bg-gradient-danger' : 'bg-gradient-success'; ?>">
                      <?= ($teacher['status'] == 0) ? 'Nonaktif' : 'Aktif'; ?>
                    </span>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['email']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['telephone']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['jenis_kelamin'] == 1 ? 'Laki-Laki' : 'Perempuan'; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['tempat_lahir']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= implode('-', array_reverse(explode('-', $teacher['tanggal_lahir']))); ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['agama']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['pendidikan']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['jurusan']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $teacher['alamat']; ?>
                  </td>
                  <td class="align-middle w-20">
                    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                      <a href="#" data-bs-target="#teachersEdit" data-id="<?= $teacher['id'] ?>" id="editTeacher" data-bs-toggle="modal" title="Hapus <?= $teacher['nama']; ?> ?" class="icon icon-shape btn bg-gradient-info p-2 icon-sm border-radius-lg text-center m-0 me-1 d-flex align-items-center justify-content-center cursor-pointer">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64px" height="64px">
                          <path d="M22 51c-1-1-4-1-4-1l-.425-1.274c-.362-1.086-1.215-1.939-2.301-2.301L14 46c0 0 .5-2.5-1-4l25-25 8 10L22 51zM52 21l-9-9 4.68-4.68c0 0 3.5-1.5 7 2s2 7 2 7L52 21zM9 50l-1.843 4.476c-.614 1.49.877 2.981 2.367 2.367L14 55 9 50z" />
                        </svg>
                      </a>
                      <a href="../controllers/Teachers/destroy.php?id=<?= $teacher['id']; ?>" onClick="return confirm('Apakah Kode <?= $teacher['nama']; ?>, Yakin Hapus ?')" title="Hapus <?= $teacher['nama']; ?> ?" class="icon icon-shape btn bg-gradient-danger p-2 icon-sm border-radius-lg text-center m-0 ms-1 d-flex align-items-center justify-content-center cursor-pointer">
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

<div class="modal fade" id="teachersAdd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Tambah Guru</h3>
          </div>
          <div class="card-body p-4">
            <form role="form text-left" action="../controllers/Teachers/add.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12 col-md-6">
                  <label class="m-0">Nama <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama" id="nama" required>
                  </div>
                  <label class="m-0">Email <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                  <label class="m-0">Telephone</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="telephone" id="telephone">
                  </div>
                  <label class="m-0">Jenis Kelamin <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="jenis_kelamin" id="genderMale" checked>
                      <label for="genderMale">Laki-laki</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="jenis_kelamin" id="genderFemale">
                      <label for="genderFemale">Perempuan</label>
                    </div>
                  </div>
                  <label class="m-0">Tempat Lahir</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required />
                  </div>
                  <label class="m-0">Agama</label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="agama" id="agama">
                      <option selected disabled>~ Pilih Agama ~</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katholik">Katholik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghucu">Konghucu</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <label class="m-0">Pendidikan</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan">
                  </div>
                  <label class="m-0">Jurusan</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="jurusan" id="jurusan">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="m-0">Alamat Lengkap</label>
                  <div class="input-group mb-2">
                    <textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
                  </div>
                  <label class="m-0">Status <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="status" checked>
                      <label>Aktif</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="status" />
                      <label>Non-Aktif</label>
                    </div>
                  </div>
                  <label class="m-0">Jabatan</label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="jabatan" id="jabatan" required>
                      <option selected disabled>~ Pilih Status ~</option>
                      <option value="Kepala Sekolah">Kepala Sekolah</option>
                      <option value="Guru PNS">Guru PNS</option>
                      <option value="Guru Tetap">Guru Tetap</option>
                      <option value="Guru Kontrak">Guru Kontrak</option>
                      <option value="Guru Honorer">Guru Honorer</option>
                      <option value="Guru Magang">Guru Magang</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <label class="m-0">Foto</label>
                  <div class="input-group mb-2">
                    <input type="file" class="form-control" name="foto" id="fileAdd" accept="image/*" />
                  </div>
                  <div class="overflow-hidden w-100 rounded-pill">
                    <img class="bg-cover w-100 h-100" id="prevAdd" src="../public/images/img-avatar.png" alt="Placeholder">
                  </div>
                </div>
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
<div class="modal fade" id="teachersEdit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Edit Guru</h3>
          </div>
          <div class="card-body p-4">
            <form role="form text-left" action="../controllers/Teachers/update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="editTeacherId" />
              <div class="row">
                <div class="col-12 col-md-6">
                  <label class="m-0">Nama <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama" id="editTeacherName" required>
                  </div>
                  <label class="m-0">Email <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="email" class="form-control" name="email" id="editTeacherEmail" required>
                  </div>
                  <label class="m-0">Telephone</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="telephone" id="editTeacherTelephone">
                  </div>
                  <label class="m-0">Jenis Kelamin <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="jenis_kelamin" id="editTeacherGenderMale" checked>
                      <label for="editTeacherGenderMale">Laki-laki</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="jenis_kelamin" id="editTeacherGenderFemale">
                      <label for="editTeacherGenderFemale">Perempuan</label>
                    </div>
                  </div>
                  <label class="m-0">Tempat Lahir</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="tempat_lahir" id="editTeacherTempatLahir" />
                  </div>
                  <label class="m-0">Tanggal Lahir</label>
                  <div class="input-group mb-2">
                    <input type="date" class="form-control" name="tanggal_lahir" id="editTeacherTanggalLahir" required />
                  </div>
                  <label class="m-0">Agama</label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="agama" id="editTeacherAgama">
                      <option selected disabled>~ Pilih Agama ~</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katholik">Katholik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghucu">Konghucu</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <label class="m-0">Pendidikan</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pendidikan" id="editTeacherPendidikan" />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="m-0">Jurusan</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="jurusan" id="editTeacherJurusan" />
                  </div>
                  <label class="m-0">Alamat Lengkap</label>
                  <div class="input-group mb-2">
                    <textarea class="form-control" name="alamat" id="editTeacherAddress" rows="4"></textarea>
                  </div>
                  <label class="m-0">Status <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="status" id="editTeacherActive">
                      <label>Aktif</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="status" id="editTeacherNonActive" />
                      <label>Non-Aktif</label>
                    </div>
                  </div>
                  <label class="m-0">Jabatan</label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="jabatan" id="editTeacherJabatan">
                      <option selected disabled>~ Pilih Jabatan ~</option>
                      <option value="Kepala Sekolah">Kepala Sekolah</option>
                      <option value="Guru PNS">Guru PNS</option>
                      <option value="Guru Tetap">Guru Tetap</option>
                      <option value="Guru Kontrak">Guru Kontrak</option>
                      <option value="Guru Honorer">Guru Honorer</option>
                      <option value="Guru Magang">Guru Magang</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <label class="m-0">Foto</label>
                  <div class="input-group mb-2">
                    <input type="file" class="form-control" name="foto" id="fileEdit" accept="image/*" />
                    <input type="hidden" name="foto_lama" id="editTeacherPhotoOld" />
                  </div>
                  <div class="overflow-hidden w-100 rounded-pill">
                    <img class="bg-cover w-100 h-100" id="prevEdit" src="../public/images/img-avatar.png" alt="Placeholder">
                  </div>
                </div>
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
<div class="modal fade" id="modalPreviewImgTable" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal" role="document">
    <div class="modal-content shadow-lg">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Preview</h3>
          </div>
          <div class="card-body p-4">
            <div class="overflow-hidden w-100 rounded-pill">
              <img class="bg-cover w-100 h-100" id="prevImgTable" alt="Placeholder" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>