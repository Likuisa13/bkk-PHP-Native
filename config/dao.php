<?php

include_once 'dbconfig.php';
class Dao {  
    var $link;
    public function __construct() {
        $this->link = new Dbconfig();
    }
    //----------------- BACA DATA PROFIL SMK ----------------------------------
    public function readProfil() {
        $query = "SELECT * FROM t_profil where id_profil = '1'";
        return mysqli_query($this->link->conn, $query);
    }
    //----------------------- BACA DATA AKUN ----------------------------------
    public function readAkunKu() {
        $query = "SELECT * FROM t_user ORDER BY level ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readAkunUser() {
        $query = "SELECT * FROM t_user WHERE level='2' ORDER BY nama_lengkap ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readAkunCanaker($username) {
        $query = "SELECT * FROM t_user WHERE username = '$username'";
        return mysqli_query($this->link->conn, $query);
    }
    //----------------------------- CEK LOG IN ----------------------------------
    public function readAkun($username,$password) {
        $query = "SELECT * FROM t_user WHERE username='$username' and pasword = PASSWORD('$password')";
        return mysqli_query($this->link->conn, $query);
    }
    //----------------------- BACA DATA ALAMAT ----------------------------------
    public function readAlamat() {
        $query = "SELECT * FROM t_desa, t_kec, t_kab, t_prov 
            WHERE t_desa.`kode_kec`=t_kec.`kode_kec` AND t_kec.`kode_kab`=t_kab.`kode_kab`
            AND t_prov.`kode_prov` = t_kab.`kode_prov`";
        return mysqli_query($this->link->conn, $query);
    }

    public function readProv() {
        $query = "SELECT * FROM t_prov";
        return mysqli_query($this->link->conn, $query);
    }

    public function readKab() {
        $query = "SELECT * FROM t_kab";
        return mysqli_query($this->link->conn, $query);
    }

    public function readKec() {
        $query = "SELECT * FROM t_kec";
        return mysqli_query($this->link->conn, $query);
    }

    public function readDes() {
        $query = "SELECT * FROM t_desa";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA PERUSAHAAN ----------------------------------
    public function readPerusahaan() {
        $query = "SELECT * FROM t_prov, t_kab, t_kec, t_desa, t_perusahaan 
            WHERE t_prov.`kode_prov`=t_kab.`kode_prov` AND t_kab.`kode_kab`=t_kec.`kode_kab` 
            AND t_kec.`kode_kec`=t_desa.`kode_kec` AND t_desa.`kode_desa`=t_perusahaan.`kode_desa` ORDER BY t_perusahaan.`id_perusahaan` ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readKodePerusahaan($nama) {
        $query = "SELECT * FROM t_perusahaan WHERE nama_perusahaan='$nama'";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA LAMARAN ----------------------------------
    public function readLamaran($username) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan, t_user, t_canaker, t_pendaftaran
    WHERE t_user.`id_user`=t_canaker.`id_user` AND t_canaker.`id_canaker`=t_pendaftaran.`id_canaker`
    AND t_perusahaan.`id_perusahaan`=t_lowongan.`id_perusahaan` AND t_lowongan.`id_lowongan`=t_pendaftaran.`id_lowongan`
    AND t_user.`username`= '$username' ORDER BY t_pendaftaran.`tgl_daftar` DESC";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA LOWONGAN ----------------------------------
    public function readDataLowongan() {
        $query = "SELECT * FROM t_lowongan, t_perusahaan
            WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan ORDER BY t_lowongan.tgl_buka ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readPosisi() {
        $query = "SELECT posisi FROM t_lowongan GROUP BY posisi ORDER BY posisi ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readFilter1($posisi) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_lowongan.posisi = '$posisi'";
        return mysqli_query($this->link->conn, $query);
    }

    public function readFilter2($posisi,$prov) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan,t_desa,t_kec,t_kab,t_prov WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_prov.kode_prov = t_kab.kode_prov AND t_kab.kode_kab = t_kec.kode_kab AND t_kec.kode_kec = t_desa.kode_kec AND t_desa.kode_desa = t_perusahaan.kode_desa AND t_lowongan.posisi = '$posisi' AND t_prov.kode_prov = '$prov'";
        return mysqli_query($this->link->conn, $query);
    }

    public function readFilter3($posisi,$kab) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan,t_desa,t_kec,t_kab,t_prov WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_prov.kode_prov = t_kab.kode_prov AND t_kab.kode_kab = t_kec.kode_kab AND t_kec.kode_kec = t_desa.kode_kec AND t_desa.kode_desa = t_perusahaan.kode_desa AND t_lowongan.posisi = '$posisi' AND t_kab.kode_kab = '$kab'";
        return mysqli_query($this->link->conn, $query);
    }

    public function readFilter4($prov) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan,t_desa,t_kec,t_kab,t_prov WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_prov.kode_prov = t_kab.kode_prov AND t_kab.kode_kab = t_kec.kode_kab AND t_kec.kode_kec = t_desa.kode_kec AND t_desa.kode_desa = t_perusahaan.kode_desa AND t_prov.kode_prov='$prov'";
        return mysqli_query($this->link->conn, $query);
    }

    public function readFilter5($kab) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan,t_desa,t_kec,t_kab,t_prov WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_prov.kode_prov = t_kab.kode_prov AND t_kab.kode_kab = t_kec.kode_kab AND t_kec.kode_kec = t_desa.kode_kec AND t_desa.kode_desa = t_perusahaan.kode_desa AND t_kab.kode_kab='$kab'";
        return mysqli_query($this->link->conn, $query);
    }

