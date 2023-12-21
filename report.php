<?php
include "proses/connect.php";

date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_pesanan.*,tb_transaksi.*, nama, SUM(harga*jumlah) AS harganya FROM tb_pesanan
    LEFT JOIN tb_user ON tb_user.id = tb_pesanan.pegawai
    LEFT JOIN tb_list_pesanan ON tb_list_pesanan.kode_pesan = tb_pesanan.id_pesan
    LEFT JOIN tb_daftar_layanan ON tb_daftar_layanan.id_layanan = tb_list_pesanan.layanan
    JOIN tb_transaksi ON tb_transaksi.id_bayar = tb_pesanan.id_pesan
    GROUP BY id_pesan ORDER BY waktu_pesan ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu")
?>


<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">Report</h3>
            <div class="d-flex justify-content-center align-item-center gap-0">
                <div class="line-border shadow-sm"></div>
                <div class="line-border-bold bg-success shadow-sm"></div>
                <div class="line-border shadow-sm"></div>
            </div>
        </div>
    </div>
</section>




        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data order tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                <?php
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu pesan</th>
                                <th scope="col">Waktu Bayar</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Pegawai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td><?php echo $row['id_pesan'] ?></td>
                                    <td><?php echo $row['waktu_pesan'] ?></td>
                                    <td><?php echo $row['waktu_bayar'] ?></td>
                                    <td><?php echo $row['pelanggan'] ?></td>
                                    <td><?php echo number_format((int)$row['harganya'], 0, ',', '.') ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=pesanlayanan&pesanan=<?php echo $row['id_pesan'] . "&pelanggan=" . $row['pelanggan'] ?>"><i class="bi bi-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
