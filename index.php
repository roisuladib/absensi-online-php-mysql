<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
   <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
   <title>Login - SDN 06 Tegalsari</title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="./assets/js/plugins/awesome.min.js" crossorigin="anonymous"></script>
   <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- CSS Files -->
   <link id="pagestyle" href="./assets/css/argon-dashboard.min.css?v=2.0.3" rel="stylesheet" />
</head>
<style>
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0;
      /* <-- Apparently some margin are still there even though it's hidden */
   }

   input[type=number] {
      -moz-appearance: textfield;
      /* Firefox */
   }
</style>

<body class="">
   <main class="main-content mt-0">
      <section>
         <div class="page-header min-vh-100">
            <div class="container">
               <div class="row">
                  <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                     <div class="card card-plain rounded-3 bg-white shadow-xl">
                        <div class="card-header px-0 bg-transparent pb-0 text-start">
                           <h2 class="font-weight-bolder font-italic text-primary m-0 mb-4">SDN 06 Tegalsari</h2>
                        </div>
                        <?php
                        if (isset($_GET['err'])) {
                           if ($_GET['err'] == 1) {
                              echo '
                                    <div class="alert alert-danger py-2 px-3 rounded-3 text-white" role="alert">
                                       Ada yang salah
                                    </div>
                                 ';
                           }
                           if ($_GET['err'] == 2) {
                              echo ' 
                                    <div class="alert alert-success py-2 px-3 rounded-3 text-white" role="alert">
                                       Logout
                                    </div>
                                 ';
                           }
                        }
                        ?>
                        <div class="card-body shadow-xl rounded-3">
                           <h3 class="font-weight-bolder text-center">Login</h3>
                           <form action="./controllers/Auth/Login.php" method="POST">
                              <div class="mb-3 from-group">
                                 <label class="ms-0" for="nin">Nomor Induk</label>
                                 <input type="number" name="nin" id="nin" class="form-control form-control-lg" placeholder="NIS">
                              </div>
                              <div class="mb-3 from-group">
                                 <label class="ms-0" for="password">Password</label>
                                 <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
                              </div>
                              <div class="from-group">
                                 <label class="ms-0" for="">Role</label>
                                 <div class="row">
                                    <div class="col-4">
                                       <div class="form-check">
                                          <input class="form-check-input" value="0" type="radio" name="role" id="teacher">
                                          <label class="form-check-label" for="teacher">
                                             Guru
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-check me-4">
                                          <input class="form-check-input" value="1" type="radio" name="role" id="student" checked>
                                          <label class="form-check-label" for="student">
                                             Siswa
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-check">
                                          <input class="form-check-input" value="2" type="radio" name="role" id="admin">
                                          <label class="form-check-label" for="admin">
                                             Admin
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Login</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                     <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./public/images/img-login.jpeg');background-size: cover;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                        <h4 class="mt-5 text-white font-weight-bolder position-relative">"Motivasi Hari Ini"</h4>
                        <p class="text-white position-relative">Ketika Anda melihat orang baik, cobalah untuk meniru teladannya, dan ketika Anda melihat orang jahat, carilah kesalahannya sendiri. <span class="font-italic font-weight-bolder">- Konfusius</span></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   </script>
</body>

</html>