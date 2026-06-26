<?php
include("../Config/koneksi.php");

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn,"
    INSERT INTO users (nama, email, password)
    VALUES ('$nama', '$email', '$password')
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Pelanggan</title>

<style>

*{
    margin:0;
    padding:0;
    font-family:'Segoe UI';
    box-sizing:border-box;
}

body{
    background:#f4f8fb;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    width:420px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h2{
    text-align:center;
    color:#2E6E9E;
    margin-bottom:20px;
}

label{
    font-weight:600;
    color:#2E6E9E;
}

input{
    width:100%;
    padding:12px;
    margin:8px 0 15px 0;
    border:1px solid #ddd;
    border-radius:10px;
}

input:focus{
    border-color:#5CC8C6;
    outline:none;
}

.btn{
    width:100%;
    padding:12px;
    background:#5CC8C6;
    border:none;
    color:white;
    font-weight:bold;
    border-radius:10px;
    cursor:pointer;
}

.btn:hover{
    background:#48b4af;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#2E6E9E;
}

</style>
</head>

<body>

<div class="card">

<h2>Tambah Pelanggan</h2>

<form method="POST">

<label>Nama Lengkap</label>
<input type="text" name="nama" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="text" name="password" required>

<button type="submit" name="simpan" class="btn">
Simpan
</button>

</form>

<a href="index.php" class="back">← Kembali</a>

</div>

</body>
</html>