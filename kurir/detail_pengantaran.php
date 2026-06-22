<?php

include "../config_kurir/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM pengantaran WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Pengantaran</title>

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
    margin-bottom:15px;
    color:#243447;
}

.card p{
    margin-bottom:12px;
    color:#64748b;
}

.map-box{
    height:250px;
    border:2px dashed #cbd5e1;
    border-radius:12px;
    display:flex;
    justify-content:center;
    align-items:center;
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

.antar-btn{
    background:#8b5cf6;
}

.status{
    display:inline-block;
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.siap{
    background:#dbeafe;
    color:#1d4ed8;
}

.sedang{
    background:#fef3c7;
    color:#92400e;
}

.selesai{
    background:#dcfce7;
    color:#166534;
}

.footer{
    text-align:center;
    margin-top:30px;
    color:#94a3b8;
}

</style>
</head>
<body>

<div class="header">

    <div class="logo">
        Whispy Wash
    </div>

    <a href="data_pengantaran.php" class="back-btn">
        ← Kembali
    </a>

</div>

<div class="container">

    <div class="title-section">
        <h2>Detail Pengantaran</h2>
        <p>Informasi lengkap pengantaran laundry pelanggan.</p>
    </div>

    <div class="detail-grid">

        <div class="card">

            <h3>Map View</h3>

            <div class="map-box">
                Lokasi tujuan pengantaran
            </div>

        </div>

        <div class="card">

            <h3>Informasi Pelanggan</h3>

            <p>
                <strong>Nama Pelanggan :</strong><br>
                <?= $row['nama_pelanggan']; ?>
            </p>

            <p>
                <strong>Tanggal Antar :</strong><br>
                <?= $row['tanggal_antar']; ?>
            </p>

            <p>

    <strong>Status :</strong><br><br>

    <?php

    if($row['status'] == "Siap Diantar"){

        echo "<span class='status siap'>Siap Diantar</span>";

    }elseif($row['status'] == "Sedang Diantar"){

        echo "<span class='status sedang'>Sedang Diantar</span>";

    }else{

        echo "<span class='status selesai'>Selesai</span>";

    }

    ?>

</p>

        </div>

        <div class="card">

            <h3>Alamat Pengantaran</h3>

            <p>
                <?= $row['alamat']; ?>
            </p>

        </div>

        <div class="card">

            <h3>Catatan Pengantaran</h3>

            <p>
                Laundry siap diantar ke pelanggan.
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

        <button class="btn antar-btn">
            Selesaikan Pengantaran
        </button>

    </div>

    <div class="footer">
        © 2026 Whispy Wash Laundry Management System
    </div>

</div>

</body>
</html>