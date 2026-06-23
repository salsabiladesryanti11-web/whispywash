<?php
include("../Config/koneksi.php");

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT orders.*,
       users.nama_lengkap,
       users.email
FROM orders
LEFT JOIN users
ON orders.user_id = users.id
WHERE orders.id='$id'
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Pesanan</title>

<style>

body{
    background:#f4f8fb;
    font-family:Segoe UI;
}

.card{
    width:700px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    color:#2E6E9E;
}

.item{
    margin-bottom:15px;
}

.label{
    font-weight:bold;
    color:#2E6E9E;
}

.value{
    padding:10px;
    background:#f7f7f7;
    border-radius:8px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 15px;
    background:#5CC8C6;
    color:white;
    text-decoration:none;
    border-radius:10px;
}

</style>

</head>
<body>

<div class="card">

<h2>📦 Detail Pesanan</h2>

<div class="item">
<div class="label">Nama Pelanggan</div>
<div class="value"><?= $data['nama_lengkap']; ?></div>
</div>

<div class="item">
<div class="label">Email</div>
<div class="value"><?= $data['email']; ?></div>
</div>

<div class="item">
<div class="label">Layanan</div>
<div class="value"><?= $data['layanan']; ?></div>
</div>

<div class="item">
<div class="label">Status</div>
<div class="value"><?= $data['status']; ?></div>
</div>

<div class="item">
<div class="label">Tanggal Pesanan</div>
<div class="value"><?= $data['tgl_order']; ?></div>
</div>

<a href="index.php" class="btn">
⬅ Kembali
</a>

</div>

</body>
</html>