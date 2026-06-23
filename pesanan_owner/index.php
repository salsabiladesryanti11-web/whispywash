<?php
include("../Config/koneksi.php");

$query = mysqli_query($conn,"
SELECT orders.*,
       users.nama_lengkap,
       users.email
FROM orders
LEFT JOIN users
ON orders.user_id = users.id
ORDER BY orders.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Pesanan</title>

<style>

body{
    font-family:Segoe UI;
    background:#f4f8fb;
    padding:30px;
}

.container{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    color:#2E6E9E;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th{
    background:#2E6E9E;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.btn{
    padding:8px 12px;
    text-decoration:none;
    color:white;
    border-radius:8px;
}

.detail{
    background:#3498db;
}

</style>
</head>

<body>

<div class="container">

<h2>📦 Semua Pesanan Masuk</h2>

<table>

<tr>
<th>ID</th>
<th>Nama Pelanggan</th>
<th>Email</th>
<th>Layanan</th>
<th>Status</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['nama_lengkap']; ?></td>

<td><?= $row['email']; ?></td>

<td><?= $row['layanan']; ?></td>

<td><?= $row['status']; ?></td>

<td><?= $row['tgl_order']; ?></td>

<td>
<a href="detail.php?id=<?= $row['id']; ?>" class="btn detail">
Detail
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>