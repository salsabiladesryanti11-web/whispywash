<?php
include "../config_kurir/koneksi.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query(
        $conn,
        "INSERT INTO penjemputan
        (nama_pelanggan,alamat,tanggal_jemput,status)
        VALUES
        ('$nama','$alamat','$tanggal','$status')"
    );

    header("Location:data_penjemputan.php");
}
?>

<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Penjemputan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#eef2f7;
}

/* HEADER */

.header{
    background:#243447;
    color:white;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:28px;
    font-weight:700;
}

.back-btn{
    text-decoration:none;
    color:white;
    background:#3b82f6;
    padding:10px 18px;
    border-radius:8px;
}

.back-btn:hover{
    background:#2563eb;
}

/* CONTAINER */

.container{
    max-width:700px;
    margin:40px auto;
    padding:20px;
}

.card{
    background:white;
    padding:35px;
    border-radius:18px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
}

.card h2{
    color:#243447;
    margin-bottom:10px;
}

.card p{
    color:#64748b;
    margin-bottom:25px;
}

/* FORM */

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#243447;
}

input,
select{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:15px;
}

input:focus,
select:focus{
    outline:none;
    border-color:#3b82f6;
}

/* BUTTON */

.btn{
    background:#16a34a;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
}

.btn:hover{
    background:#15803d;
}

</style>

</head>
<body>

<div class="header">

```
<div class="logo">
    Whispy Wash
</div>

<a href="data_penjemputan.php" class="back-btn">
    ← Kembali
</a>
```

</div>

<div class="container">

```
<div class="card">

    <h2>Tambah Data Penjemputan</h2>

    <p>
        Masukkan data penjemputan laundry pelanggan.
    </p>

    <form method="POST">

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" required>
        </div>

        <div class="form-group">
            <label>Tanggal Penjemputan</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Status</label>

            <select name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn">
            Simpan Data
        </button>

    </form>

</div>
```

</div>

</body>
</html>