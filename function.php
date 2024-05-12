<?php

class klas_airpam{
    function koneksi()
    {
        $koneksi=mysqli_connect("localhost","user_airpam","#Us3erA1r_P4M_2024123","air pam");
        return $koneksi;
    }

    function level($sesi_user)
    {
        $q=mysqli_query($this->koneksi(), "SELECT LEVEL FROM user WHERE USERNAME='$sesi_user'");
        $d=mysqli_fetch_row($q);
        return $d[0];
    }

    function data_user($sesi_user)
    {
        $q=mysqli_query($this->koneksi(), "SELECT NIK,NAMA,KOTA,LEVEL FROM user WHERE USERNAME='$sesi_user'");
        $d=mysqli_fetch_row($q);
        return $d;
    }
}
?>