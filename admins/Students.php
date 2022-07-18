<div class="row">
  <div class="col-12">
    <div class="card mb-4 px-3">
      <div class="card-header px-0 pb-0">
        <?php if (isset($_GET['m'])) { ?>
          <?php if ($_GET['m'] == 'sa') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menambah Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ea') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menambah Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'dd') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text"><strong>Siswa!</strong> Sudah Ada</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'se') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Mengubah Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ee') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Mengubah Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'sd') { ?>
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Berhasil Menghapus Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } elseif ($_GET['m'] == 'ed') { ?>
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-satisfied"></i></span>
              <span class="alert-text">Gagal Menghapus Siswa</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        <?php } ?>
        <h4>Siswa</h4>
        <button type="button" class="btn bg-gradient-warning btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#studentsAdd">
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
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">NISN</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kelas</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Angkatan</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Telephone</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">JK</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tempat Lahir</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Agama</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Bapak</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Ibu</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Pekerjaan Bapak</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Pekerjaan Ibu</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Alamat</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no            = 0;
              $students       = mysqli_query($db, 'SELECT * FROM siswa');
              while ($student = mysqli_fetch_array($students)) {
                $classes = mysqli_query($db, 'SELECT * FROM kelas WHERE id = "' . $student['kelas_id'] . '"');
                $class = mysqli_fetch_array($classes);
                $no++;
              ?>
                <tr>
                  <td class="text-center w-2 text-gray-900 text-xs font-weight-bolder">
                    <?= $no; ?>.
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder" data-bs-toggle="modal" data-bs-target="#previewImgTableStudent">
                    <?php
                    if (!empty($student['foto'])) {
                      echo "
                        <div class='overflow-hidden rounded-pill cursor-pointer' style='width: 50px; height: 50px;'>
                          <img class='bg-cover w-100 h-100' src='../public/uploads/$student[foto]' alt='Placeholder' id='getPrev'>
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
                    <?= $student['nisn']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['nama']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $class['ruang']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['angkatan']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <span class="badge <?= ($student['status'] == 0) ? 'bg-gradient-danger' : 'bg-gradient-success'; ?>">
                      <?= ($student['status'] == 0) ? 'Nonaktif' : 'Aktif'; ?>
                    </span>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['email']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['telephone']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['jenis_kelamin'] == 1 ? 'Laki-Laki' : 'Perempuan'; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['tempat_lahir']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= implode('-', array_reverse(explode('-', $student['tanggal_lahir']))); ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['agama']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['nama_ayah']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['nama_ibu']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['pekerjaan_ayah']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['pekerjaan_ibu']; ?>
                  </td>
                  <td class="text-gray-900 text-sm font-weight-bolder w-50">
                    <?= $student['alamat']; ?>
                  </td>
                  <td class="align-middle w-20">
                    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                      <a href="#" data-bs-target="#studentsEdit" data-id="<?= $student['id'] ?>" id="editStudent" data-bs-toggle="modal" title="Hapus <?= $student['nama']; ?> ?" class="icon icon-shape btn bg-gradient-info p-2 icon-sm border-radius-lg text-center m-0 me-1 d-flex align-items-center justify-content-center cursor-pointer">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64px" height="64px">
                          <path d="M22 51c-1-1-4-1-4-1l-.425-1.274c-.362-1.086-1.215-1.939-2.301-2.301L14 46c0 0 .5-2.5-1-4l25-25 8 10L22 51zM52 21l-9-9 4.68-4.68c0 0 3.5-1.5 7 2s2 7 2 7L52 21zM9 50l-1.843 4.476c-.614 1.49.877 2.981 2.367 2.367L14 55 9 50z" />
                        </svg>
                      </a>
                      <a href="../controllers/Students/destroy.php?id=<?= $student['id']; ?>" onClick="return confirm('Apakah Kode <?= $student['nama']; ?>, Yakin Hapus ?')" title="Hapus <?= $student['nama']; ?> ?" class="icon icon-shape btn bg-gradient-danger p-2 icon-sm border-radius-lg text-center m-0 ms-1 d-flex align-items-center justify-content-center cursor-pointer">
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

<div class="modal fade" id="studentsAdd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Tambah Siswa</h3>
          </div>
          <div class="card-body p-4">
            <form role="form text-left" action="../controllers/Students/add.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12 col-md-6">
                  <label class="m-0">Nama <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama" id="nama" required>
                  </div>
                  <label class="m-0">Kelas <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="kelas_id" id="kelas_id">
                      <option value="" disabled>~ Pilih Kelas ~</option>
                      <?php
                      $classes = mysqli_query($db, 'SELECT * FROM kelas');
                      while ($class = mysqli_fetch_array($classes)) {
                        echo "
                        <option value='$class[id]'>
                            $class[ruang]
                        </option>                              
                        ";
                      }
                      ?>
                    </select>
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
                  <label class="m-0">Nama Ayah</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="m-0">Nama Ibu</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu">
                  </div>
                  <label class="m-0">Pekerjaan Ayah</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah">
                  </div>
                  <label class="m-0">Pekerjaan Ibu</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu">
                  </div>
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
                  <label class="m-0">Foto</label>
                  <div class="input-group mb-2">
                    <input type="file" class="form-control" name="foto" id="fileAdd" accept="image/*" onchange="previewFile(this);" />
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
<div class="modal fade" id="studentsEdit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Edit Siswa</h3>
          </div>
          <div class="card-body p-4">
            <form role="form text-left" action="../controllers/Students/update.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12 col-md-6">
                  <input type="hidden" name="id" id="editStudentId">
                  <label class="m-0">Nama <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama" id="editStudentName" required>
                  </div>
                  <label class="m-0">Kelas <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="kelas_id" id="editStudentClass">
                      <option selected disabled>~ Pilih Kelas ~</option>
                      <?php
                      $classes = mysqli_query($db, 'SELECT * FROM kelas');
                      while ($class = mysqli_fetch_array($classes)) {
                        echo "
                          <option value='$class[id]'>
                              $class[ruang]
                          </option>                              
                        ";
                      }
                      ?>
                    </select>
                  </div>
                  <label class="m-0">Email <span class="text-danger">*</span></label>
                  <div class="input-group mb-2">
                    <input type="email" class="form-control" name="email" id="editStudentEmail" required>
                  </div>
                  <label class="m-0">Telephone</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="telephone" id="editStudentTelephone">
                  </div>
                  <label class="m-0">Jenis Kelamin <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="jenis_kelamin" id="editStudentGenderMale">
                      <label>Laki-laki</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="jenis_kelamin" id="editStudentGenderFemale">
                      <label>Perempuan</label>
                    </div>
                  </div>
                  <label class="m-0">Tempat Lahir</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="tempat_lahir" id="editStudentPlaceBirth">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="editStudentBirthday" required />
                  </div>
                  <label class="m-0">Agama</label>
                  <div class="input-group mb-2">
                    <select class="form-control" name="agama" id="editStudentAgama">
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
                  <label class="m-0">Nama Ayah</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama_ayah" id="editStudentFatherName">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="m-0">Nama Ibu</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama_ibu" id="editStudentMotherName">
                  </div>
                  <label class="m-0">Pekerjaan Ayah</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="editStudentFatherJob">
                  </div>
                  <label class="m-0">Pekerjaan Ibu</label>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="editStudentMotherJob">
                  </div>
                  <label class="m-0">Alamat Lengkap</label>
                  <div class="input-group mb-2">
                    <textarea class="form-control" name="alamat" id="editStudentAddress" rows="4"></textarea>
                  </div>
                  <label class="m-0">Status <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="1" name="status" id="editStudentActive">
                      <label for="editStudentActive">Aktif</label>
                    </div>
                    <div class="form-check ms-4">
                      <input class="form-check-input" type="radio" value="0" name="status" id="editStudentNonActive">
                      <label for="editStudentNonActive">Non-Aktif</label>
                    </div>
                  </div>
                  <label class="m-0">Foto</label>
                  <div class="input-group mb-2">
                    <input type="file" class="form-control" name="foto" id="fileEdit" accept="image/*" onchange="previewFileEditStudent(this);" />
                    <input type="hidden" class="form-control" name="foto_lama" id="editStudentAvatarOld" />
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
<div class="modal fade" id="previewImgTableStudent" tabindex="-1" role="dialog" aria-hidden="true">
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