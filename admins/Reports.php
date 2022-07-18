<div class="row">
  <div class="col-12 col-md-3">
    <div class="card mb-4 p-3">
      <div class="card-body p-0">
        <form method="POST" onsubmit="return cetakAJaran(850, 500)">
          <div class="form-group">
            <label class="m-0 mb-2">Tahun Ajaran</label>
            <select name="ajaran" id="ajaran" class="form-control" required>
              <option disabled selected>~ Pilih Tahun Ajaran ~</option>
              <?php
              $ajarans       = mysqli_query($db, 'SELECT * FROM ajaran');
              while ($ajaran = mysqli_fetch_array($ajarans)) {
                echo "
                  <option value='$ajaran[id]' id='nodeAjaran'>$ajaran[ajaran]</option>
                ";
              ?>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn bg-gradient-warning btn-sm m-0">
            Cetak
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3">
    <div class="card mb-4 p-3">
      <div class="card-body p-0">
        <form>
          <div class="form-group">
            <label class="m-0 mb-2">Presensi</label>
            <select name="kelas" id="kelas" class="form-control" required>
              <option disabled selected>~ Pilih Kelas ~</option>
              <?php
              $classes      = mysqli_query($db, 'SELECT * FROM kelas');
              while ($class = mysqli_fetch_array($classes)) {
                echo "
                  <option value='$class[id]' id='nodeKelas'>$class[ruang]</option>
                ";
              ?>
              <?php } ?>
            </select>
          </div>
          <button type="button" data-bs-toggle="modal" data-bs-target="#detailKelas" class="btn bg-gradient-warning btn-sm m-0">
            Cetak
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 px-3 pt-3 text-center">
            <h3 class="font-weight-bolder text-primary text-gradient mb-0">Laporan Presensi</h3>
          </div>
          <div class="card-body p-3">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-borderless table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">#</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kode</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ruang</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no            = 0;
                  $lessons       = mysqli_query($db, 'SELECT * FROM pelajaran');
                  while ($lesson = mysqli_fetch_array($lessons)) {
                    $no++;
                  ?>
                    <tr>
                      <td class="text-center w-2 text-gray-900 text-xs font-weight-bolder">
                        <?= $no; ?>.
                      </td>
                      <td class="text-gray-900 text-sm font-weight-bolder w-50">
                        <?= $lesson['kode']; ?>
                      </td>
                      <td class="text-gray-900 text-sm font-weight-bolder w-50">
                        <?= $lesson['nama_pelajaran']; ?>
                      </td>
                      <td class="align-middle w-20">
                      <a href="javascript:window.print();" class="btn bg-gradient-primary">
                          <i class="fa fa-print"></i>
                          Cetak
                      </a>
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
  </div>
</div>

<script>
  const cetakAJaran = (w, h) => {
    const left = (screen.width / 2) - (w / 2);
    const top = (screen.height / 2) - (h / 2);
    const ajaran = document.querySelector('#nodeAjaran').innerHTML;
    const id = document.querySelector('#ajaran').value;
    const newWin = window.open('./CetakAJaran.php?ajaran=' + ajaran + '&id=' + id, 'Laporan', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
  }
  const cetakPresensi = (w, h) => {
    const left = (screen.width / 2) - (w / 2);
    const top = (screen.height / 2) - (h / 2);
    const kelas = document.querySelector('#nodeKelas').innerHTML;
    const id = document.querySelector('#kelas').value;
    const newWin = window.open('./CetakKelas.php?kelas=' + kelas + '&id=' + id, 'Laporan', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
  }
</script>