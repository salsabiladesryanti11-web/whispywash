<?php

session_start();

include '../config/koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE email='$email'
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if($data){

    $_SESSION['id_user'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];

    header("Location: ../customer/home.php");

}else{

    echo "
    <script>
    alert('Email atau Password salah');
    window.location='login.php';
    </script>
    ";

}

?>