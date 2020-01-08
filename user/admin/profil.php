<?php 
    session_start();
    if (empty($_SESSION['username']) || $_SESSION['level'] == 2) {
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Master Data<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="active"><a href="kelolaperusahaan.php">Data perusahaan</a></li>
                                    <li><a href="kelolalowongan.php">Data lowongan</a></li>
                                    <li><a href="kelolacanaker.php">Data canaker</a></li>
                                    <li><a href="kelolapendaftaran.php">Data Pendaftaran</a></li>
                                    <li><a href="kelolahasilseleksi.php">Data Hasil seleksi</a></li>
                                    <li><a href="kelolaalamat.php">Data alamat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Profil<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profil.php">profil bkk</a></li>
                                    <li><a href="kelolauser.php">Data akun</a></li>
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
            $result = $dao->readProfil();
            $smk = '';
            $bkk = '';
            $motto = '';
            $alamat = '';
            $telp = '';
            $email = '';
            $fb = '';
            $ig = '';
            $twitter = '';
            $jam = '';
            $i = 1;
            foreach ($result as $value) {
                $smk = $value['nama_smk'];
                $bkk = $value['nama_bkk'];
                $motto = $value['motto'];
                $alamat = $value['alamat'];
                $telp = $value['no_telp'];
                $email = $value['email'];
                $fb = $value['fb'];
                $ig = $value['ig'];
                $twitter = $value['twitter'];
                $jam = $value['jam_kerja'];
              $i++;
              }
            ?>
            <!-- Section: intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                        <h5 class="h-light"><b><center>PROFIL BKK SMK NEGERI 1 BUKATEJA</center></b></h5>
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
                                                <form role="form" method="post" action="executeprofil.php">
                                                    <div class="col-lg-13">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label>Nama SMK</label>
                                                            <input type="text" class="form-control" name="smk" id="smk" placeholder="Nama SMK" value="<?php echo $smk ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Nama BKK SMK</label>
                                                            <input type="text" class="form-control" name="bkk" id="bkk" placeholder="Nama BKK SMK" value="<?php echo $bkk ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Motto/Slogan</label>
                                                            <input type="text" class="form-control" name="motto" id="motto" placeholder="Motto" value="<?php echo $motto ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>No Telepon</label>
                                                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon" value="<?php echo $telp ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $email ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Facebook</label>
                                                            <input type="text" class="form-control" name="fb" id="fb" placeholder="Facebook" value="<?php echo $fb ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Instagram</label>
                                                            <input type="text" class="form-control" name="ig" id="ig" placeholder="Instagram" value="<?php echo $ig ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Twitter</label>
                                                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter ?>">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Jam Kerja</label>
                                                            <input type="text" class="form-control" name="jam" id="jam" placeholder="Jam Kerja" value="<?php echo $jam ?>">
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-13">
                                                            <br class="form-control">
                                                            <button type="submit" id="submit" method="post" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> update</button>
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
