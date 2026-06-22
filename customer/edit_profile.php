<?php

session_start();

include '../config/koneksi.php';

$id = $_SESSION['id_user'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$id'"
);

$user = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    mysqli_query(
        $conn,
        "UPDATE users
         SET nama='$nama',
             email='$email'
         WHERE id='$id'"
    );

    $_SESSION['nama'] = $nama;

    header("Location: profile.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Profile - Whispy Wash</title>

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

        <h2>Edit Profile</h2>

        <br>

        <form method="POST">

            <label>Nama</label>

            <br><br>

            <input
            type="text"
            name="nama"
            value="<?= $user['nama']; ?>"
            required>

            <br><br>

            <label>Email</label>

            <br><br>

            <input
            type="email"
            name="email"
            value="<?= $user['email']; ?>"
            required>

            <br><br>

            <button
            class="btn"
            name="update">

            Update Profile

            </button>

        </form>

    </div>

</div>

</body>
</html>