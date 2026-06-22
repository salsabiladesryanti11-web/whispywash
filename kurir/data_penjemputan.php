<?php

include "../config_kurir/koneksi.php";

$data = mysqli_query(
    $conn,
    "SELECT * FROM penjemputan"
);

$total = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Penjemputan</title>

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
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.logo{
    font-size:28px;
    font-weight:700;
}

.back-btn{
    text-decoration:none;
    background:#3b82f6;
    color:white;
    padding:10px 18px;
    border-radius:8px;
}

.back-btn:hover{
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
    margin-bottom:30px;
}

.title-section h2{
    color:#243447;
    font-size:35px;
    margin-bottom:8px;
}

.title-section p{
    color:#64748b;
}

/* CARD */

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
    gap:15px;
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

.table-container{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

table thead{
    background:#243447;
    color:white;
}

table th,
table td{
    padding:15px;
    text-align:left;
}

table tbody tr{
    border-bottom:1px solid #e5e7eb;
}

table tbody tr:hover{
    background:#f8fafc;
}

/* STATUS */

.status{
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.status-proses{
    background:#fef3c7;
    color:#92400e;
}

.status-selesai{
    background:#dcfce7;
    color:#166534;
}

/* BUTTON */

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

.edit-btn{
    text-decoration:none;
    background:#f59e0b;
    color:white;
    padding:8px 12px;
    border-radius:8px;
    margin-right:5px;
}

.edit-btn:hover{
    background:#d97706;
}

.delete-btn{
    text-decoration:none;
    background:#dc2626;
    color:white;
    padding:8px 12px;
    border-radius:8px;
}

.delete-btn:hover{
    background:#b91c1c;
}

/* FOOTER */

.footer{
    text-align:center;
    margin-top:30px;
    color:#94a3b8;
}

@media(max-width:768px){

    .header{
        flex-direction:column;
        gap:15px;
    }

    .container{
        padding:20px;
    }

    .title-section h2{
        font-size:28px;
    }

}

</style>
</head>

<body>

<div class="header">

    <div class="logo">
        Whispy Wash
    </div>

    <a href="dashboard.php" class="back-btn">
        ← Dashboard
    </a>

</div>

<div class="container">

    <div class="title-section">
        <h2>Data Penjemputan</h2>
        <p>Kelola seluruh data penjemputan laundry pelanggan.</p>
    </div>

    <div class="card">

        <div class="card-info">

            <div class="total-data">
                Total Data : <?= $total ?>
            </div>

            <a href="tambah_penjemputan.php" class="add-btn">
                + Tambah Data
            </a>

        </div>

    </div>

    <div class="card">

        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Tanggal Jemput</th>
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

                        <td><?= $row['tanggal_jemput']; ?></td>

                        <td>

                            <?php
                            if(strtolower($row['status']) == "selesai"){
                                echo "<span class='status status-selesai'>Selesai</span>";
                            }else{
                                echo "<span class='status status-proses'>Proses</span>";
                            }
                            ?>

                        </td>

                        <td>

                            <a href="detail_penjemputan.php?id=<?= $row['id']; ?>"
                            class="detail-btn">
                                Detail
                            </a>

                            <a href="edit_penjemputan.php?id=<?= $row['id']; ?>"
                            class="edit-btn">
                                Edit
                            </a>

                            <a href="hapus_penjemputan.php?id=<?= $row['id']; ?>"
                            class="delete-btn"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="footer">
        © 2026 Whispy Wash Laundry Management System
    </div>

</div>

</body>
</html>