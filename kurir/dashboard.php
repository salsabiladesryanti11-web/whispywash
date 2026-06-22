<?php
session_start();
include "../config/koneksi.php";

$penjemputan = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM penjemputan")
);

$pengantaran = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pengantaran")
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Kurir - Whispy Wash</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
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
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.logo{
    font-size:28px;
    font-weight:700;
}

.user{
    display:flex;
    align-items:center;
    gap:15px;
}

.logout-btn{
    text-decoration:none;
    background:#dc2626;
    color:white;
    padding:8px 15px;
    border-radius:8px;
}

.logout-btn:hover{
    background:#b91c1c;
}

/* CONTENT */

.dashboard{
    max-width:1200px;
    margin:auto;
    padding:40px;
}

.welcome{
    margin-bottom:35px;
}

.welcome h2{
    color:#243447;
    font-size:38px;
    margin-bottom:10px;
}

.welcome p{
    color:#64748b;
    font-size:16px;
}

/* CARD STATISTIK */

.card-container{
    display:flex;
    gap:25px;
    margin-bottom:35px;
    flex-wrap:wrap;
}

.card{
    flex:1;
    min-width:280px;
    background:white;
    padding:30px;
    border-radius:18px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
}

.card-title{
    color:#64748b;
    margin-bottom:15px;
    font-size:15px;
}

.card-number{
    font-size:50px;
    font-weight:700;
    color:#243447;
}

/* MENU */

.menu-section{
    background:white;
    padding:35px;
    border-radius:18px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
}

.menu-section h3{
    text-align:center;
    color:#243447;
    margin-bottom:30px;
    font-size:28px;
}

.menu-card-container{
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
}

.menu-card{
    width:320px;
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:18px;
    padding:35px;
    text-align:center;
    text-decoration:none;
    transition:0.3s;
}

.menu-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.menu-icon{
    font-size:55px;
    margin-bottom:15px;
}

.menu-card h4{
    color:#243447;
    font-size:22px;
    margin-bottom:10px;
}

.menu-card p{
    color:#64748b;
    line-height:1.6;
}

/* INFO BOX */

.info-box{
    margin-top:35px;
    border-top:1px solid #e5e7eb;
    padding-top:25px;
}

.info-box h4{
    color:#243447;
    margin-bottom:15px;
}

.info-box p{
    color:#64748b;
    margin-bottom:10px;
}

/* FOOTER */

.footer{
    margin-top:40px;
    text-align:center;
    color:#94a3b8;
}

@media(max-width:768px){

    .header{
        flex-direction:column;
        gap:10px;
    }

    .dashboard{
        padding:20px;
    }

    .welcome h2{
        font-size:30px;
    }

}

</style>
</head>

<body>

<div class="header">

    <div class="logo">
        Whispy Wash
    </div>

    <div class="user">
        <span>Profil</span>

        <a href="../auth/logout.php" class="logout-btn">
            Logout
        </a>
    </div>

</div>

<div class="dashboard">

    <div class="welcome">

        <h2>Dashboard Kurir</h2>

        <p>
            Kelola data penjemputan dan pengantaran laundry dengan mudah.
        </p>

    </div>

    <div class="card-container">

        <div class="card">

            <div class="card-title">
                Total Penjemputan
            </div>

            <div class="card-number">
                <?= $penjemputan ?>
            </div>

        </div>

        <div class="card">

            <div class="card-title">
                Total Pengantaran
            </div>

            <div class="card-number">
                <?= $pengantaran ?>
            </div>

        </div>

    </div>

    <div class="menu-section">

        <h3>Menu Kurir</h3>

        <div class="menu-card-container">

            <a href="data_penjemputan.php" class="menu-card">

                <div class="menu-icon">
                    📦
                </div>

                <h4>Penjemputan</h4>

                <p>
                    Kelola data penjemputan laundry pelanggan.
                </p>

            </a>

            <a href="data_pengantaran.php" class="menu-card">

                <div class="menu-icon">
                    🚚
                </div>

                <h4>Pengantaran</h4>

                <p>
                    Kelola data pengantaran laundry pelanggan.
                </p>

            </a>

        </div>

        <div class="info-box">

            <h4>Ringkasan Sistem</h4>

            <p>Total Penjemputan : <?= $penjemputan ?></p>

            <p>Total Pengantaran : <?= $pengantaran ?></p>

            <p>Status Sistem : Aktif</p>

        </div>

    </div>

    <div class="footer">
        © 2026 Whispy Wash Laundry Management System
    </div>

</div>

</body>
</html>