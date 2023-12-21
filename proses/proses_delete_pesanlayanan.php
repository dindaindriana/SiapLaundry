<?php
include "connect.php";

$id_list_pesanan = (isset($_POST['id_list_pesanan'])) ?  htmlentities($_POST['id_list_pesanan']) : "";
$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['delete_pesanlayanan_validate'])) {
        $query = mysqli_query($conn, "DELETE FROM tb_list_pesanan WHERE id_list_pesanan='$id_list_pesanan'");
        if ($query) {
            $message = '<script> alert ("Data berhasil dihapus");
            window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
        } else {
            $message = '<script> alert ("Data gagal dihapus");
            window.location="../?x=pesanlayanan&pesanan='.$kode_pesan.'&pelanggan='.$pelanggan.'"</script>';
        }
    }
echo $message;
