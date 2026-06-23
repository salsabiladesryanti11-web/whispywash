<?php
include("../Config/koneksi.php");

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT * FROM orders
WHERE id='$id'
")
);

if(isset($_POST['update'])){

    $layanan = $_POST['layanan'];
    $status = $_POST['status'];
    $tgl = $_POST['tgl'];

    mysqli_query($conn,"
    UPDATE orders
    SET
    layanan='$layanan',
    status='$status',
    tgl_order='$tgl'
    WHERE id='$id'
    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Pesanan</title>

<style>

body{
background:#f4f8fb;
font-family:'Segoe UI';
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.card{
width:500px;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h2{
text-align:center;
color:#2E6E9E;
margin-bottom:20px;
}

input,select{
width:100%;
padding:12px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:10px;
}

button{
width:100%;
padding:12px;
background:#2E6E9E;
color:white;
border:none;
border-radius:10px;
cursor:pointer;
}

</style>

</head>

<body>

<div class="card">

<h2>Edit Pesanan</h2>

<form method="POST">

<select name="layanan">

<option <?= $data['layanan']=='Wash'?'selected':'' ?>>
Wash
</option>

<option <?= $data['layanan']=='Dry Clean'?'selected':'' ?>>
Dry Clean
</option>

<option <?= $data['layanan']=='Express'?'selected':'' ?>>
Express
</option>

</select>

<select name="status">

<option <?= $data['status']=='Pending'?'selected':'' ?>>
Pending
</option>

<option <?= $data['status']=='Proses'?'selected':'' ?>>
Proses
</option>

<option <?= $data['status']=='Selesai'?'selected':'' ?>>
Selesai
</option>

</select>

<input
type="date"
name="tgl"
value="<?= $data['tgl_order']; ?>">

<button name="update">
Update Pesanan
</button>

</form>

</div>

</body>
</html>