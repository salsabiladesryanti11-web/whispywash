<?php

session_start();

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM pesanan WHERE id='$id'"
);

$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $tanggal = $_POST['tanggal_pickup'];
    $waktu = $_POST['waktu_pickup'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn,"
        UPDATE pesanan
        SET
        tanggal_pickup='$tanggal',
        waktu_pickup='$waktu',
        alamat='$alamat'
        WHERE id='$id'
    ");

    header("Location: pesanan.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Pesanan - Whispy Wash</title>

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

        <h2>Edit Pesanan</h2>

        <br>

        <form method="POST">

            <label>Tanggal Pickup</label>

            <br><br>

            <input
            type="date"
            name="tanggal_pickup"
            value="<?= $d['tanggal_pickup']; ?>"
            required>

            <br><br>

            <label>Waktu Pickup</label>

            <br><br>

            <input
            type="time"
            name="waktu_pickup"
            value="<?= $d['waktu_pickup']; ?>"
            required>

            <br><br>

            <label>Alamat Penjemputan</label>

            <br><br>

            <textarea
            name="alamat"
            required><?= $d['alamat']; ?></textarea>

            <br><br>

            <button
            class="btn"
            name="update">

            Update Pesanan

            </button>

        </form>

    </div>

</div>

</body>
</html>