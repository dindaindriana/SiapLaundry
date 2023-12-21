<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_pesanan
LEFT JOIN tb_pesanan ON tb_pesanan.id_pesan = tb_list_pesanan.kode_pesan
LEFT JOIN tb_daftar_layanan ON tb_daftar_layanan.id_layanan = tb_list_pesanan.layanan
LEFT JOIN tb_transaksi ON tb_transaksi.id_bayar = tb_pesanan.id_pesan
ORDER BY waktu_pesan ASC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_layanan = mysqli_query($conn, "SELECT id_layanan , kategori_layanan FROM tb_daftar_layanan");
?>

<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">Proses</h3>
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

            <?php
            if (empty($result)) {
                echo "Data order tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal Terima -->
                    <div class="modal fade" id="ModalTerima<?php echo $row['id_list_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit layanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_pesanlayanan.php" method="POST">
                                        <input type="hidden" name="id_list_pesanan" value="<?php echo $row['id_list_pesanan'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                <select class="form-select" name="layanan">
                                                    <option selected hidden value="">Pilih layanan</option>
                                                    <?php
                                                    foreach ($select_layanan as $value) {
                                                        if ($row['layanan'] == $value['id_layanan']) {
                                                            echo "<option selected value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        } else {
                                                            echo "<option value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                    <label for="layanan">layanan Makanan/Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih layanan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
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
                                            <button type="submit" class="btn btn-success" name="terima_pesanlayanan_validate" value="12345">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Terima End -->

                    <!-- Modal Siap Saji -->
                    <div class="modal fade" id="ModalSiapSaji<?php echo $row['id_list_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit layanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_selesai_pesanlayanan.php" method="POST">
                                        <input type="hidden" name="id_list_pesanan" value="<?php echo $row['id_list_pesanan'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                <select class="form-select" name="layanan">
                                                    <option selected hidden value="">Pilih layanan</option>
                                                    <?php
                                                    foreach ($select_layanan as $value) {
                                                        if ($row['layanan'] == $value['id_layanan']) {
                                                            echo "<option selected value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        } else {
                                                            echo "<option value= $value[id_layanan]>$value[kategori_layanan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                    <label for="layanan">layanan Makanan/Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih layanan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
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
                                            <button type="submit" class="btn btn-success" name="selesai_pesanlayanan_validate" value="12345">Selesai</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Siap Saji End -->

                <?php
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">layanan</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if ($row['status'] != 2) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['kode_pesan'] ?></td>
                                        <td><?php echo $row['waktu_pesan'] ?></td>
                                        <td><?php echo $row['kategori_layanan'] ?></td>
                                        <td><?php echo $row['jumlah'] ?></td>
                                        <td><?php echo $row['catatan'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>Sedang diproses</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-primary'>Selesai</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary  btn-sm me-1 disabled" : "btn btn-success btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalTerima<?php echo $row['id_list_pesanan'] ?>">Terima</button>
                                                <button class="<?php echo (empty($row['status']) || ($row['status']) != 1) ? "btn btn-secondary  btn-sm me-1 disabled text-nowrap" : "btn btn-primary btn-sm me-1 text-nowrap"; ?>" data-bs-toggle="modal" data-bs-target="#ModalSiapSaji<?php echo $row['id_list_pesanan'] ?>">Selesai</button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>

</div>
