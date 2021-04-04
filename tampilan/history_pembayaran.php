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
            <a href="dashboard_siswa.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard Siswa</p>
            </a>
          </li>   
          <li>
            <a href="history_pembayaran.php">
              <i class="tim-icons icon-bank"></i>
              <p>History Pembayaran</p>
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
            <a class="navbar-brand" href="javascript:void(0)">Data Pembayaran</a>
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
                  <li class="nav-link"><a href="" class="nav-item dropdown-item"><b>Hai Siswa</b> <b>Siswa 1</b></a></li>
                  <li class="nav-link"><a href="" class="nav-item dropdown-item">Pengaturan</a></li>
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
                <h4 class="card-title"> Transaksi Pembayaran </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                          <th>No</th>
                          <th>Nama Petugas</th>
                          <th>NISN</th>
                          <th>Tanggal Bayar</th>
                          <th>Bulan Dibayar</th>
                          <th>Tahun Dibayar</th>
                          <th>Spp Per Bulan</th>
                          <th>Jumlah Dibayar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci=trim($_POST['kata_kunci']);
                                $query="select * from pembayaran,petugas,spp where pembayaran.id_petugas=petugas.id_petugas and pembayaran.id_spp=spp.id_spp and pembayaran.nisn like '%".$kata_kunci."%' order by bulan_dibayar asc";

                            }else {
                            $query="select * from pembayaran,petugas,spp where pembayaran.id_petugas=petugas.id_petugas and pembayaran.id_spp=spp.id_spp order by id_pembayaran asc";
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
                            <td><?php echo $row['nama_petugas']; ?></td>
                            <td><?php echo $row['nisn']; ?></td>
                            <td><?php echo $row['tgl_bayar']; ?></td>
                            <td><?php echo $row['bulan_dibayar']; ?></td>
                            <td><?php echo $row['tahun_dibayar']; ?></td>
                            <td><?php echo substr($row['nominal'], 0, 20); ?></td>
                            <td><?php echo $row['jumlah_bayar']; ?></td>
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
            </script>2021 Dibuat <i class="tim-icons icon-heart-2"></i> oleh
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