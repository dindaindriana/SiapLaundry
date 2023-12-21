<?php
session_start();
include "connect.php";

$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";

if(!empty($_POST['input_pesanan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE id_pesan = '$kode_pesan'");
    if(mysqli_num_rows($select)>0){
        $message = '<script> alert ("Order yang dimasukkan sudah ada");
        window.location="../pesanan"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_pesanan (id_pesan, pelanggan, pegawai) values ('$kode_pesan', '$pelanggan',  '$_SESSION[id_siaplaundry]')");
        if($query){
            $message = '<script> alert ("Data berhasil dimasukkan");
            window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
        }else{
            $message = '<script> alert ("Data gagal dimasukkan")</script>';
        }
    }
}echo $message;
?>
