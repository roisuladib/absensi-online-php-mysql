<div class="row">
  <div class="col-12 col-md-12">
    <div class="card mb-4 px-3">
      <div class="card-header px-0 pb-0">     
        <h4>Riwayat Presensi</h4>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 table-borderless table-hover" id="dataTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">#</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kode</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mata Pelajaran</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Guru</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Waktu</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Waktu Presensi</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Presensi Saya</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no              = 0;
              $presensis       = mysqli_query($db, 'SELECT * FROM presensi WHERE siswa_id = "'. $_SESSION['id'] .'"');
              while ($presensi = mysqli_fetch_array($presensis)) {
                $mengajars     = mysqli_query($db, 'SELECT * FROM mengajar WHERE id = "'. $presensi['mengajar_id'] .'"');
                $mengajar      = mysqli_fetch_array($mengajars);
                $lessons       = mysqli_query($db, 'SELECT * FROM pelajaran WHERE id = "'. $mengajar['pelajaran_id'] .'"');
                $lesson        = mysqli_fetch_array($lessons);
                $teachers      = mysqli_query($db, 'SELECT * FROM guru WHERE id = "'. $mengajar['guru_id'] .'"');
                $teacher       = mysqli_fetch_array($teachers);
                $no++;
              ?>
                <tr>
                  <td class="text-center w-2 text-gray-800 text-xs font-weight-bolder">
                    <?= $no; ?>.
                  </td>
                  <td class="text-gray-800 w-2 text-sm font-weight-bolder">
                    <?= $mengajar['kode']; ?>
                  </td>
                  <td class="text-gray-800 w-2 text-sm font-weight-bolder">
                    <?= $lesson['nama_pelajaran']; ?>
                  </td>
                  <td class="text-gray-800 w-2 text-sm font-weight-bolder">
                    <?= $teacher['nama']; ?>
                  </td>
                  <td class="text-gray-800 w-2 text-sm font-weight-bolder">
                    <?= substr($mengajar['jam_mulai'], 0, 5) . ' - ' . substr($mengajar['jam_selesai'], 0, 5); ?>
                  </td>
                  <td class="text-secondary text-sm font-weight-bolder">
                    <?= implode('-', array_reverse(explode('-', $presensi['waktu']))); ?>
                  </td>
                  <td class="text-secondary text-sm font-weight-bolder">
                    <?= substr($presensi['tanggal'],11, 5); ?>
                  </td>
                  <td class="text-secondary text-sm font-weight-bolder">
                    <span class="badge 
                    <?php
                      switch ($presensi['jenis']) {
                        case 'H':
                          echo 'bg-gradient-primary';
                          break;
                        case 'I':
                          echo 'bg-gradient-info';
                          break;
                        case 'S':
                          echo 'bg-gradient-success';
                          break;
                        case 'A':
                          echo 'bg-gradient-danger';
                          break;
                        case 'C':
                          echo 'bg-gradient-warning';
                          break;
                        case 'T':
                          echo 'bg-gradient-danger';
                          break;
                        
                        default:
                          echo 'Presensi';
                          break;
                      }
                    ?>
                    ">
                    <?php
                      switch ($presensi['jenis']) {
                        case 'H':
                          echo 'Hadir';
                          break;
                        case 'I':
                          echo 'Izin';
                          break;
                        case 'S':
                          echo 'Sakit';
                          break;
                        case 'A':
                          echo 'Alpha';
                          break;
                        case 'C':
                          echo 'Cuti';
                          break;
                        case 'T':
                          echo 'Telat';
                          break;
                        
                        default:
                          echo 'Presensi';
                          break;
                      }
                    ?>
                    </span>
                  </td>
                  <td class="text-secondary text-sm font-weight-bolder">
                    <?= $presensi['keterangan']; ?>
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