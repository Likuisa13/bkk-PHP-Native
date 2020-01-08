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
                $('#perusahaan').val('');
                $('#posisi').val('');
                $('#tglbuka').val('');
                $('#tgltutup').val(''); 
                $('#biaya').val('');                
                $('#deskripsi').val('');
                $('#persyaratan').val('');
                $('#proc').val('input');
                $('#tombol').text(' save');
                $('#ModalKu').modal('show');                
            }   
            function showModalDel(id,nm) {
                $('#iddel').val(id);
                $('#nmusr').text(nm);
                $('#proc').val('delete');
                $('#ModalDel').modal('show');                
            }  
            function showModalEdt(id,nm,pos,bk,ttp,biaya,des,sya) {
                $('#idku').val(id);
                $('#perusahaan').val(nm);
                $('#posisi').val(pos);
                $('#tglbuka').val(bk);
                $('#tgltutup').val(ttp); 
                $('#biaya').val(biaya);                
                $('#deskripsi').val(des);
                $('#persyaratan').val(sya);
                $('#proc').val('edit');
                $('#tombol').text(' update');
                $('#ModalKu').modal('show');                
            }  
        </script>
        <?php
        $dao = new Dao();
        $cari = '';
        $result = $dao->readDataLowongan();
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
                                    <li><a href="kelolaperusahaan.php">Data perusahaan</a></li>
                                    <li class="active"><a href="kelolalowongan.php">Data lowongan</a></li>
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
                        <h4><center><b>DATA LOWONGAN</b></center></h4>
                            <div class="col-lg-12">
                                <div class="form-wrapper">
                                    <div class="wow" data-wow-duration="2s" data-wow-delay="0.2s">
                                        <div class="row" >
                                                    <div class="col-lg-9">
                                                        <a href="JavaScript:showModalKu();"><button type="button" class="btn btn-success" onclick="">
                                                            <i class="fa fa-plus-circle"></i> Add
                                                        </button></a>
                                                        <a href="printlowongan.php"><button type="button" class="btn btn-warning">
                                                            <i class="fa fa-print"></i> Print
                                                        </button></a>
                                                        <a href="excellowongan.php"><button type="button" class="btn btn-info">
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
                                                            <th><center>NAMA PERUSAHAAN</center></th>
                                                            <th><center>POSISI</center>
                                                            <th><center>TGL BUKA</center></th>
                                                            <th><center>TGL TUTUP</center></th>
                                                            <th><center>BIAYA</center></th>
                                                            <th><center>DESKRIPSI</center></th>
                                                            <th><center>PERSYARATAN</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="userlist">
                                                        <?php
                                                        $i = 1;
                                                        foreach ($result as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $value['nama_perusahaan']; ?></td>
                                                                <td><?php echo $value['posisi']; ?></td>
                                                                <td><?php echo $value['tgl_buka']; ?></td>
                                                                <td><?php echo $value['tgl_tutup']; ?></td>
                                                                <td><?php echo 'Rp ', $value['biaya_pendaftaran']; ?></td>
                                                                <td><?php echo $value['deskripsi']; ?></td>
                                                                <td><?php echo $value['persyaratan']; ?></td>
                                                                <td nowrap>
                                                                    <button type="button" onclick="showModalEdt(<?php echo $value['id_lowongan']; ?>
                                                                    ,'<?php echo $value['id_perusahaan']; ?>','<?php echo $value['posisi']; ?>'
                                                                    ,'<?php echo $value['tgl_buka']; ?>','<?php echo $value['tgl_tutup']; ?>'
                                                                    ,'<?php echo $value['biaya_pendaftaran']; ?>','<?php echo $value['deskripsi']; ?>'
                                                                    ,'<?php echo $value['persyaratan']; ?>');" class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-paint-brush"></i> Edit
                                                                    </button>
                                                                    <button type="button" onclick="showModalDel(<?php echo $value['id_lowongan']; ?>,'<?php echo $value['nama_perusahaan']; ?>');" class="btn btn-danger btn-sm">
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

            <!-- Modal Insert -->
             <div class="modal fade" id="ModalKu" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="ModalLabel01"><center>
                                Data Lowongan</center>
                            </h5>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                          <form role="form" method="post" action="executelowongan.php">
                            <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                  <input type="hidden" name="idku" id="idku">              
                                  <input type="hidden" name="proc" id="proc">
                                  <label><span class="fa fa-user"></span> Nama Perusahaan</label>
                                  <select class="form-control" name="perusahaan" id="perusahaan">
                                    <?php
                                    $perusahaan = $dao->readPerusahaan();
                                    $i = 1;
                                    foreach ($perusahaan as $value) {
                                        $nama = $value['nama_perusahaan'];
                                      ?>
                                        <option value="<?php echo $value['id_perusahaan']?>"><?php echo $value['nama_perusahaan']?></option>
                                      <?php
                                      $i++;
                                      }
                                    ?>  
                                  </select>
                                </div>
                            </div>    
                            <div class="col col-md-6">
                                <div class="form-group">
                                  <label><span class="fa fa-globe"></span> Posisi</label>
                                  <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi">
                                </div>   
                            </div>
                            </div>
                            <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                  <label><span class="fa fa-calendar"></span> Tanggal Buka</label>
                                  <input type="date" class="form-control" name="tglbuka" id="tglbuka">
                                </div>
                            </div>    
                                <div class="col col-md-6">
                                <div class="form-group">
                                  <label><span class="fa fa-calendar-o"></span> Tanggal Tutup</label>
                                  <input type="date" class="form-control" name="tgltutup" id="tgltutup">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                  <label><span class="fa fa-globe"></span> Biaya Pendaftaran</label>
                                  <input class="form-control" type="text" name="biaya" id="biaya" placeholder="Biaya Pendaftaran">
                                </div>
                            </div>    
                                <div class="col col-md-6">
                                
                            </div>
                            </div>
                            <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                  <label><span class="fa fa-globe"></span> Deskripsi</label>
                                  <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                  <label><span class="fa fa-globe"></span> Persyaratan</label>
                                  <textarea class="form-control" rows="5" id="persyaratan" name="persyaratan" placeholder="Persyaratan"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>     
                        <div class="modal-footer">
                            <button  class="btn btn-success" method="post" type="submit">
                                <i class="fa fa-save"></i><font id="tombol"></font>
                            </button>
                            <button class="btn btn-primary" type="button" data-dismiss="modal">
                                <i class="fa fa-undo"></i> Clear
                            </button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">
                                <i class="fa fa-sign-out"></i> Cancel
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Of Modal Insert -->
            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-danger">
                            <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="ModalLabel01"><center>
                                Delete Data Perusahaan</center>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <p style="color: red; font-size: larger;text-align: center">Yakin hapus data berikut ?</p>
                            <h3 id="nmusr" style="text-align: center; color: #d9534f"></h3>
                            <form role="form" method="post" action="executelowongan.php">
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
                            <button  class="btn btn-danger" type="submit" method="post">
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
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    </body>

</html>