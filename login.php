<?php

require_once "core/init.php";

$error = '';

//redirect kalau user sudah login
if (isset($_SESSION['user'])) header('Location: index.php');


//validasi register
if (isset($_POST['submit'])) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if (!empty(trim($nama)) && !empty(trim($pass))) {
        //cek database
        if (cek_nama($nama) != 0) {
            if (cek_data($nama, $pass)) redirect_login($nama);
            else $error =  "Data ada yang salah";
        } else $error = "Namanya belum terdaftar";
    } else $error = "Nama dan Password tidak boleh kosong!";
}


require_once "view/header.php";

//menguji pesan session
if (isset($_SESSION['msg'])) {
    flash_delete($_SESSION['msg']);
}

?>


<form action="login.php" method="post">
    <label for="">Nama</label><br>
    <input type="text" name="username"><br>

    <label for="">Password</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="submit" value=" Login">
    <br>
    <br>
    <?php if ($error != '') { ?>
        <div id="error">
            <?= $error; ?>
        </div>
    <?php } ?>
</form>

<?php require_once "view/footer.php"; ?>