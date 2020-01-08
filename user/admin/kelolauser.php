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
        <!--link id="bodybg" href="../../bodybg/bg1.css" rel="stylesheet" type="text/css" /-->
        <!-- template skin -->
        <link id="t-colors" href="../../color/default.css" rel="stylesheet">
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
        <script>
            function showModalKu() {
                $('#idku').val(0);
                $('#noinduk').val('');
                $('#nama').val('');
                $('#username').val('');
                $('#password').val('');
                $('#repassword').val('');                
                $('#level').val('');
                $('#proc').val('input');
                $('#tombol').text(' save');
                $('#ModalAkun').modal('show');                
            }   
            function showModalDel(id,nm) {
                $('#iddel').val(id);
                $('#nmusr').text(nm);
                $('#ModalDel').modal('show');                
            }  
            function showModalEdt(id,no,nm,usr,pas,lvl) {
                $('#idku').val(id);
                $('#noinduk').val(no);
                $('#nama').val(nm);
                $('#username').val(usr);
                $('#password').val(pas);
                $('#repassword').val(pas);                
                $('#level').val(lvl);
                $('#proc').val('edit');
                $('#tombol').text(' update');
                $('#ModalAkun').modal('show');                
            }  
        </script>
        <?php
        $dao = new Dao();
        $cari = '';
        $result = $dao->readAkunKu();
        ?>
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

            <!-- Section: intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="container">
                        <h4><center><b>DATA AKUN</b></center></h4>
                            <div class="col-lg-12">
                                <div class="form-wrapper">
                                    <div class="wow" data-wow-duration="2s" data-wow-delay="0.2s">
                                        <div class="row" >
                                                    <div class="col-lg-9">
                                                        <a href="JavaScript:showModalKu();"><button type="button" class="btn btn-success" onclick="">
                                                            <i class="fa fa-plus-circle"></i> Add
                                                        </button></a>
                                                        <a href="printuser.php"><button type="button" class="btn btn-warning">
                                                            <i class="fa fa-print"></i> Print
                                                        </button></a>
                                                        <a href="exceluser.php"><button type="button" class="btn btn-info">
                                                            <i class="fa fa-file-excel-o"></i> get excel
                                                        </button></a>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" id="cari" name="cari" placeholder="Search..." style="font-style: italic;">
                                                            <div class="input-group-btn">
                                                            <button class="btn btn-info" type="submit" method="post"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <br>
                                        <div class="well well-trans">
                                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.1s">
                                                <div class="row">
                                                <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th><center>NO</center></th>
                                                            <th><center>NO. INDUK</center></th>
                                                            <th><center>NAMA LENGKAP</center>
                                                            <th><center>USERNAME</center></th>
                                                            <th><center>PASSWORD</center></th>
                                                            <th><center>HAK AKSES</center></th>
                                                            <th><center>AKSI</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="userlist">
                                                        <?php
                                                        $i = 1;
                                                        foreach ($result as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $value['no_induk']; ?></td>
                                                                <td><?php echo $value['nama_lengkap']; ?></td>
                                                                <td><?php echo $value['username']; ?></td>
                                                                <td><?php echo $value['pasword']; ?></td>
                                                                <td><?php if ($value['level']=='1') {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo "User";
                                                                }
                                                                 ?></td>
                                                                <td nowrap>
                                                                    <button type="button" onclick="showModalEdt(<?php echo $value['id_user']; ?>
                                                                    ,'<?php echo $value['no_induk']; ?>','<?php echo $value['nama_lengkap']; ?>'
                                                                    ,'<?php echo $value['username']; ?>','<?php echo $value['pasword']; ?>'
                                                                    ,'<?php echo $value['level']; ?>');" class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-paint-brush"></i> Edit
                                                                    </button>
                                                                    <button type="button" onclick="showModalDel(<?php echo $value['id_user']; ?>,'<?php echo $value['nama_lengkap']; ?>');" class="btn btn-danger btn-sm">
                                                                        <i class="glyphicon glyphicon-trash"></i> Del 
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $i++;
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
                            </div>  
                        </div>      
                    </div>
                </div>       
            </section>
            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-danger">
                            <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="ModalLabel01"><center>
                                Delete Data Akun</center>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <p style="color: red; font-size: larger;text-align: center">Yakin hapus data berikut ?</p>
                            <h3 id="nmusr" style="text-align: center; color: #d9534f"></h3>
                            <form role="form" method="post" action="executeuser.php">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="hidden" name="idku" id="iddel">
                                            <input type="hidden" name="proc" value="">
                                        </div>                                    
                                    </div>
                                </div> 
                            </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit" method="post">
                                Delete
                            </button>
                            <button class="btn btn-info" type="button" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Of Modal Delete -->
            <!-- Modal Akun-->
        <div class="modal fade" id="ModalAkun" role="dialog">
            <div class="modal-dialog">
                <br><br><br><br>
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <center><h4>Data Akun</h4></center>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                  <form role="form" method="post" action="executeuser.php">
                    <div class="form-group" method="post">
                        <div class="col-md-3">
                            <input type="hidden" name="idku" id="idku">
                            <input type="hidden" name="proc" id="proc">
                         <label for="noinduk"><i class="fa fa-edit"></i> No Induk</label>  
                         <input type="text" class="form-control" name="noinduk" id="noinduk" placeholder="No Induk"> 
                        </div>
                        <div class="col-md-9">
                          <label for="nama"><i class="fa fa-mortar-board"></i> Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-md-7">
                    <div class="form-group" method="post">
                      <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    </div>
                    <div class="col-md-5">
                    <div class="form-group" method="post">
                      <label for="username"><span class="glyphicon glyphicon-user"></span> Hak Akses</label>
                      <select class="form-control" name="level" id="level">
                          <option value="1">Admin</option>
                          <option value="2">User</option>
                      </select> 
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group" method="post">
                      <label for="password"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div></div>
                    <div class="col-md-12">
                    <div class="form-group" method="post">
                      <label for="repassword"><span class="glyphicon glyphicon-eye-close"></span> Re-enter Password</label>
                      <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Re-enter password">
                    </div></div>
                    <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" method='post'>
                                <i class="fa fa-save"></i> <font id="tombol"></font>
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
    </body>

</html>
