<?php
session_start();
include "connect.php";

$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ?  htmlentities($_POST['catatan']) : "";
$layanan = (isset($_POST['layanan'])) ?  htmlentities($_POST['layanan']) : "";
$jumlah = (isset($_POST['jumlah'])) ?  htmlentities($_POST['jumlah']) : "";

if(!empty($_POST['input_pesanlayanan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_pesanan WHERE layanan = '$layanan' && kode_pesan='$kode_pesan'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script> alert ("Layanan yang dimasukkan sudah ada");
        window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_list_pesanan (layanan,kode_pesan,jumlah,catatan) values ('$layanan','$kode_pesan','$jumlah','$catatan')");
        if($query){
            $message = '<script> alert ("Data berhasil dimasukkan");
            window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
        }else{
            $message = '<script> alert ("Data gagal dimasukkan");
            window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
        }
    }
}echo $message;
?>
