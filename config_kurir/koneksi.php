<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "whispywash"
);

if(!$conn){
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>