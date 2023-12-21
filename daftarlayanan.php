<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_layanan");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">Daftar Layanan</h3>
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
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahKategori"> Tambah Layanan</button>
            </div>
        </div>

        <!-- Modal Tambah Kategori Layanan -->
        <div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_daftarlayanan.php" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="jenis_satuan">
                                            <option value="1">Kilogram</option>
                                            <option value="2">Set</option>
                                            <option value="3">Meter</option>
                                            <option value="4">Pasang</option>
                                            <option value="5">Unit</option>
                                        </select>
                                        <label for="floatingInput">Jenis Layanan</label>
                                        <div class="invalid-feedback">
                                            Masukkan Jenis Layanan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu" name="kategori_layanan" required>
                                        <label for="floatingInput">Kategori Layanan</label>
                                        <div class="invalid-feedback">
                                            Masukkan Kategori Layanan.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="harga" required>
                                        <label for="floatingInput">Harga</label>
                                        <div class="invalid-feedback">
                                            Masukkan Harga.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="input_daftarlayanan_validate" value="12345">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Kategori Menu End -->

        <?php
        foreach ($result as $row) {
        ?>

            <!-- Modal Edit -->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_layanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_daftarlayanan.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_layanan'] ?>" name="id_layanan">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" required name="jenis_satuan" id="">
                                                <?php
                                                $data = array("Kilogram", "Set", "Meter", "Pasang", "Unit");
                                                foreach ($data as $key => $value) {
                                                    if ($row['jenis_satuan'] == $key + 1) {
                                                        echo "<option selected value =" . ($key + 1) . ">$value</option>";
                                                    } else {
                                                        echo "<option  value=" . ($key + 1) . ">$value</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Jenis Layanan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Layanan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Layanan" name="kategori_layanan" required value="<?php echo $row['kategori_layanan']?>">
                                            <label for="floatingInput">Kategori layanan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Layanan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga" value="<?php echo  $row['harga'] ?>" required>
                                            <label for="harga">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="edit_daftarlayanan_validate" value="12345">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit End -->

            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id_layanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kategori Layanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_delete_daftarlayanan.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_layanan'] ?>" name="id_layanan">
                                <div class="modal-footer">
                                    <div class="col-lg-12">
                                        Apakah anda yakin ingin menghapus kategori <b><?php echo $row['kategori_layanan'] ?></b>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="hapus_daftarlayanan_validate" value="12345">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Delete End -->

        <?php
        }
        if (empty($result)) {
            echo "Data kategori tidak ada";
        } else {

        ?>
            <!-- Tabel Daftar Kategori Menu -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Satuan</th>
                            <th scope="col">Kategori Layanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo ($row['jenis_satuan'] == 1) ? "Kilogram" : (($row['jenis_satuan'] == 2) ? "Set" : (($row['jenis_satuan'] == 3) ? "Meter" : (($row['jenis_satuan'] == 4) ? "Pasang" : (($row['jenis_satuan'] == 5) ? "Unit" : "Tidak diketahui")))); ?></td>
                                <td><?php echo $row['kategori_layanan'] ?></td>
                                <td><?php echo $row['harga'] ?></td>
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
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_layanan'] ?>">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_layanan'] ?>">
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Tabel Daftar Kategori Menu End -->
        <?php } ?>
    </div>

</div>
