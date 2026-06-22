<?php

session_start();

include '../config/koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
}

// CREATE
if(isset($_POST['simpan'])){

    $id_user = $_SESSION['id_user'];
    $tanggal = $_POST['tanggal_pickup'];
    $waktu = $_POST['waktu_pickup'];
    $alamat = $_POST['alamat'];
    $instruksi = $_POST['instruksi'];

    mysqli_query($conn,"
        INSERT INTO pesanan
        (id_user,tanggal_pickup,waktu_pickup,alamat,instruksi)
        VALUES
        ('$id_user','$tanggal','$waktu','$alamat','$instruksi')
    ");

    header("Location: pesanan.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Schedule Pickup - Whispy Wash</title>

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

        <h2>Schedule Pickup & Delivery</h2>

        <br>

        <form method="POST">

            <label>Tanggal Pickup</label>

            <br><br>

            <input
            type="date"
            name="tanggal_pickup"
            required>

            <br><br>

            <label>Waktu Pickup</label>

            <br><br>

            <input
            type="time"
            name="waktu_pickup"
            required>

            <br><br>

            <label>Alamat Penjemputan</label>

            <br><br>

            <textarea
            name="alamat"
            required></textarea>

            <br><br>

            <label>Instruksi Khusus</label>

            <br><br>

            <textarea
            name="instruksi"></textarea>

            <br><br>

            <button
            type="submit"
            name="simpan"
            class="btn">

            Buat Pesanan

            </button>

        </form>

    </div>

    <div class="card">

        <h2>Daftar Pesanan Saya</h2>

        <br>

        <table>

            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php

            $id_user = $_SESSION['id_user'];

            $data = mysqli_query(
                $conn,
                "SELECT * FROM pesanan
                WHERE id_user='$id_user'"
            );

            while($d = mysqli_fetch_array($data)){

            ?>

            <tr>

                <td><?= $d['id']; ?></td>
                <td><?= $d['tanggal_pickup']; ?></td>
                <td><?= $d['waktu_pickup']; ?></td>
                <td><?= $d['alamat']; ?></td>
                <td><?= $d['status']; ?></td>

                <td>

                    <a href="edit_pesanan.php?id=<?= $d['id']; ?>">
                        Edit
                    </a>

                    |

                    <a
                    href="hapus_pesanan.php?id=<?= $d['id']; ?>"
                    onclick="return confirm('Yakin ingin menghapus pesanan ini?')">

                    Hapus

                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>