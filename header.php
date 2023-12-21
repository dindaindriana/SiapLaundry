<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="text-decoration-none text-dark fw-bold fs-5" href="#"> <span class="d-block"
                    style="margin-bottom: -10px;">SIAP</span> LAUNDRY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="home">Home</a>
                    </li>
                    <?php } ?>
                <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'daftarlayanan') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="daftarlayanan">Daftar Layanan</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'pesanan') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="pesanan">Pesanan</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'kelola') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="kelola">Proses</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'report') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="report">Report</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'user') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="user">User</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'tentang') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="tentang">Tentang</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'history') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="history">History</a>
                    </li>
                    <?php } ?>
                    <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'lainnya') || !isset($_GET['x'])) ? 'active link-dark' : 'link-secondary'; ?>"  href="lainnya">Lainnya</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="d-flex" role="search">
                    <a class="btn btn-outline-success rounded-md" href="logout">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                            </path>
                            <path d="M9 12h12l-3 -3"></path>
                            <path d="M18 15l3 -3"></path>
                        </svg>
                        Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Jumbotron -->
        <section id="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white mt-5">
                    <h3 class="mt-5">Hallo, Dinda</h3>
                    <h1 class="display-4">SIAP LAUNDRY</h1>
                    <p>Mari tingkatkan kebersihan bersama Siap Laundry</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Jumbotron End -->
