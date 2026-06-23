<?php
include("../Config/koneksi.php");

$data = mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kelola User - Whispy Wash</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f8fb;
    padding:30px;
}

.container{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.header h2{
    color:#2E6E9E;
}

.btn-tambah{
    background:#5CC8C6;
    color:white;
    text-decoration:none;
    padding:12px 18px;
    border-radius:10px;
    font-weight:bold;
}

.btn-tambah:hover{
    background:#47b5b1;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2E6E9E;
    color:white;
    padding:14px;
}

td{
    padding:14px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f7ffff;
}

.btn-edit{
    background:#3498db;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:8px;
}

.btn-hapus{
    background:#e74c3c;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:8px;
}

.btn-edit:hover{
    background:#2980b9;
}

.btn-hapus:hover{
    background:#c0392b;
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h2>👥 Kelola User</h2>

<a href="tambah.php" class="btn-tambah">
+ Tambah User
</a>

</div>

<table>

<tr>
<th>ID</th>
<th>Nama Lengkap</th>
<th>Email</th>
<th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['nama_lengkap']; ?></td>

<td><?= $row['email']; ?></td>

<td>

<a class="btn-edit"
href="edit.php?id=<?= $row['id']; ?>">
Edit
</a>

<a class="btn-hapus"
onclick="return confirm('Yakin ingin menghapus user ini?')"
href="hapus.php?id=<?= $row['id']; ?>">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>