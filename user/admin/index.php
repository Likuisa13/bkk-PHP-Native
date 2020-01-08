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

        <!-- boxed bg -->../..
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
                            <li class="active"><a href="#intro">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Master Data<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="kelolaperusahaan.php">Data perusahaan</a></li>
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


            <!-- Section: intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h2 class="h-ultra">Portal Admin BKK "<?php echo $_SESSION['bkk'] ?>"</h2>
                                    <h3 class="h-ultra"><?php echo $_SESSION['smk'] ?></h3>
                                </div>
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h5 class="h-light"><b><?php echo $_SESSION['motto'] ?></b></h5>
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
