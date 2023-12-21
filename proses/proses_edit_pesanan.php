<?php
session_start();
include "connect.php";

$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ?  htmlentities($_POST['pelanggan']) : "";

if(!empty($_POST['edit_pesanan_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_pesanan SET  pelanggan='$pelanggan' WHERE id_pesan = '$kode_pesan'");
        if($query){
            $message = '<script> alert ("Data berhasil dimasukkan");
            window.location="../pesanan"</script>';
        }else{
            $message = '<script> alert ("Data gagal dimasukkan");
            window.location="../pesanan"</script>';
        }
}echo $message;
?>
