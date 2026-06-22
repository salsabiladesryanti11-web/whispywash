<?php

include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM penjemputan WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Penjemputan</title>

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
    font-weight:bold;
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

.container{
    max-width:1200px;
    margin:auto;
    padding:40px;
}

.title-section{
    margin-bottom:30px;
}

.title-section h2{
    font-size:35px;
    color:#243447;
    margin-bottom:8px;
}

.title-section p{
    color:#64748b;
}

.detail-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:18px;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.card h3{
    color:#243447;
    margin-bottom:15px;
}

.card p{
    margin-bottom:10px;
    color:#64748b;
}

.map-box{
    height:250px;
    display:flex;
    justify-content:center;
    align-items:center;
    border:2px dashed #cbd5e1;
    border-radius:12px;
    color:#94a3b8;
    background:#f8fafc;
}

.button-group{
    margin-top:25px;
    display:flex;
    gap:15px;
}

.btn{
    border:none;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.chat-btn{
    background:#0ea5e9;
}

.call-btn{
    background:#16a34a;
}

.pickup-btn{
    background:#f59e0b;
}

.footer{
    text-align:center;
    margin-top:30px;
    color:#94a3b8;
}

.status{
    display:inline-block;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.status-proses{
    background:#fef3c7;
    color:#92400e;
}

.status-selesai{
    background:#dcfce7;
    color:#166534;
}

@media(max-width:768px){

    .detail-grid{
        grid-template-columns:1fr;
    }

    .container{
        padding:20px;
    }

}

</style>
</head>
<body>

<div class="header">

    <div class="logo">
        Whispy Wash
    </div>

    <a href="data_penjemputan.php" class="back-btn">
        ← Kembali
    </a>

</div>

<div class="container">

    <div class="title-section">
        <h2>Detail Penjemputan</h2>
        <p>Informasi lengkap pelanggan yang akan dijemput.</p>
    </div>

    <div class="detail-grid">

        <div class="card">
            <h3>Map View</h3>

            <div class="map-box">
                Lokasi pelanggan akan tampil di sini
            </div>
        </div>

        <div class="card">

            <h3>Informasi Pelanggan</h3>

            <p>
                <strong>Nama Pelanggan :</strong><br>
                <?= $row['nama_pelanggan']; ?>
            </p>

            <p>
                <strong>Tanggal Jemput :</strong><br>
                <?= $row['tanggal_jemput']; ?>
            </p>

            <p>
                <strong>Status :</strong><br>

                <?php
                if(strtolower($row['status']) == "selesai"){
                    echo "<span class='status status-selesai'>Selesai</span>";
                }else{
                    echo "<span class='status status-proses'>Proses</span>";
                }
                ?>

            </p>

        </div>

        <div class="card">

            <h3>Alamat Penjemputan</h3>

            <p>
                <?= $row['alamat']; ?>
            </p>

        </div>

        <div class="card">

            <h3>Catatan Pelanggan</h3>

            <p>
                Tidak ada catatan.
            </p>

        </div>

    </div>

    <div class="button-group">

        <button class="btn chat-btn">
            Chat
        </button>

        <button class="btn call-btn">
            Call
        </button>

        <button class="btn pickup-btn">
            Mulai Pickup
        </button>

    </div>

    <div class="footer">
        © 2026 Whispy Wash Laundry Management System
    </div>

</div>

</body>
</html>