<?php
include("../Config/koneksi.php");

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pelanggan - Whispy Wash</title>

    <style>

    body{
        font-family:'Segoe UI',sans-serif;
        background:#f4fbfb;
        padding:30px;
    }

    .container{
        max-width:700px;
        margin:auto;
        background:white;
        padding:30px;
        border-radius:20px;
        box-shadow:0 5px 15px rgba(0,0,0,.1);
    }

    h2{
        text-align:center;
        color:#2E6E9E;
        margin-bottom:25px;
    }

    .item{
        margin-bottom:20px;
    }

    .label{
        font-weight:bold;
        color:#2E6E9E;
        display:block;
        margin-bottom:5px;
    }

    .value{
        background:#f8f9fa;
        padding:12px;
        border-radius:10px;
    }

    .btn{
        display:inline-block;
        margin-top:20px;
        text-decoration:none;
        background:#5CC8C6;
        color:white;
        padding:12px 20px;
        border-radius:10px;
    }

    .btn:hover{
        background:#2E6E9E;
    }

    </style>

</head>
<body>

<div class="container">

    <h2>👤 Detail Pelanggan</h2>

    <div class="item">
        <span class="label">ID Pelanggan</span>
        <div class="value"><?= $data['id']; ?></div>
    </div>

    <div class="item">
        <span class="label">Nama Lengkap</span>
        <div class="value"><?= $data['nama_lengkap']; ?></div>
    </div>

    <div class="item">
        <span class="label">Email</span>
        <div class="value"><?= $data['email']; ?></div>
    </div>

    <div class="item">
        <span class="label">Tanggal Daftar</span>
        <div class="value"><?= $data['created_at']; ?></div>
    </div>

    <a href="index.php" class="btn">⬅ Kembali</a>

</div>

</body>
</html>