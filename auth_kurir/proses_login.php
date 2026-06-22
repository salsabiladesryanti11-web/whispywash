<?php
session_start();

include "../config_kurir/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE username='$username'
     AND password='$password'
     AND role='kurir'"
);

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    header ("Location: ../kurir/dashboard.php");
    exit;

}else{

    echo "
    <script>
        alert('Username atau Password Salah');
        window.location='login.php';
    </script>
    ";

}
?>