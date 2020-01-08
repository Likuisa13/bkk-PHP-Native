<?php 
    session_start();
    if (empty($_SESSION['username'])) {
        header("location:../../index.php");
        exit();
    }
 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <?php
    include_once '../../config/dao.php';
    ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BKK "<?php echo $_SESSION['bkk'] ?>" - <?php echo $_SESSION['smk'] ?></title>
        <link rel="icon" href="../../img/SMK.png">

        <!-- css -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../plugins/cubeportfolio/css/cubeportfolio.min.css">
        <link href="../../css/nivo-lightbox.css" rel="stylesheet" />
        <link href="../../css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="../../css/owl.carousel.css" rel="stylesheet" media="screen" />
        <link href="../../css/owl.theme.css" rel="stylesheet" media="screen" />
        <link href="../../css/animate.css" rel="stylesheet" />
        <link href="../../css/style.css" rel="stylesheet">

        <!-- boxed bg -->
        <link id="bodybg" href="../../bodybg/bg1.css" rel="stylesheet" type="text/css" />
        <!-- template skin -->
        <link id="t-colors" href="../../color/default.css" rel="stylesheet">
        <script src="../../js/jquery.js"></script>
        <script type="text/javascript">
        var htmlobjek;
        $(document).ready(function(){
        $("#provinsi").change(function(){
        var provinsi = $("#provinsi").val();
        $.ajax({
        url: "ambilkota.php",
        data: "provinsi="+provinsi,
        cache: false,
        success: function(msg){
        $("#kabupaten").html(msg);
        }
        });
        });
        $("#kabupaten").change(function(){
        var kabupaten = $("#kabupaten").val();
        $.ajax({
        url: "ambilkecamatan.php",
        data: "kabupaten="+kabupaten,
        cache: false,
        success: function(msg){
        $("#kecamatan").html(msg);
        }
        });
        });
        $("#kecamatan").change(function(){
        var kecamatan = $("#kecamatan").val();
        $.ajax({
        url: "ambildesa.php",
        data: "kecamatan="+kecamatan,
        cache: false,
        success: function(msg){
        $("#desa").html(msg);
        }
        });
        });
        });
         
        </script>
        <script>
            function showModalKu(idl,nm) {
                $('#idlowongan').val(idl);         
                $('#nama').text(nm);
                $('#ModalKu').modal('show');                
            }
            function showModalDaftar() {
                $('#password').val('');           
                $('#ModalMu').modal('show');                
            }
        </script>


    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

        <div id="wrapper">

            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-left"></p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-right"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container navigation">

                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="../../img/SMK.png" alt="" width="120" height="120" />
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="index.php">Home</a></li>
                            <li class=""><a href="lowongan.php">lowongan</a></li>
                            <li class=""><a href="pengumuman.php">hasil seleksi</a></li>
                            <li class=""><a href="lamaran.php">daftar lamaran</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="active"><a href="biodata.php">biodata</a></li>
                                    <li><a href="JavaScript:showModalDaftar();">akun</a></li>
                                    <li><a href="logout.php">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- Section: read database -->
            <?php
            $dao = new Dao();
            $dao2 = new Dao();
            $cari = '';
            $result = $dao->readBiodata($_SESSION['id']);
            $akun = $dao2->readAkunCanaker($_SESSION['username']);
            $usr = '';
            $nm = '';
            $noinduk = '';
            $tempat = '';
            $tanggal = '';
            $jk = '';
            $alamat = '';
            $prov = '';
            $kab = '';
            $kec = '';
            $desa = '';
            $sekolah = '';
            $jurusan = '';
            $hp = '';
            $email = '';
            $agama = '';
            $tb = '';
            $bb = '';
            $mtk = '';
            $raport = '';
            $idcan = '';
            foreach ($result as $value) {
                $idcan = $value['id_canaker'];
                $tempat = $value['tempat_lahir'];
                $tanggal = $value['tgl_lahir'];
                $jk = $value['jenis_kelamin'];
                $alamat = $value['alamat'];
                $prov = $value['nama_prov'];
                $kab = $value['nama_kab'];
                $kec = $value['nama_kec'];
                $desa = $value['nama_desa'];
                $sekolah = $value['asal_sekolah'];
                $jurusan = $value['jurusan'];
                $hp = $value['no_telp'];
                $email = $value['email'];
                $agama = $value['agama'];
                $tb = $value['tinggi_badan'];
                $bb = $value['berat_badan'];
                $mtk = $value['nilai_mtk'];
                $raport = $value['rata_raport'];
              $i++;
              }
            $j = 1;
            foreach ($akun as $value) {
                $usr = $value['username'];
                $nm = $value['nama_lengkap'];
                $noinduk = $value['no_induk'];
              $j++;
              }
            ?>
            <!-- Section: intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                        <h5 class="h-light"><b><center>BIODATA ANDA</center></b></h5>
                    </div>
                    <div class="container">
                        <div class="row">
                                <div class="form-wrapper">
                                    <div class="wow col-md-2" data-wow-duration="2s" data-wow-delay="0.2s">
                                        <br>
                                    </div>
                                    <div class="wow" data-wow-duration="2s" data-wow-delay="0.2s">
                                        <div class="well well-trans col-sm-8">
                                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.1s">
                                                <div class="row" style="padding:40px 50px;">
                                                <form role="form" method="post" action="aksibiodata.php">
                                                    <div class="col-lg-13">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="hidden" name="idcan" id="idcan" value="<?php echo $idcan ?>">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" class="form-control"  name="nama" id="nama" disabled="yes" placeholder="Nama Lengkap" value="<?php echo $nm ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir" value="<?php echo $tempat ?>">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Lahir" value="<?php echo $tanggal ?>">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Jenis Kelamin</label>
                                                            <select class="form-control" name="jk" id="jk" value="">
                                                                <option><?php echo $jk ?></option>
                                                                <option>L</option>
                                                                <option>P</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat ?>">
                                                        </div>
                                                        <div class="col-sm-6">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Provinsi</label>
                                                                <select class="form-control" name="provinsi" id="provinsi">
                                                                <option value=""><?php echo $prov ?></option>
                                                                <?php
                                                                $lowongan = $dao->readProv();
                                                                $i = 1;
                                                                foreach ($lowongan as $value) {
                                                                  ?>
                                                                    <option value="<?php echo $value['kode_prov']?>"><?php echo $value['nama_prov']?></option>
                                                                  <?php
                                                                  $i++;
                                                                  }
                                                                ?>  
                                                              </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Kabupaten/Kota</label>
                                                                <select class="form-control" name="kabupaten" id="kabupaten">
                                                                <option value=""><?php echo $kab ?></option>
                                                                <?php
                                                                $lowongan = $dao->readKab();
                                                                $i = 1;
                                                                foreach ($lowongan as $value) {
                                                                  ?>
                                                                    <option value="<?php echo $value['kode_kab']?>"><?php echo $value['nama_kab']?></option>
                                                                  <?php
                                                                  $i++;
                                                                  }
                                                                ?>  
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Kecamatan</label>
                                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                                <option value=""><?php echo $kec ?></option>
                                                                <?php
                                                                $lowongan = $dao->readKec();
                                                                $i = 1;
                                                                foreach ($lowongan as $value) {
                                                                  ?>
                                                                    <option value="<?php echo $value['kode_kec']?>"><?php echo $value['nama_kec']?></option>
                                                                  <?php
                                                                  $i++;
                                                                  }
                                                                ?>  
                                                              </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Desa</label>
                                                                <select class="form-control" name="desa" id="desa">
                                                                <option value=""><?php echo $desa ?></option>
                                                                <?php
                                                                $lowongan = $dao->readDes();
                                                                $i = 1;
                                                                foreach ($lowongan as $value) {
                                                                  ?>
                                                                    <option value="<?php echo $value['kode_desa']?>"><?php echo $value['nama_desa']?></option>
                                                                  <?php
                                                                  $i++;
                                                                  }
                                                                ?>  
                                                              </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Asal Sekolah</label>
                                                            <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Asal Sekolah" value="<?php echo $sekolah ?>">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Jurusan</label>
                                                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Nomor HP</label><input type="text" class="form-control" name="hp" id="hp" placeholder="Nomor HP" value="<?php echo $hp ?>">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Email</label>
                                                            <input type="Email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $email ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <label>Agama</label>
                                                            <select class="form-control" name="agama" id="agama" value="">
                                                                <option><?php echo $agama ?></option>
                                                                <option>Islam</option>
                                                                <option>Katholik</option>
                                                                <option>Protestan</option>
                                                                <option>Hindu</option>
                                                                <option>Budha</option>
                                                                <option>Konghuchu</option>
                                                            </select>
                                                        </div>
                                                            <div class="col-sm-4">
                                                            <label>Tinggi Badan (cm)</label>
                                                            <input type="text" class="form-control" name="tb" id="tb" placeholder="Tinggi Badan" value="<?php echo $tb ?>">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Berat Badan (kg)</label>
                                                            <input type="text" class="form-control" name="bb" id="bb" placeholder="Berat Badan" value="<?php echo $bb ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <label>Nilai Matematika</label>
                                                            <input type="text" class="form-control" name="mtk" id="mtk" placeholder="Nilai Matematika" value="<?php echo $mtk ?>">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Rata-rata Raport</label>
                                                            <input type="text" class="form-control" name="raport" id="raport" placeholder="Rata-rata Raport" value="<?php echo $raport ?>">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <br>
                                                            <button type="submit" id="submit" method="post" class="btn btn-primary btn-block"><i class="fa fa-save"></i> SAVE</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                            <br><center>
                                                            </center>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                  
                        </div>      
                    </div>
                </div>      
            </section>

            <!-- /Section: intro -->

            <!-- Section: boxes -->
            <section id="boxes" class="home-section paddingtop-80">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-bank fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Teknik Gambar Bangunan</h4>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-book fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Teknik Komputer dan Jaringan</h4>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">
                                    <i class="fa fa-camera-retro fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Multimedia</h4>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="
                                     box text-center">

                                    <i class="fa fa-group fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Busana Butik</h4>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">
                                    <i class="fa fa-bicycle fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Teknik Kendaraan Ringan</h4>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5><?php echo $_SESSION['smk'] ?></h5>
                                        <p>
                                            <?php echo $_SESSION['motto'] ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>SMK Contact</h5>
                                        <p>
                                        </p>
                                        <ul>
                                            <li>
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                                </span> <?php echo $_SESSION['jam'] ?>
                                            </li>
                                            <li>
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                                </span> <?php echo $_SESSION['telp'] ?>
                                            </li>
                                            <li>
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                                </span> <?php echo $_SESSION['email'] ?>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5><?php echo $_SESSION['smk'] ?> location</h5>
                                        <p><?php echo $_SESSION['alamat'] ?></p>     

                                    </div>
                                </div>
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>Follow us</h5>
                                        <ul class="company-social">
                                            <li class="social-facebook"><a href="<?php echo $_SESSION['fb'] ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-twitter"><a href="<?php echo $_SESSION['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li class="social-google"><a href="<?php echo $_SESSION['email'] ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="social-google"><a href="<?php echo $_SESSION['ig'] ?>"><i class="fa fa-instagram"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="sub-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="text-left">
                                            <p>&copy;Copyright 2018. Medicio - Developed by Dwiki Likuisa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                                        <div class="text-right">

                                        </div>
                                        <!-- 
                                            All links in the footer should remain intact. 
                                            Licenseing information is available at: http://bootstraptaste.com/license/
                                            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                                        -->
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </footer>

        </div>
        
        <!-- Modal Daftar-->
        <div class="modal fade" id="ModalMu" role="dialog">
            <div class="modal-dialog">
                <br><br><br><br>
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <center><h4>Pengaturan Akun</h4></center>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                  <form role="form" method="post" action="aksiakun.php">
                    <div class="form-group" method="post">
                        <div class="col-md-3">
                         <label for="noinduk"><i class="fa fa-edit"></i> No Induk</label>  
                         <input type="text" disabled="yes" class="form-control" name="noinduk" id="noinduk" value="<?php echo $noinduk; ?>"> 
                        </div>
                        <div class="col-md-9">
                          <label for="username"><i class="fa fa-mortar-board"></i> Nama Lengkap</label>
                          <input type="text" disabled="yes" class="form-control" name="nama" id="nama" value="<?php echo $nm; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group" method="post">
                      <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                      <input type="text" disabled="yes" class="form-control" name="username" id="username" value="<?php echo $usr; ?>">
                    </div></div>
                    <div class="col-md-12">
                    <div class="form-group" method="post">
                      <label for="password"><span class="glyphicon glyphicon-eye-close"></span> New Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div></div>
                    <div class="col-md-12">
                    <div class="form-group" method="post">
                      <label for="repassword"><span class="glyphicon glyphicon-eye-close"></span> Re-enter New Password</label>
                      <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Re-enter password">
                    </div></div>
                    <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" method='post'>
                                <i class="fa fa-save"></i> Save
                            </button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">
                                <i class="fa fa-sign-out"></i> Cancel
                            </button>
                        </div>
                  </form>     
                </div>
              </div>  
            </div>
          </div> 
        </div>
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
        
        <!-- Core JavaScript Files -->
        <script src="../../js/jquery.min.js"></script>     
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery.easing.min.js"></script>
        <script src="../../js/wow.min.js"></script>
        <script src="../../js/jquery.scrollTo.js"></script>
        <script src="../../js/jquery.appear.js"></script>
        <script src="../../js/stellar.js"></script>
        <script src="../../plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <script src="../../js/owl.carousel.min.js"></script>
        <script src="../../js/nivo-lightbox.min.js"></script>
        <script src="../../js/custom.js"></script>


    </body>

</html>
