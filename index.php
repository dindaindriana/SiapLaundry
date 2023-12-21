
<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2 || $_SESSION['level_siaplaundry'] == 3) {
    $page = "home.php";
    include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
}    elseif (isset($_GET['x']) && $_GET['x'] == 'daftarlayanan') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "daftarlayanan.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'pesanan') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "pesanan.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'kelola') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "kelola.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'pesanlayanan') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2 || $_SESSION['level_siaplaundry'] == 3) {
        $page = "pesanlayanan.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'lainnya') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2) {
        $page = "lainnya.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_siaplaundry'] == 1 || $_SESSION['level_siaplaundry'] == 2) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'tentang') {
    if ($_SESSION['level_siaplaundry'] == 4) {
        $page = "tentang.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'history') {
    if ($_SESSION['level_siaplaundry'] == 4) {
        $page = "history.php";
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