    public function readDataLowonganKu($id) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan
            WHERE t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND t_lowongan.id_lowongan='$id' ORDER BY t_lowongan.tgl_buka ASC";
        return mysqli_query($this->link->conn, $query);
    }

    public function readLowongan($today) {
        $query = "SELECT * FROM t_lowongan, t_perusahaan where t_lowongan.id_perusahaan = t_perusahaan.id_perusahaan AND tgl_tutup >= '$today'";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA CANAKER ----------------------------------
    public function readCanaker() {
        $query = "SELECT * FROM t_prov, t_kab, t_kec, t_desa,t_canaker, t_user where t_user.id_user = t_canaker.id_user AND t_prov.kode_prov=t_kab.kode_prov AND t_kab.kode_kab=t_kec.kode_kab AND t_kec.kode_kec=t_desa.kode_kec AND t_desa.kode_desa=t_canaker.kode_desa ORDER BY t_user.no_induk ASC";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA BIODATA PER ID ---------------------------
    public function readBiodata($id) {
        $query = "SELECT * FROM t_prov, t_kab, t_kec, t_desa, t_canaker, t_user where t_user.id_user = t_canaker.id_user AND t_prov.kode_prov=t_kab.kode_prov AND t_kab.kode_kab=t_kec.kode_kab AND t_kec.kode_kec=t_desa.kode_kec AND t_desa.kode_desa=t_canaker.kode_desa AND t_user.id_user='$id'";
        return mysqli_query($this->link->conn, $query);
    }

    //----------------------- BACA DATA PENDAFTARAN ------------------------------
    public function readPendaftaran($id) {
        $query = "SELECT * FROM t_pendaftaran, t_lowongan, t_perusahaan, t_canaker, t_user WHERE t_perusahaan.id_perusahaan=t_lowongan.id_perusahaan AND t_lowongan.id_lowongan = t_pendaftaran.id_lowongan AND t_pendaftaran.id_canaker = t_canaker.id_canaker AND t_canaker.id_user = t_user.id_user AND t_lowongan.id_lowongan = '$id'";
        return mysqli_query($this->link->conn, $query);
    }
    //----------------------- BACA DATA HASIL SELEKSI ----------------------------
    public function readHasilSeleksi() {
        $query = "SELECT * FROM t_perusahaan, t_lowongan, t_hasilseleksi 
        WHERE t_perusahaan.id_perusahaan = t_lowongan.id_perusahaan 
        AND t_lowongan.id_lowongan = t_hasilseleksi.id_lowongan ORDER BY t_hasilseleksi.tgl_tutup DESC";
        return mysqli_query($this->link->conn, $query);
    }
    public function readHasil($today) {
        $query = "SELECT * FROM t_perusahaan, t_lowongan, t_hasilseleksi WHERE t_perusahaan.id_perusahaan = t_lowongan.id_perusahaan 
        AND t_lowongan.id_lowongan = t_hasilseleksi.id_lowongan AND t_hasilseleksi.tgl_tutup >= '$today'";
        return mysqli_query($this->link->conn, $query);
    }
    public function execute($query) {
        $result = mysqli_query($this->link->conn, $query);
        if ($result) {
            return $result;
        }else {
            return mysqli_error($this->link->conn);
        }
         
    }
}
