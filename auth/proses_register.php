<?php

include '../config/koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query(
    $conn,
    "INSERT INTO users(nama,email,password,role)
     VALUES('$nama','$email','$password','pelanggan')"
);

if($query){
    echo "
    <script>
    alert('Register berhasil');
    window.location='login.php';
    </script>
    ";
}else{
    echo "Gagal Register";
}

?>