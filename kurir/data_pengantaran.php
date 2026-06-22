<?php
include "../config/koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM pengantaran");
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Pengantaran</title>

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

/* HEADER */
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
    font-weight:700;
}

/* Dashboard button di header */
.header .dashboard-btn{
    text-decoration:none;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    font-weight:600;
    background:#3b82f6;
}

.header .dashboard-btn:hover{
    background:#2563eb;
}

/* CONTAINER */
.container{
    max-width:1200px;
    margin:auto;
    padding:40px;
}

/* TITLE */
.title-section{
    margin-bottom:20px;
}

.title-section h2{
    color:#243447;
    font-size:35px;
    margin-bottom:8px;
}

.title-section p{
    color:#64748b;
}

/* CARD TOTAL + BUTTON */
.card{
    background:white;
    padding:25px;
    border-radius:18px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
    margin-bottom:25px;
}

.card-info{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
}

.total-data{
    font-size:18px;
    color:#243447;
    font-weight:600;
}

.add-btn{
    text-decoration:none;
    background:#16a34a;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    font-weight:600;
}

.add-btn:hover{
    background:#15803d;
}

/* TABLE */
.table-container{ overflow-x:auto; }

table{
    width:100%;
    border-collapse:collapse;
}

table thead{ background:#243447; color:white; }
table th, table td{ padding:15px; text-align:left; }
table tbody tr{ border-bottom:1px solid #e5e7eb; }
table tbody tr:hover{ background:#f8fafc; }

/* STATUS */
.status{ padding:6px 12px; border-radius:20px; font-size:13px; font-weight:600; }
.siap{ background:#dbeafe; color:#1d4ed8; }
.sedang{ background:#fef3c7; color:#92400e; }
.selesai{ background:#dcfce7; color:#166534; }

/* BUTTON ACTION */
.detail-btn{
    text-decoration:none;
    background:#3b82f6;
    color:white;
    padding:8px 12px;
    border-radius:8px;
    margin-right:5px;
}

.detail-btn:hover{
    background:#2563eb;
}
.edit-btn{ text-decoration:none; background:#f59e0b; color:white; padding:8px 12px; border-radius:8px; margin-right:5px; }
.delete-btn{ text-decoration:none; background:#dc2626; color:white; padding:8px 12px; border-radius:8px; }
.edit-btn:hover{ background:#d97706; }
.delete-btn:hover{ background:#b91c1c; }

</style>
</head>

<body>

<div class="header">
    <div class="logo">Whispy Wash</div>
    <a href="dashboard.php" class="dashboard-btn"> ← Dashboard</a>
</div>

<div class="container">

    <div class="title-section">
        <h2>Data Pengantaran</h2>
        <p>Kelola data pengantaran laundry pelanggan</p>
    </div>

    <!-- CARD TOTAL + Tambah Data -->
    <div class="card">
        <div class="card-info">
            <div class="total-data">Total Data : <?= $total ?></div>
            <a href="tambah_pengantaran.php" class="add-btn">+ Tambah Data</a>
        </div>
    </div>

    <!-- TABLE DATA -->
    <div class="card">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nama_pelanggan']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['tanggal_antar']; ?></td>
                        <td>
                            <?php
                            if($row['status']=="Siap Diantar"){
                                echo "<span class='status siap'>Siap Diantar</span>";
                            } elseif($row['status']=="Sedang Diantar"){
                                echo "<span class='status sedang'>Sedang Diantar</span>";
                            } else{
                                echo "<span class='status selesai'>Selesai</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="detail_pengantaran.php?id=<?= $row['id']; ?>" class="detail-btn">Detail</a>
                            <a href="edit_pengantaran.php?id=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                            <a href="hapus_pengantaran.php?id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>