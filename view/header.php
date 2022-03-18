<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register</title>
    <link rel="stylesheet" href="view/style.css">
</head>

<body>
    <header>
        <h1>
            Login dan Register
        </h1>
        <nav>
            <a href="index.php">Home</a>

            <?php if (!isset($_SESSION['user'])) { ?>
                <!-- kita sedang logout -->
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            <?php } else { ?>
                <a href="logout.php">logout</a>
            <?php } ?>

        </nav>
    </header>