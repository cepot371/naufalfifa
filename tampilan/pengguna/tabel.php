<body>
  
  <?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=belummasuk");
  }

  ?>
  <?php
  if($_SESSION['level']=="admin"){
  ?>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            MH
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Mahardhika
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard Admin</p>
            </a>
          </li>
          <li>
            <a href="spp.php">
              <i class="tim-icons icon-coins"></i>
              <p>Data SPP</p>
            </a>
          </li>
          <li>
            <a href="kelas.php">
              <i class="tim-icons icon-chart-bar-32"></i>
              <p>Data Kelas</p>
            </a>
          </li>
          <li>
            <a href="pengguna.php">
              <i class="tim-icons icon-badge"></i>
              <p>Pengguna</p>
            </a>
          </li>
           <li>
            <a href="siswa.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Siswa</p>
            </a>
          </li>
          <li>
            <a href="pembayaran.php">
              <i class="tim-icons icon-bank"></i>
              <p>Transaksi Pembayaran</p>
            </a>
          </li>
              <li>
            <a href="laporan.php">
              <i class="tim-icons icon-notes"></i>
              <p>Laporan Pembayaran</p>
            </a>
          </li>
           <li>
            <a href="laporan2.php">
              <i class="tim-icons icon-notes"></i>
              <p>Laporan Siswa</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">Data Pengguna</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
               <li class="search-bar input-group">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="btn btn-link">
                   <?php
                $kata_kunci="";
                if (isset($_POST['kata_kunci'])) {
                    $kata_kunci=$_POST['kata_kunci'];
                }
                ?>
                   <input class="text-white" type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" placeholder="Silahkan Cari Disini" required/>
                  <button class="btn btn-primary" type="submit"><i class="tim-icons icon-zoom-split"></i></button>
                </form>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Keluar
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="" class="nav-item dropdown-item"><b><?php echo $_SESSION['username']; ?></b> <b><?php echo $_SESSION['level']; ?></b></a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="logout.php" class="nav-item dropdown-item">Keluar</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>


      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title"> Pengguna</h4>
                <a href="tambah_pengguna.php"> <i class="tim-icons icon-simple-add"></i> Tambah Pengguna</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                          <th>No</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Nama Pengguna</th>
                          <th>Level</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci=trim($_POST['kata_kunci']);
                                $query="select * from petugas where id_petugas like '%".$kata_kunci."%' or username like '%".$kata_kunci."%' or nama_petugas like '%".$kata_kunci."%' or level like '%".$kata_kunci."%' order by username asc";

                            }else {
                                $query="select * from petugas order by username asc";
                            }

                          $result = mysqli_query($koneksi, $query);
                          //mengecek apakah ada error ketika menjalankan query
                          if(!$result){
                            die ("Query Error: ".mysqli_errno($koneksi).
                               " - ".mysqli_error($koneksi));
                          }

                          //buat perulangan untuk element tabel dari data mahasiswa
                          $no = 1; //variabel untuk membuat nomor urut
                          // hasil query akan disimpan dalam variabel $data dalam bentuk array
                          // kemudian dicetak dengan perulangan while
                          while($row = mysqli_fetch_assoc($result))
                          {
                          ?>
                         <tr class="text-center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['nama_petugas']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td>
                                <a href="edit_pengguna.php?id=<?php echo $row['id_petugas']; ?>"><i class="tim-icons icon-settings"></i></a> |
                                <a href="proses_hapuspengguna.php?id=<?php echo $row['id_petugas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="tim-icons icon-trash-simple"></i></a>
                            </td>
                        </tr>
                           
                        <?php
                          $no++; //untuk nomor urut terus bertambah 1
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

      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="" class="nav-link">
                Mahardhika
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                Tentang Kami
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                Web
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> Dibuat <i class="tim-icons icon-heart-2"></i> oleh
            <a href="javascript:void(0)" target="_blank">Naufal FIFA</a> untuk Mahardhika.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Latar Belakang</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">Mode Terang</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">Mode Gelap</span>
        </li>
      </ul>
    </div>
  </div>

<?php 
}

else if($_SESSION['level']=="petugas"){

   ?>
   <h1 align="center">DASHBOARD PETUGAS</h1>

  <p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
  
  <div align="center"><a href=#>TRANSAKSI PEMBAYARAN</a> 
    
      <a href="logout.php">LOGOUT</a> 
    </p>
      <?php
  }
  
  
  ?>
    </div>
</body>