<?php
session_start();
include 'koneksi.php';

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Pengguna sudah login, alihkan ke dashboard
    header("Location: ../dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php");
        exit();
    } else {
        $error = "Username atau Password salah";
    }
}
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Aplikasi Management Tugas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="faviconitts.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../template/assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../template/assets/css/demo.css" />

    <link rel="stylesheet" href="../temlate/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../template/assets/vendor/css/pages/page-auth.css" />
    <script src="../template/assets/vendor/js/helpers.js"></script>
    <script src="../template/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                     <img src="../assets/img/logo.png" alt="Sisfo Tugas Logo" width="120">
                  </span><br>
                  <!--<span class="app-brand-text demo text-body fw-bolder"> Manajemen Tugas</span>-->
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Selamat Datang</h4>
              <p class="mb-4">Silahkan login untuk mengakses dashboard</p>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-warning d-grid w-100" type="submit">Masuk</button>
                </div>
              </form>
                </a>
              </p>
            </div>
          </div>
          <?php if (isset($error)) echo $error; ?>
        </div>
      </div>
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../template/assets/vendor/libs/popper/popper.js"></script>
    <script src="../template/assets/vendor/js/bootstrap.js"></script>
    <script src="../template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../template/assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="../template/assets/js/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
