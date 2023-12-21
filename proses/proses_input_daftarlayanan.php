<?php
include "connect.php";

$jenis_satuan = (isset($_POST['jenis_satuan'])) ?  htmlentities($_POST['jenis_satuan']) : "";
$kategori_layanan = (isset($_POST['kategori_layanan'])) ?  htmlentities($_POST['kategori_layanan']) : "";
$harga = (isset($_POST['harga'])) ?  htmlentities($_POST['harga']) : "";

if(!empty($_POST['input_daftarlayanan_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_layanan FROM tb_daftar_layanan WHERE kategori_layanan = '$kategori_layanan'");
    if(mysqli_num_rows($select)>0){
        $message = '<script> alert ("Layanan yang dimasukkan sudah ada");
        window.location="../daftarlayanan"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_daftar_layanan (jenis_satuan, kategori_layanan, harga) values ('$jenis_satuan','$kategori_layanan', '$harga')");
        if($query){
            $message = '<script> alert ("Data berhasil dimasukkan");
            window.location="../daftarlayanan"</script>';
        }else{
            $message = '<script> alert ("Data gagal dimasukkan");
            window.location="../daftarlayanan"</script>';
        }
    }
}echo $message;
?>
