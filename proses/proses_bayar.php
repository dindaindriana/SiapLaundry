<?php
session_start();
include "connect.php";

$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";
$total = (isset($_POST['total'])) ?  htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ?  htmlentities($_POST['uang']) : "";
$kembalian = $uang - $total;

if (!empty($_POST['bayar_validate'])) {
    if ($kembalian < 0) {
        $message = '<script> alert ("NOMINAL UANG TIDAK MENCUKUPI");
        window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
    } else {
            $query = mysqli_query($conn, "INSERT INTO tb_transaksi (id_bayar, nominal_uang, total_bayar) values ('$kode_pesan','$uang','$total')");
            if ($query) {
                $message = '<script> alert ("Pembayara Berhasil \nUang Kembalian Rp. '.$kembalian.'");
                window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
            } else {
                $message = '<script> alert ("Pembayara Gagal");
                window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
            }
        }
    }
echo $message;
