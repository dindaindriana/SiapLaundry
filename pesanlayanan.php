<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_pesanan
LEFT JOIN tb_pesanan ON tb_pesanan.id_pesan = tb_list_pesanan.kode_pesan
LEFT JOIN tb_daftar_layanan ON tb_daftar_layanan.id_layanan = tb_list_pesanan.layanan
LEFT JOIN tb_transaksi ON tb_transaksi.id_bayar = tb_pesanan.id_pesan
-- LEFT JOIN tb_kategori_layanan ON tb_kategori_layanan.id_kat = tb_list_pesanan.layanan
-- LEFT JOIN tb_kategori_layanan ON tb_kategori_layanan.id_kat = tb_daftar_layanan.kategori
GROUP BY id_list_pesanan
HAVING tb_list_pesanan.kode_pesan = $_GET[pesanan]");

$kode = $_GET['pesanan'];
$pelanggan = $_GET['pelanggan'];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    // $kode = $record['id_pesan'];
    // $meja = $record['meja'];
    // $pelanggan = $record['pelanggan'];
}

$select_kat_layanan = mysqli_query($conn, "SELECT id_layanan , kategori_layanan FROM tb_daftar_layanan");
// $select_harga = mysqli_query($conn, "SELECT harga FROM tb_daftar_layanan");
// $select_layanan = mysqli_query($conn, "SELECT id_layanan , kategori FROM tb_daftar_layanan")
// $selectedJenisSatuan = $_SESSION['selected_jenis_satuan'];
// $select_menu = mysqli_query($conn, "SELECT id_layanan, kategori FROM tb_daftar_layanan");
?>

<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">Transaksi</h3>
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
        <a href="pesanan" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode ?>">
                    <label for="uploadfoto">Kode Pesan</label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan ?>">
                    <label for="uploadfoto">Pelanggan</label>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Layanan -->
        <div class="modal fade" id="TambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_pesanlayanan.php" method="POST">
                            <input type="hidden" name="kode_pesan" value="<?php echo $kode ?>">
                            <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="layanan">
                                            <option selected hidden value="">Pilih Layanan</option>
                                            <?php
                                            foreach ($select_kat_layanan as $value) {
                                                echo "<option value = $value[id_layanan]>$value[kategori_layanan]</option>";
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Layanan</label>
                                        <div class="invalid-feedback">
                                            Pilih Layanan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi" name="jumlah" required>
                                        <label for="floatingInput">Jumlah</label>
                                        <div class="invalid-feedback">
                                            Masukkan Jumlah.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan">
                                        <label for="floatingPassword">Catatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="input_pesanlayanan_validate" value="12345">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Item End -->

        <?php
        if (empty($result)) {
            echo "Data order tidak ada";
        } else {
            foreach ($result as $row) {
        ?>

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_list_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_pesanlayanan.php" method="POST">
                                    <input type="hidden" name="id_list_pesanan" value="<?php echo $row['id_list_pesanan'] ?>">
                                    <input type="hidden" name="kode_pesan" value="<?php echo $kode ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="layanan">
                                                    <option selected hidden value="">Pilih layanan</option>
                                                    <?php
                                                    foreach ($select_kat_layanan as $value) {
                                                        if ($row['layanan'] == $value['id_layanan']) {
                                                            echo "<option selected value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        } else {
                                                            echo "<option value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="layanan">layanan</label>
                                                <div class="invalid-feedback">
                                                    Pilih layanan.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                <label for="floatingInput">Jumlah Porsi</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jumlah Porsi.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                <label for="floatingPassword">Catatan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="edit_pesanlayanan_validate" value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit End -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_list_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_pesanlayanan.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_list_pesanan'] ?>" name="id_list_pesanan">
                                    <input type="hidden" name="kode_pesan" value="<?php echo $kode ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <div class="modal-footer">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus menu <b><?php echo $row['kategori_layanan'] ?></b>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_pesanlayanan_validate" value="12345">Hapus</button>
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

            <!-- Modal Bayar -->
            <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th scope="col">Layanan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Catatan</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($result as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['kategori_layanan'] ?></td>
                                                <td><?php echo number_format($row['harga'], 0, ',', '.')  ?></td>
                                                <td><?php echo $row['jumlah'] ?></td>
                                                <td><?php echo ($row['jenis_satuan'] == 1) ? "Kilogram" : (($row['jenis_satuan'] == 2) ? "Set" : (($row['jenis_satuan'] == 3) ? "Meter" : (($row['jenis_satuan'] == 4) ? "Pasang" : (($row['jenis_satuan'] == 5) ? "Unit" : "Tidak diketahui")))); ?></td>
                                                <td><?php
                                                    if ($row['status'] == 1) {
                                                        echo "<span class='badge text-bg-warning'>Diproses</span>";
                                                    } elseif ($row['status'] == 2) {
                                                        echo "<span class='badge text-bg-primary'>Selesai</span>";
                                                    }
                                                    ?></td>
                                                <td><?php echo $row['catatan'] ?></td>
                                                <td><?php echo number_format($row['harganya'], 0, ',', '.')  ?></td>
                                            </tr>
                                        <?php
                                            $total += $row['harganya'];
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5" class="fw-bold">
                                                Total Harga
                                            </td>
                                            <td class="fw-bold">
                                                <?php echo number_format($total, 0, ',', '.')  ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <span class="text-danger fs-6 fw-semibold">Apakah Anda Yakin Ingin Melakukan Pembayaran?</span>
                            <form class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                                <input type="hidden" name="kode_pesan" value="<?php echo $kode ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="total" value="<?php echo $total ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                            <label for="floatingInput">Nominal Uang</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nominal Uang.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Bayar End -->

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">Layanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['kategori_layanan'] ?></td>
                                <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                <td><?php echo $row['jumlah'] ?></td>
                                <td><?php echo ($row['jenis_satuan'] == 1) ? "Kilogram" : (($row['jenis_satuan'] == 2) ? "Set" : (($row['jenis_satuan'] == 3) ? "Meter" : (($row['jenis_satuan'] == 4) ? "Pasang" : (($row['jenis_satuan'] == 5) ? "Unit" : "Tidak diketahui")))); ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1) {
                                        echo "<span class='badge text-bg-warning'>Diproses</span>";
                                    } elseif ($row['status'] == 2) {
                                        echo "<span class='badge text-bg-primary'>Selesai</span>";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row['catatan'] ?></td>
                                <td><?php echo number_format($row['harganya'], 0, ',', '.')  ?></td>
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
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_pesanan'] ?>">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_pesanan'] ?>">
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php
                            $total += $row['harganya'];
                        }
                        ?>
                        <tr>
                            <td colspan="6" class="fw-bold">
                                Total Harga
                            </td>
                            <td class="fw-bold">
                                <?php echo number_format($total, 0, ',', '.')  ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        <div>
            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#TambahItem"><i class="bi bi-plus-circle-fill"></i> Item</button>
            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#ModalBayar"><i class="bi bi-cash-coin"></i> Bayar</button>
        </div>
    </div>

</div>
