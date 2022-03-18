<?php

require_once "core/init.php";

$error = '';

//redirect kalau user sudah login
if (isset($_SESSION['user']))   header('Location: index.php');


//validasi register
if (isset($_POST['submit'])) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if (!empty(trim($nama)) && !empty(trim($pass))) {
        //menguji nama kembar
        if (cek_nama($nama) == 0) {
            //memasukkan data ke database
            if (register_user($nama, $pass)) redirect_login($nama);
            else $error = "Gagal Daftar";
        } else $error = "Nama sudah ada!";
    } else $error = "Nama dan Password tidak boleh kosong!";
}


require_once "view/header.php";

?>

<form action="register.php" method="post">
    <label for="">Nama</label><br>
    <input type="text" name="username"><br>

    <label for="">Password</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="submit" value=" Daftar">
    <br>
    <br>
    <?php if ($error != '') { ?>
        <div id="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
</form>

<?php require_once "view/footer.php"; ?>