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
                $('#idku').val('0');
                $('#nama').val('');
                $('#tempat').val('');
                $('#tgl').val('');
                $('#jk').val('');
                $('#alamat').val('');
                $('#desa').val('');
                $('#sekolah').val('');
                $('#jurusan').val('');
                $('#hp').val('');
                $('#email').val('');
                $('#agama').val('');
                $('#tb').val('');
                $('#bb').val('');
                $('#mtk').val('');
                $('#raport').val('');
                $('#provinsi').val('');
                $('#kabupaten').val('');
                $('#kecamatan').val('');
                $('#proc').val('input');
                $('#tombol').text(' save');
                $('#ModalKu').modal('show');                
            }   
            function showModalDel(id,nm) {
                $('#iddel').val(id);
                $('#nmusr').text(nm);
                $('#ModalDel').modal('show');                
            }  
            function showModalEdt(id,nm,tm,tgl,jk,alt,ds,sek,jur,hp,em,ag,tb,bb,mtk,rpt,prov,kab,kec) {
                $('#idku').val(id);
                $('#nama').val(nm);
                $('#tempat').val(tm);
                $('#tgl').val(tgl);
                $('#jk').val(jk);
                $('#alamat').val(alt);
                $('#desa').val(ds);
                $('#sekolah').val(sek);
                $('#jurusan').val(jur);
                $('#hp').val(hp);
                $('#email').val(em);
                $('#agama').val(ag);
                $('#tb').val(tb);
                $('#bb').val(bb);
                $('#mtk').val(mtk);
                $('#raport').val(rpt);
                $('#provinsi').val(prov);
                $('#kabupaten').val(kab);
                $('#kecamatan').val(kec);
                $('#proc').val('edit');
                $('#tombol').text(' update');
                $('#ModalKu').modal('show');                
            }  
        </script>
        <?php
        $dao = new Dao();
        $cari = '';
        $result = $dao->readCanaker();
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
                                    <li><a href="kelolalowongan.php">Data lowongan</a></li>
                                    <li class="active"><a href="kelolacanaker.php">Data canaker</a></li>
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
                        <h4><center><b>DATA CALON TENAGA KERJA</b></center></h4>
                            <div class="col-lg-12">
                                <div class="form-wrapper">
                                    <div class="wow" data-wow-duration="2s" data-wow-delay="0.2s">
                                        <div class="row" >
                                                    <div class="col-lg-9">
                                                        <a href="JavaScript:showModalKu();"><button type="button" class="btn btn-success" onclick="">
                                                            <i class="fa fa-plus-circle"></i> Add
                                                        </button></a>
                                                        <a href="printcanaker.php"><button type="button" class="btn btn-warning">
                                                            <i class="fa fa-print"></i> Print
                                                        </button></a>
                                                        <a href="excelcanaker.php"><button type="button" class="btn btn-info">
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
                                                            <th><center>NAMA LENGKAP</center></th>
                                                            <th><center>TEMPAT LAHIR</center>
                                                            <th><center>TGL LAHIR</center></th>
                                                            <th><center>ALAMAT</center></th>
                                                            <th><center>JENIS KELAMIN</center></th>
                                                            <th><center>ASAL SEKOLAH</center></th>
                                                            <th><center>JURUSAN</center>
                                                            <th><center>AGAMA</center></th>
                                                            <th><center>EMAIL</center>
                                                            <th><center>TELEPON</center></th>
                                                            <th><center>TINGGI BADAN</center></th>
                                                            <th><center>BERAT BADAN</center></th>
                                                            <th><center>NILAI MTK</center></th>
                                                            <th><center>RATA RAPORT</center></th>
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
                                                                <td><?php echo $value['nama_lengkap']; ?></td>
                                                                <td><?php echo $value['tempat_lahir']; ?></td>
                                                                <td><?php echo $value['tgl_lahir']; ?></td>
                                                                <td><?php echo $value['alamat'],', ',$value['nama_desa'],', ',$value['nama_kec']
                                                                    ,', ',$value['nama_kab'],', ',$value['nama_prov']; ?></td>
                                                                <td><?php echo $value['jenis_kelamin']; ?></td>
                                                                <td><?php echo $value['asal_sekolah']; ?></td>
                                                                <td><?php echo $value['jurusan']; ?></td>
                                                                <td><?php echo $value['agama']; ?></td>
                                                                <td><?php echo $value['email']; ?></td>
                                                                <td><?php echo $value['no_telp']; ?></td>
                                                                <td><?php echo $value['tinggi_badan']; ?></td>
                                                                <td><?php echo $value['berat_badan']; ?></td>
                                                                <td><?php echo $value['nilai_mtk']; ?></td>
                                                                <td><?php echo $value['rata_raport']; ?></td>
                                                                <td nowrap>
                                                                    <button type="button" onclick="showModalEdt(<?php echo $value['id_canaker']; ?>,'<?php echo $value['id_user']; ?>'
                                                                    ,'<?php echo $value['tempat_lahir']; ?>','<?php echo $value['tgl_lahir']; ?>'
                                                                    ,'<?php echo $value['jenis_kelamin']; ?>','<?php echo $value['alamat']; ?>'
                                                                    ,'<?php echo $value['kode_desa']; ?>','<?php echo $value['asal_sekolah']; ?>'
                                                                    ,'<?php echo $value['jurusan']; ?>','<?php echo $value['no_telp']; ?>'
                                                                    ,'<?php echo $value['email']; ?>','<?php echo $value['agama']; ?>'
                                                                    ,'<?php echo $value['berat_badan']; ?>','<?php echo $value['tinggi_badan']; ?>'
                                                                    ,'<?php echo $value['nilai_mtk']; ?>','<?php echo $value['rata_raport']; ?>'
                                                                    ,'<?php echo $value['kode_prov']; ?>','<?php echo $value['kode_kab']; ?>'
                                                                    ,'<?php echo $value['kode_kec']; ?>');" class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-paint-brush"></i> Edit
                                                                    </button>
                                                                    <button type="button" onclick="showModalDel(<?php echo $value['id_canaker']; ?>,'<?php echo $value['nama_lengkap']; ?>');" class="btn btn-danger btn-sm">
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
                                Data Calon Tenaga Kerja</center>
                            </h5>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" method="post" action="executecanaker.php">
                        <div class="col-lg-13">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="idku" id="idku">
                                    <input type="hidden" name="proc" id="proc">
                                    <label>Nama Lengkap</label>
                                    <select class="form-control" name="nama" id="nama">
                                    <?php
                                    $user = $dao->readAkunUser();
                                    $i = 1;
                                    foreach ($user as $value) {
                                    ?>
                                        <option value="<?php echo $value['id_user']?>"><?php echo $value['no_induk']," - ",$value['nama_lengkap']; ?></option>
                                    <?php
                                    $i++;
                                    }
                                    ?>    
                                  </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir">
                                </div>
                                <div class="col-sm-4">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Lahir">
                                </div>
                                <div class="col-sm-4">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" value="">
                                        <option>L</option>
                                        <option>P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" >
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="">Pilih Provinsi...</option>
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
                                    <option value="">Pilih Kabupaten/Kota...</option>
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
                                    <option value="">Pilih Kecamatan...</option>
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
                                    <option value="">Pilih Desa...</option>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Asal Sekolah</label>
                                    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Asal Sekolah">
                                </div>
                                <div class="col-sm-6">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nomor HP</label><input type="text" class="form-control" name="hp" id="hp" placeholder="Nomor HP">
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <input type="Email" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama" value="">
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
                                    <input type="text" class="form-control" name="tb" id="tb" placeholder="Tinggi Badan">
                                </div>
                                <div class="col-sm-4">
                                    <label>Berat Badan (kg)</label>
                                    <input type="text" class="form-control" name="bb" id="bb" placeholder="Berat Badan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nilai Matematika</label>
                                    <input type="text" class="form-control" name="mtk" id="mtk" placeholder="Nilai Matematika">
                                </div>
                                <div class="col-sm-6">
                                    <label>Rata-rata Raport</label>
                                    <input type="text" class="form-control" name="raport" id="raport" placeholder="Rata-rata Raport">
                                </div>
                            </div>
                        </div>                        
                        </div>     
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" method="post">
                                <i class="fa fa-save"></i> <font id="tombol"></font> 
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
                                Delete Data Canaker</center>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <p style="color: red; font-size: larger;text-align: center">Yakin hapus data berikut ?</p>
                            <h3 id="nmusr" style="text-align: center; color: #d9534f"></h3>
                            <form role="form" method="post" action="executecanaker.php">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="hidden" name="idku" id="iddel">
                                            <input type="hidden" name="proc" value="usrdel">
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
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    </body>

</html>
