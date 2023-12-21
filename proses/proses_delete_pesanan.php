<?php
include "connect.php";

$kode_pesan = (isset($_POST['kode_pesan'])) ?  htmlentities($_POST['kode_pesan']) : "";

if (!empty($_POST['delete_pesanan_validate'])) {
    $select = mysqli_query($conn, "SELECT kode_pesan FROM tb_list_pesanan WHERE kode_pesan ='$kode_pesan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script> alert ("Order telah memiliki item order, data order ini tidak dapat dihapus");
        window.location="../order"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_pesanan WHERE id_pesan='$kode_pesan'");
        if ($query) {
            $message = '<script> alert ("Data berhasil dihapus");
        window.location="../order"</script>';
        } else {
            $message = '<script> alert ("Data gagal dihapus");
        window.location="../order"</script>';
        }
    }
}
echo $message;
