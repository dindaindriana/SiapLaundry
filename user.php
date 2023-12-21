<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<section class="title-page mb-5">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3 class="text-center fw-bold">User</h3>
            <div class="d-flex justify-content-center align-item-center gap-0">
                <div class="line-border shadow-sm"></div>
                <div class="line-border-bold bg-success shadow-sm"></div>
                <div class="line-border shadow-sm"></div>
            </div>
        </div>
    </div>
</section>



<div class="card-body">
    <div class="row">
        <div class="col d-flex justify-content-start">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah User</button>
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                    <label for="floatingInput">Nama</label>
                                    <div class="invalid-feedback">
                                        Masukkan Nama.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                    <label for="floatingInput">Username</label>
                                    <div class="invalid-feedback">
                                        Masukkan Username.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="level" required>
                                        <option selected hidden value="">Pilih Level User</option>
                                        <option value="1">Owner</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Kasir</option>
                                        <option value="4">Pelanggan</option>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                        Pilih Level User.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxx" name="nohp">
                                    <label for="floatingInput">No HP</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="password" disabled value="12345" class="form-control" id="floatingInput" placeholder="Password" name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" style="height: 100px;" name="alamat"></textarea>
                            <label for="floatingInput">Alamat</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah User End -->

    <?php
    foreach ($result as $row) {
    ?>
        <!-- Modal View -->
        <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                        <label for="floatingInput">Nama</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                        <label for="floatingInput">Username</label>
                                        <div class="invalid-feedback">
                                            Masukkan Username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <select disabled class="form-select" aria-label="Default select example" required name="level" id="">
                                            <?php
                                            $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                            foreach ($data as $key => $value) {
                                                if ($row['level'] == $key + 1) {
                                                    echo "<option selected value =" . ($key + 1) . ">$value</option>";
                                                } else {
                                                    echo "<option  value=" . ($key + 1) . ">$value</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Level User</label>
                                        <div class="invalid-feedback">
                                            Pilih Level User.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                        <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                        <label for="floatingInput">No HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea disabled class="form-control" style="height: 100px;" name="alamat"><?php echo $row['alamat'] ?></textarea>
                                <label for="floatingInput">Alamat</label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal View End -->

        <!-- Modal Edit -->
        <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required value="<?php echo $row['nama'] ?>">
                                        <label for="floatingInput">Nama</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input <?php echo ($row['username'] == $_SESSION['username_siaplaundry']) ? 'disabled' : ''; ?> type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required value="<?php echo $row['username'] ?>">
                                        <label for="floatingInput">Username</label>
                                        <div class="invalid-feedback">
                                            Masukkan Username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" required name="level" id="">
                                            <?php
                                            $data = array("Owner", "Admin", "Kasir", "Pelanggan");
                                            foreach ($data as $key => $value) {
                                                if ($row['level'] == $key + 1) {
                                                    echo "<option selected value = " . ($key + 1) . ">$value</option>";
                                                } else {
                                                    echo "<option  value = " . ($key + 1) . ">$value</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Level User</label>
                                        <div class="invalid-feedback">
                                            Pilih Level User.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                        <label for="floatingInput">No HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px;" name="alamat"><?php echo $row['alamat'] ?></textarea>
                                <label for="floatingInput">Alamat</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit End -->

        <!-- Modal Delete -->
        <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                            <div class="modal-footer">
                                <div class="col-lg-12">
                                    <?php
                                    if ($row['username'] == $_SESSION['username_siaplaundry']) {
                                        echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
                                    } else {
                                        echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
                                    }
                                    ?>
                                    <!-- Apakah anda yakin ingin menghapus user <b><?php echo $row['username'] ?></b> -->
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_siaplaundry']) ? 'disabled' : ''; ?>>Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete End -->

        <!-- Modal Reset Password -->
        <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                            <div class="modal-footer">
                                <div class="col-lg-12">
                                    <?php
                                    if ($row['username'] == $_SESSION['username_siaplaundry']) {
                                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri</div>";
                                    } else {
                                        echo "Apakah anda yakin ingin mereset user <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>";
                                    }
                                    ?>
                                    <!-- Apakah anda yakin ingin menghapus user <b><?php echo $row['username'] ?></b> -->
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_siaplaundry']) ? 'disabled' : ''; ?>>Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Reset Password End -->

    <?php
    }
    if (empty($result)) {
        echo "Data user tidak ada";
    } else {

    ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
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
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td>
                                <?php
                                if ($row['level'] == 1) {
                                    echo "Owner";
                                } elseif ($row['level'] == 2) {
                                    echo "Admin";
                                } elseif ($row['level'] == 3) {
                                    echo "Kasir";
                                } elseif ($row['level'] == 4) {
                                    echo "Pelanggan";
                                }
                                ?>
                            </td>
                            <td><?php echo $row['nohp'] ?></td>
                            <td><?php echo $row['alamat'] ?></td>
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
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>">
                                            View
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>">
                                            Hapus
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>">
                                            Reset Password
                                        </button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>
