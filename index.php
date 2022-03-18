<?php

require_once "core/init.php";

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Anda harus login dahulu untuk mengakses halaman ini';
    header('Location: login.php');
}

require_once "view/header.php";

?>

<h1>Halaman Profil <?php echo $_SESSION['user']; ?></h1>
<br>

<?php if (cek_status($_SESSION['user'] == 1)) { ?>
    echo "<div>Halo ADMIN</div>"
<?php } ?>

<?php require_once "view/footer.php"; ?>