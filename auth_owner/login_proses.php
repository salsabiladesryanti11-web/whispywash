<?php
session_start();

include("../Config_owner/koneksi.php");

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn,"`
SELECT * FROM users
WHERE email='$email'
AND password='$password'
");

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['owner'] = true;
    $_SESSION['nama'] = $data['nama_lengkap'];

    header("Location: ../Owner_dashboard/dashboard.php");
    exit();

}else{

    echo "<script>
    alert('Email atau Password salah!');
    window.location='login.php';
    </script>";
}
?>