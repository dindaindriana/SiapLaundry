<?php
include "connect.php";

// Isset itu sama dengan gini
// PHP, jika ada di kirimkan id dari form menggunakan method POST maka htmlentities, jika tidak maka kosongkan
$id_layanan = (isset($_POST['id_layanan'])) ? htmlentities($_POST['id_layanan']) : "";
$kategori_layanan = (isset($_POST['kategori_layanan'])) ?  htmlentities($_POST['kategori_layanan']) : "";
$harga = (isset($_POST['harga'])) ?  htmlentities($_POST['harga']) : "";
$jenis_satuan = (isset($_POST['jenis_satuan'])) ?  htmlentities($_POST['jenis_satuan']) : "";

if (!empty($_POST['edit_daftarlayanan_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_layanan FROM tb_daftar_layanan WHERE kategori_layanan = '$kategori_layanan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script> alert ("Layanan menu yang dimasukkan sudah ada");
        window.location="../daftarlayanan"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_daftar_layanan SET jenis_satuan='$jenis_satuan', kategori_layanan='$kategori_layanan',harga='$harga'  WHERE id_layanan ='$id_layanan'");
        if ($query) {
            $message = '<script> alert ("Data berhasil diupdate");
        window.location="../daftarlayanan"</script>';
        } else {
            $message = '<script> alert ("Data gagal diupdate");
        window.location="../daftarlayanan"</script>';
        }
    }
}
echo $message;
?>
