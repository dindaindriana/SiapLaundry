<?php
session_start();
include "connect.php";

$id_list_pesanan = (isset($_POST['id_list_pesanan'])) ?  htmlentities($_POST['id_list_pesanan']) : "";
$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ?  htmlentities($_POST['catatan']) : "";
$layanan = (isset($_POST['layanan'])) ?  htmlentities($_POST['layanan']) : "";
$jumlah = (isset($_POST['jumlah'])) ?  htmlentities($_POST['jumlah']) : "";

if(!empty($_POST['edit_pesanlayanan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_pesanan WHERE layanan = '$layanan' && kode_pesan='$kode_pesan' && id_list_pesanan != $id_list_pesanan");
    if(mysqli_num_rows($select)>0){
        $message = '<script> alert ("Item yang dimasukkan sudah ada");
        window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
    }else{
        $query = mysqli_query($conn, "UPDATE tb_list_pesanan SET layanan='$layanan',jumlah='$jumlah',catatan='$catatan' WHERE id_list_pesanan='$id_list_pesanan'");
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
