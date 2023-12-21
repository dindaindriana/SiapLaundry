<?php
include "proses/connect.php";

date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_pesanan.*,tb_transaksi.*, nama, SUM(harga*jumlah) AS harganya FROM tb_pesanan
    LEFT JOIN tb_user ON tb_user.id = tb_pesanan.pegawai
    LEFT JOIN tb_list_pesanan ON tb_list_pesanan.kode_pesan = tb_pesanan.id_pesan
    LEFT JOIN tb_daftar_layanan ON tb_daftar_layanan.id_layanan = tb_list_pesanan.layanan
    LEFT JOIN tb_transaksi ON tb_transaksi.id_bayar = tb_pesanan.id_pesan
    GROUP BY id_pesan ORDER BY waktu_pesan DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu")
?>

<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">Pesanan</h3>
            <div class="d-flex justify-content-center align-item-center gap-0">
                <div class="line-border shadow-sm"></div>
                <div class="line-border-bold bg-success shadow-sm"></div>
                <div class="line-border shadow-sm"></div>
            </div>
        </div>
    </div>
</section>

<div class="col-lg-12 mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col d-flex justify-content-start">
                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambahPesanan"> Tambah Pesanan</button>
            </div>
        </div>

        <!-- Modal Tambah Order -->
        <div class="modal fade" id="ModalTambahPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_pesanan.php" method="POST">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="uploadfoto" name="kode_pesan" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                        <label for="uploadfoto">Kode Pesanan</label>
                                        <div class="invalid-feedback">
                                            Masukkan Kode Pesanan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required>
                                        <label for="pelanggan">Nama Pelanggan</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Pelanggan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success" name="input_pesanan_validate" value="12345">Buat Pesanan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Order End -->

        <?php
        if (empty($result)) {
            echo "Data order tidak ada";
        } else {
            foreach ($result as $row) {
        ?>

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_pesan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pesanan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_pesanan.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <input readonly type="text" class="form-control" id="uploadfoto" name="kode_pesan" value="<?php echo  $row['id_pesan'] ?>" readonly>
                                                <label for="uploadfoto">Kode Pesanan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Pesanan.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" value="<?php echo  $row['pelanggan'] ?>" required>
                                                <label for="pelanggan">Nama Pelanggan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pelanggan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="edit_pesanan_validate" value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit End -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_pesan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_pesanan.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_pesan'] ?>" name="kode_pesan">
                                    <div class="modal-footer">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus pesanan atas nama <b><?php echo $row['pelanggan'] ?></b> dengan kode order <b><?php echo $row['id_pesan'] ?></b>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_pesanan_validate" value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete End -->

            <?php
            }
            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Order</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Pegawai</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Waktu Order</th>
                            <th scope="col">Status</th>
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
                                <td><?php echo $row['pelanggan'] ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo number_format((int)$row['harganya'], 0, ',', '.') ?></td>
                                <td><?php echo $row['waktu_pesan'] ?></td>
                                <td><?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>Dibayar</span>" : ""; ?></td>
                                <td>
                                    <a class="btn " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="./?x=pesanlayanan&pesanan=<?php echo $row['id_pesan'] .  "&pelanggan=" . $row['pelanggan'] ?>">
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_pesan'] ?>">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_pesan'] ?>">
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>

</div>
