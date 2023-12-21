<?php
include "connect.php";

$id_layanan = (isset($_POST['id_layanan'])) ?  htmlentities($_POST['id_layanan']) : "";

if(!empty($_POST['hapus_daftarlayanan_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_daftar_layanan WHERE id_layanan='$id_layanan'");
    if($query){
        $message = '<script> alert ("Data berhasil dihapus");
        window.location="../daftarlayanan"</script>';
    }else{
        $message = '<script> alert ("Data gagal dihapus");
        window.location="../daftarlayanan"</script>';
    }
}echo $message
?>
