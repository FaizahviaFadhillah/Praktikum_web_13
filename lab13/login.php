<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']); // Change 'username' to 'name'
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_pengguna (username, password) VALUES (?, ?)"; // Remove the third parameter
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword); // Change to "ss"
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Pendaftaran berhasil');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="css/styles3.css" rel="stylesheet" type="text/css" />
    <titleLogin</title>
</head>
<body>
<div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required autocomplete="off"/>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required/>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>