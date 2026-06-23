<?php
include("../Config/koneksi.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn,"
SELECT * FROM users 
WHERE email='$email' 
AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if($data){

    // SESSION WAJIB SAMA DENGAN DASHBOARD
    $_SESSION['owner'] = true;
    $_SESSION['nama'] = $data['nama_lengkap'];

    header("Location: ../Owner/dashboard.php");
    exit();

}else{

    echo "<script>
    alert('Email atau Password salah!');
    window.location='login.php';
    </script>";

}
?>