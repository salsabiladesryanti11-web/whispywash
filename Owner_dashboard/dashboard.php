<?php
session_start();

if(!isset($_SESSION['owner'])){
    header("Location: ../auth_owner/login.php");
    exit();
}

include("../Config_owner/koneksi.php");

$totalUser = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$totalOrder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders"));
$totalPending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status='Pending'"));
$totalSelesai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status='Selesai'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Whispy Wash</title>

<style>

body{
    margin:0;
    font-family:Segoe UI;
    background:#f4f8fb;
}

/* SIDEBAR */
.sidebar{
    position:fixed;
    width:260px;
    height:100%;
    background:linear-gradient(180deg,#2E6E9E,#5CC8C6);
    padding-top:20px;
}

.sidebar h2{
    color:white;
    text-align:center;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    transition:0.3s;
    font-weight:bold;
}

.sidebar a:hover{
    background:white;
    color:#2E6E9E;
    border-radius:10px;
    margin:5px;
}

/* MAIN */
.main{
    margin-left:260px;
    padding:30px;
}

/* HEADER */
.header{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 3px 15px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

.header h1{
    margin:0;
    color:#2E6E9E;
}

/* CARD */
.cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.card{
    padding:25px;
    border-radius:20px;
    color:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h2{
    font-size:32px;
    margin:10px 0 0;
}

.user{background:#2E6E9E;}
.order{background:#5CC8C6;}
.pending{background:#f39c12;}
.selesai{background:#27ae60;}

/* FOOTER BOX */
.box{
    margin-top:25px;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🧺 Whispy Wash</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="../Pelanggan/index.php">👤 User</a>
    <a href="../pesanan/index.php">📦 Pesanan</a>
    <a href="../auth/logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="header">
    <h1>Dashboard Owner</h1>
    <p>Selamat datang, <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="cards">

    <div class="card user">
        <h3>Total User</h3>
        <h2><?= $totalUser; ?></h2>
    </div>

    <div class="card order">
        <h3>Total Pesanan</h3>
        <h2><?= $totalOrder; ?></h2>
    </div>

    <div class="card pending">
        <h3>Pending</h3>
        <h2><?= $totalPending; ?></h2>
    </div>

    <div class="card selesai">
        <h3>Selesai</h3>
        <h2><?= $totalSelesai; ?></h2>
    </div>

</div>

<div class="box">
    <h3>📊 Sistem Whispy Wash Active</h3>
    <p>Dashboard ini digunakan untuk mengelola user dan pesanan laundry secara real-time.</p>
</div>

</div>

</body>
</html>