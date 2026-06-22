<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pricing - Whispy Wash</title>

    <link rel="stylesheet" href="../assets/style.css">

    <style>

    .pricing-container{
        display:flex;
        gap:20px;
        justify-content:center;
        flex-wrap:wrap;
        margin-top:30px;
    }

    .pricing-card{
        background:white;
        width:300px;
        border-radius:20px;
        padding:30px;
        text-align:center;
        box-shadow:0 4px 15px rgba(0,0,0,0.08);
    }

    .pricing-card h2{
        color:#37CFC3;
        margin-bottom:15px;
    }

    .price{
        font-size:30px;
        font-weight:bold;
        margin:20px 0;
    }

    .pricing-card ul{
        list-style:none;
        margin:20px 0;
    }

    .pricing-card ul li{
        padding:8px;
    }

    </style>

</head>
<body>

<div class="navbar">

    <div class="logo">
        Whispy Wash
    </div>

    <div class="menu">
        <a href="home.php">Home</a>
        <a href="pricing.php">Pricing</a>
        <a href="pesanan.php">Schedule Pickup</a>
        <a href="profile.php">Profile</a>
        <a href="../auth/logout.php">Logout</a>
    </div>

</div>

<div class="container">

    <center>

    <h1>Pricing Plans</h1>

    <p>
        Pilih paket laundry sesuai kebutuhanmu
    </p>

    </center>

    <div class="pricing-container">

        <div class="pricing-card">

            <h2>Regular</h2>

            <div class="price">
                Rp25.000/kg
            </div>

            <ul>
                <li>Cuci</li>
                <li>Kering</li>
                <li>Setrika</li>
                <li>2-3 Hari</li>
            </ul>

            <a href="pesanan.php">
                <button class="btn">
                    Pilih Paket
                </button>
            </a>

        </div>

        <div class="pricing-card">

            <h2>Premium</h2>

            <div class="price">
                Rp35.000/kg
            </div>

            <ul>
                <li>Cuci Premium</li>
                <li>Parfum Premium</li>
                <li>Setrika</li>
                <li>1-2 Hari</li>
            </ul>

            <a href="pesanan.php">
                <button class="btn">
                    Pilih Paket
                </button>
            </a>

        </div>

        <div class="pricing-card">

            <h2>Express</h2>

            <div class="price">
                Rp50.000/kg
            </div>

            <ul>
                <li>Prioritas</li>
                <li>Same Day Service</li>
                <li>Setrika</li>
                <li>Antar Jemput</li>
            </ul>

            <a href="pesanan.php">
                <button class="btn">
                    Pilih Paket
                </button>
            </a>

        </div>

    </div>

</div>

</body>
</html>
