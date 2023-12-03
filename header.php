<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"  href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'pelanggan') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"  href="pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'transaksi') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"  href="transaksi">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'lainnya') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"  href="lainnya">Lainnya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'user') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"  href="user">Lainnya</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <a class="btn btn-outline-success rounded-md" href="../auth/login.html" role="button">
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
