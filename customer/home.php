<?php

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Home - Whispy Wash</title>

    <link rel="stylesheet" href="../assets/style.css">

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

    <div class="card">

        <h1>
            Pakaian Bersih,<br>
            Hidup Lebih Mudah
        </h1>

        <br>

        <h3>
            Halo,
            <?php echo $_SESSION['nama']; ?> 👋
        </h3>

        <br>

        <p>
            Nikmati layanan laundry antar jemput yang cepat,
            mudah, dan terpercaya bersama Whispy Wash.
        </p>

        <br>

        <a href="pesanan.php">
            <button class="btn">
                Jadwalkan Pengambilan Sekarang
            </button>
        </a>

    </div>

    <div class="card">

        <h2>Mengapa Memilih Whispy Wash?</h2>

        <br>

        <p>✅ Antar Jemput Laundry</p>
        <br>

        <p>✅ Harga Terjangkau</p>
        <br>

        <p>✅ Pengerjaan Cepat</p>
        <br>

        <p>✅ Pakaian Bersih dan Wangi</p>

    </div>

</div>

</body>
</html>