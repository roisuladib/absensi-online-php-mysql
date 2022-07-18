<?php
session_start();
if (!$_SESSION['nisn']) {
  header('location: ../index.php?err=1');
  exit;
}
include '../configs/Database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Dashboard - SDN 06 Tegalsari</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="../assets/js/plugins/awesome.min.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="../vendors/datatables/dataTables.bootstrap4.min.css" />
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.3" rel="stylesheet" />
  <link href="../assets/css/flatpickr.min.css" rel="stylesheet" />

</head>
<style>
  .isActive.active {
    color: #fff !important;
  }

  .isActive.active i {
    color: #fff !important;
  }

  .paginate_button.page-item.active a {
    color: #fff !important;
  }

  .dataTables_info {
    font-size: 10px;
  }
</style>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-gradient-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 shadow-lg z-index-1" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">SDN 06 Tegalsari</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link isActive" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link isActive" href="./index.php?p=presensis">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bell-55 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Presensi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link isActive" href="./index.php?p=history">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Riwayat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link isActive" href="../controllers/Auth/Logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-user-run text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl py-0" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse me-md-0 py-2 me-sm-4 d-flex align-items-center" id="navbar">
          <div class="me-md-auto d-flex d-xl-none pe-md-3 text-white p-0 cursor-pointer position-relative">
            <div class="sidenav-toggler-inner position-absolute start-0 top-0 end-0 bottom-0" id="iconNavbarSidenav">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </div>
          <div class="me-md-auto"></div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item pe-2 d-flex align-items-center">
              <a href="#" class="nav-link text-white p-0 rounded-circle align-items-center d-flex" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="pe-2"><?= $_SESSION['nama'] ?></div>
                <img src="../public/images/img-avatar.svg" width="50" height="50" alt="<?= $_SESSION['nama'] ?>" title="<?= $_SESSION['nama'] ?>">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <?php
      if (!isset($_GET['p'])) {
        include('./Dashboard.php');
      } else if ($_GET['p'] === 'presensis') {
        include('./Presensis.php');
      } else if ($_GET['p'] === 'history') {
        include('./History.php');
      }
      ?>
      <footer class="footer py-3 mt-auto">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              Di bangun <i class="fa fa-heart"></i> Oleh
              <a href="#" class="font-weight-bold" target="_blank">Avi Sulistianing Palestin</a>
              <strong>19011547</strong>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">App Settings</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>

        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const d = e => document.querySelector(e);
    const prevEdit = d('#prevEdit');
    const fileEdit = d('#fileEdit');
    fileEdit.addEventListener('change', e => {
      const reader = new FileReader();
      reader.readAsDataURL(e.target.files[0]);
      reader.onload = e => prevEdit.src = e.target.result;
    });
  </script>
  <script src="../vendors/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    const ctx1 = document.getElementById("chart-line").getContext("2d");

    const gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="../vendors/button.min.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.3"></script>
  <script src="../vendors/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../vendors/demo/datatables-demo.js"></script>
  <script src="../assets/js/plugins/flatpickr.min.js"></script>
  <script>
    (() => {
      modalImg();
      classActive();
      arrowTable();
      getStudentById();
      getTeacherById();
      getClassById();
      getLessonById();
      getAbsenMengajarId();
    })();

    function modalImg() {
      $('*#getPrev').on('click', function(e) {
        const src = $(this).attr('src');
        $('#prevImgTable').attr('src', src);
      });
    }

    function classActive() {
      const url = window.location;
      $('.isActive').filter(function() {
        return this.href == url;
      }).addClass('active bg-gradient-primary');
    }

    function arrowTable() {
      setInterval(function() {
        $(".paginate_button.previous a:contains('Previous')").html("<");
        $(".paginate_button.next a:contains('Next')").html(">");
      }, 0);
    }

    function getStudentById() {
      $('*#editStudent').click(function() {
        const id = $(this).data('id');
        $.ajax({
          type: 'get',
          url: '../controllers/Students/getStudentById.php',
          data: 'id=' + id,
          dataType: 'json',
          success: res => {
            const {
              id,
              nama,
              email,
              telephone,
              jenis_kelamin,
              tempat_lahir,
              tanggal_lahir,
              nama_ayah,
              nama_ibu,
              pekerjaan_ayah,
              pekerjaan_ibu,
              alamat,
              foto
            } = res;
            $('#editStudentId').val(id);
            $('#editStudentName').val(nama);
            $('#editStudentEmail').val(email);
            $('#editStudentTelephone').val(telephone);
            jenis_kelamin === '0' ? $('#editStudentGenderFemale').prop('checked', true) : $('#editStudentGenderMale').prop('checked', true);;
            $('#editStudentPlaceBirth').val(tempat_lahir);
            $('#editStudentBirthday').val(tanggal_lahir);
            $('#editStudentFatherName').val(nama_ayah);
            $('#editStudentMotherName').val(nama_ibu);
            $('#editStudentFatherJob').val(pekerjaan_ayah);
            $('#editStudentMotherJob').val(pekerjaan_ibu);
            $('#editStudentAddress').val(alamat);
            $('#editStudentAvatarOld').val(foto);
            foto !== '' ? $('#prevEdit').attr('src', `../public/uploads/${foto}`) : $('#prevEdit').attr('src', '../public/images/img-avatar.png');;
            $('#prevEdit').attr('alt', foto);
            $('#prevEdit').attr('title', `Foto nya ${nama}`);
          }
        });
      });
    }

    function getTeacherById() {
      $('*#editTeacher').click(function() {
        const id = $(this).data('id');
        $.ajax({
          type: 'get',
          url: '../controllers/Teachers/getTeacherById.php',
          data: 'id=' + id,
          dataType: 'json',
          success: res => {
            const {
              id,
              nama,
              email,
              telephone,
              jenis_kelamin,
              tempat_lahir,
              tanggal_lahir,
              pendidikan,
              jurusan,
              alamat,
              status,
              foto
            } = res;
            $('#editTeacherId').val(id);
            $('#editTeacherName').val(nama);
            $('#editTeacherEmail').val(email);
            $('#editTeacherTelephone').val(telephone);
            jenis_kelamin === '0' ? $('#editTeacherGenderFemale').prop('checked', true) : $('#editTeacherGenderMale').prop('checked', true);;
            $('#editTeacherTempatLahir').val(tempat_lahir);
            $('#editTeacherTanggalLahir').val(tanggal_lahir);
            $('#editTeacherPendidikan').val(pendidikan);
            $('#editTeacherJurusan').val(jurusan);
            $('#editTeacherAddress').val(alamat);
            $('#editTeacherPhotoOld').val(foto);
            $('#editTeacherStatus').val(status);
            (foto !== '' || foto !== null) ? $('#prevEdit').attr('src', '../public/images/img-avatar.png'): $('#prevEdit').attr('src', `../public/uploads/${foto}`);
            $('#prevEdit').attr('alt', foto);
            $('#prevEdit').attr('title', `Foto nya ${nama}`);
          }
        });
      });
    } 

    function getClassById() {
      $('*#editClass').click(function() {
        const id = $(this).data('id');
        $.ajax({
          type: 'get',
          url: '../controllers/Classes/getClassById.php',
          data: 'id=' + id,
          dataType: 'json',
          success: function(res) {
            $('#idClass').val(res.id);
            $('#nameClass').val(res.nama_kelas).focus();
            $('#roomClass').val(res.ruang);
          }
        });
      });
    }

    function getLessonById() {
      $('*#editLesson').click(function() {
        const id = $(this).data('id');
        $.ajax({
          type: 'get',
          url: '../controllers/Lessons/getLessonById.php',
          data: 'id=' + id,
          dataType: 'json',
          success: function(res) {
            $('#editLessonId').val(res.id);
            $('#editLessonTeacher').val(res.guru_id);
            $('#editLessonClassId').val(res.kelas_id);
            $('#editLessonName').val(res.nama_pelajaran);
          }
        });
      });
    }    

    function getAbsenMengajarId() {
      $('*#absenSekarang').click(function() {
        const id = $(this).data('id');
        $.ajax({
          type: 'get',
          url: '../controllers/Presensis/getById.php',
          data: 'id=' + id,
          dataType: 'json',
          success: res => {
            $('#mengajarId').val(res.id);
          }
        });
      });
    }    

    let timestamp = '<?= time();?>';
    function updateTime(){
      $('#time').html(Date(timestamp).split(' ')[4]);
      timestamp++;
    }
    $(function(){
      setInterval(updateTime, 1000);
    });

  </script>
</body>

</html>