<?php
// session_start();
if (!empty($_SESSION['username_siaplaundry'])) {
    header('location:home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siap Laundry</title>

    <link rel="shortcut icon" href="./assets/img/tid.png" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">
                <div class="d-flex justify-content-center mb-3 text-success">
                    <h4 class="fw-bold">SIAP <span class="d-block">LAUNDRY</span></h4>
                </div>
                <div class="card border-success rounded-4">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
                            <div class="row mt-5 justify-content-start mb-5">
                                <h3 class="text-start fw-bold">Masuk</h3>
                                <div class="d-flex justify-content-start align-item-center gap-0">
                                    <div class="line-border shadow-sm"></div>
                                    <div class="line-border-bold bg-success shadow-sm"></div>
                                    <div class="line-border shadow-sm"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="floatingInput" class="form-label text-success fw-medium">Email</label>
                                    <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                    <div class="invalid-feedback mb-2 mt-2">
                                        Masukkan email yang valid.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword2" class="text-success fw-medium">Kata Sandi</label>
                                    <input type="password" class="form-control border-success" id="inputPassword2" placeholder="Kata Sandi" name="password" required>
                                    <div class="invalid-feedback">
                                        Masukkan Kata Sandi.
                                    </div>
                                </div>
                                <button class="btn  btn-success w-100 mt-3 mb-3" type="submit" value="abc" name="login_validate">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>email: owner@owner.com</p>
                    <p>email: admin@admin.com</p>
                    <p>email: kasir@kasir.com</p>
                    <p>email: pelanggan@pelanggan.com</p>
                    <p>passowrd : password </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="container">
        <div class="row text-center mt-5">
            <div class="col-12">
                <div class="container">
                    <footer>
                        <div class="d-flex flex-column flex-sm-row justify-content-center pt-4 mt-4 border-top">
                            <p>&copy; 2023 Dinda Indriana All rights reserved</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- AOS Animate -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
