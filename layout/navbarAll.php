<?php
session_start();
include './auth/koneksi.php';
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Halaman Utama - Manage Tugas ITTS</title>
 
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="faviconitts.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href=" ./template/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="./template/assets/vendor/js/helpers.js"></script>
    <script src="./template/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <a href="#">
    <img src="./assets/img/logo.png" alt="Sisfo Tugas Logo" width="120">
    <!--<span class="app-brand-text demo menu-text fw-bolder ms-2">Sisfo Tugas</span>-->
</a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="./index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Menu Utama</div>
              </a>
            </li>
              <!-- informasi -->
            <!--<li class="menu-item">-->
            <!--  <a href="./informasi" class="menu-link">-->
            <!--    <i class="menu-icon tf-icons bx bx-podcast"></i>-->
            <!--    <div data-i18n="Analytics">Informasi</div>-->
            <!--  </a>-->
            <!--</li>-->
            <li class="menu-item">
              <a href="./jadwal" class="menu-link">
                <i class="menu-icon tf-icons bx bx-podcast"></i>
                <div data-i18n="Analytics">Jadwal Kuliah</div>
              </a>
            </li>
                <!-- Login -->
             <li class="menu-item">
              <a href="./auth/login" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-in"></i>
                <div data-i18n="Analytics">Login</div>
              </a>
            </li>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Marquee -->
    <marquee behavior="scroll" direction="left" class="navbar-nav align-items-center">
      Periksa Setiap Tugas Dengan Baik, Hubungi Dosen Terkait. Apabila ada kendala Hubungi administrator 0895385629346 ( Syahrul )
    </marquee>
    <!-- /Marquee -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
    </ul>
  </div>
</nav>

