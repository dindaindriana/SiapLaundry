<?php
session_start();
include "connect.php";

$id_list_pesanan = (isset($_POST['id_list_pesanan'])) ?  htmlentities($_POST['id_list_pesanan']) : "";
$catatan = (isset($_POST['catatan'])) ?  htmlentities($_POST['catatan']) : "";

if(!empty($_POST['selesai_pesanlayanan_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_list_pesanan SET catatan='$catatan', status=2 WHERE id_list_pesanan='$id_list_pesanan'");
        if($query){
            $message = '<script> alert ("Pesanan selesai");
            window.location="../kelola"</script>';
        }else{
            $message = '<script> alert ("Gagal");
            window.location="../kelola"</script>';
        }
}echo $message;
?>
