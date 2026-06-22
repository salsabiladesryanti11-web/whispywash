<?php

session_start();

include '../config/koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
}

$id = $_SESSION['id_user'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$id'"
);

$user = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Profile - Whispy Wash</title>

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

        <h2>Profil Saya</h2>

        <br>

        <p>
            <strong>Nama :</strong><br>
            <?= $user['nama']; ?>
        </p>

        <br>

        <p>
            <strong>Email :</strong><br>
            <?= $user['email']; ?>
        </p>

        <br>

        <p>
            <strong>Role :</strong><br>
            <?= $user['role']; ?>
        </p>

        <br><br>

        <a href="edit_profile.php">
            <button class="btn">
                Edit Profile
            </button>
        </a>

        <br><br>

        <a href="hapus_akun.php?id=<?= $user['id']; ?>"
        onclick="return confirm('Yakin hapus akun?')">

            <button class="btn">
                Hapus Akun
            </button>

        </a>

    </div>

</div>

</body>
</html>