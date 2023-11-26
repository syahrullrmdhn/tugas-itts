<?php include './layout/navbar.php'; ?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang <?php echo $_SESSION['username']; ?></h5>
                <p class="mb-4">Ada beberapa tugas yang harus kamu lihat</p>
                <a href="index" class="btn btn-sm btn-outline-primary">Lihat Tugas</a>
                <a href="./auth/logout" class="btn btn-sm btn-outline-warning">Logout</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="./assets/img/illustrations/man-with-laptop-light.png" height="140"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>


     <!-- Jumlah Tugas Section -->
            <div class="col-lg-4 mb-4 order-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Jumlah Tugas</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        include './auth/koneksi.php';

                        $query = "SELECT COUNT(*) AS total_tugas,
                                         SUM(CASE WHEN deadline < CURDATE() THEN 1 ELSE 0 END) AS lewat_deadline
                                  FROM tasks";
                        $result = $koneksi->query($query);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalTugas = $row['total_tugas'];
                            $tugasLewatDeadline = $row['lewat_deadline'];
                        } else {
                            $totalTugas = 0;
                            $tugasLewatDeadline = 0;
                        }
                        ?>

                        <div class="jumlah-tugas-container bg-primary text-white p-3 rounded">
                            <p class="jumlah-tugas mb-2">Total Tugas: <?php echo $totalTugas; ?></p>
                            <p class="jumlah-lewat-deadline">Tugas Lewat Deadline: <?php echo $tugasLewatDeadline; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Jumlah Tugas Section -->
        </div>
        <?php include './layout/footer.php'; ?>
    </div>
</div>