
<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "pelanggan.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'transaksi') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "transaksi.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'lainnya') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 4) {
        $page = "lainnya.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_siaplaundry'] == 1) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    if ($_SESSION['level_siaplaundry'] == 1) {
        $page = "report.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
}  else {
    $page = "home.php";
    include "main.php";
}
?>
