<?php
include("../Config/koneksi.php");

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT * FROM users
WHERE id='$id'
")
);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    mysqli_query($conn,"
    UPDATE users
    SET
    nama_lengkap='$nama',
    email='$email'
    WHERE id='$id'
    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User - Whispy Wash</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f8fb;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:500px;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.1);
}

.logo{
    text-align:center;
    margin-bottom:15px;
}

.logo img{
    width:120px;
}

h2{
    text-align:center;
    color:#2E6E9E;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#2E6E9E;
}

input{
    width:100%;
    padding:12px;
    border:2px solid #dceef1;
    border-radius:10px;
    margin-bottom:18px;
}

input:focus{
    outline:none;
    border-color:#5CC8C6;
}

.btn{
    width:100%;
    background:#2E6E9E;
    color:white;
    border:none;
    padding:14px;
    border-radius:10px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    background:#24587D;
}

.kembali{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#2E6E9E;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="card">

<div class="logo">
    <img src="../assets/logo.png">
</div>

<h2>Edit User</h2>

<form method="POST">

<label>Nama Lengkap</label>
<input
type="text"
name="nama"
value="<?= $data['nama_lengkap']; ?>"
required>

<label>Email</label>
<input
type="email"
name="email"
value="<?= $data['email']; ?>"
required>

<button type="submit" name="update" class="btn">
Update User
</button>

</form>

<a href="index.php" class="kembali">
← Kembali ke Data User
</a>

</div>

</body>
</html>