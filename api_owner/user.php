<?php

include("../Config/koneksi.php");

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){

$data = [];

$query = mysqli_query($conn,"SELECT * FROM users");

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data);

}

if($method == 'POST'){

$nama = $_POST['nama_lengkap'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($conn,"
INSERT INTO users
(nama_lengkap,email,password)
VALUES
('$nama','$email','$password')
");

echo json_encode([
"message"=>"User berhasil ditambahkan"
]);

}
?>