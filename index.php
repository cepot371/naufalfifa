<!DOCTYPE html>
<html>
<head>
	
	<?php
  include ('tampilan/header.php');
  include ('tampilan/footer.php');
?>
</head>
<body>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>Perhatian!</strong> Mohon Cek Kembali Username dan Password Anda.
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
		}
		if($_GET['pesan']=="belummasuk"){
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>Perhatian!</strong> Username dan Password Anda Belum Terdaftar                                        					                   					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
		}
	}
	?>
 

	<div class="container">
	 <div class="content">
        <div class="row pt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Silahkan Masuk</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="cek_login.php" enctype="multipart/form-data" >
                  <section class="base">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="tim-icons icon-single-02"></i></div>
                      </div>
                        <input type="text" class="form-control" name="username" placeholder="Isi Username Anda .." required="" />
                      </div>
                    </div>
                       <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="tim-icons icon-key-25"></i></div>
                      </div>
                        <input type="password" class="form-control" name="password" placeholder="Isi Password Anda .." required="" />
                      </div>
                    </div>
                  </div>
                   </section>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-fill btn-success"><i class="tim-icons icon-double-right"></i></button>
                      <button type="reset" class="btn btn-fill btn-danger"><i class="tim-icons icon-refresh-02"></i></button>
                    </div>
                </form>

              </div>
            </div>
          </div>
          </div>

      <footer class="footer col-md-12">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="dashboard_siswa.php" class="nav-link">
                Masuk Sebagai Siswa
              </a>
            </li>
            <li class="nav-item">
              <a href="faq.php" class="nav-link">
              FAQ?
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
        <li class="header-title"> Latar Belakang</li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">Mode Terang</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">Mode Gelap</span>
        </li>
      </ul>
    </div>
  </div>

</body>
</html>