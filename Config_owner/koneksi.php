<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_wishpywash"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>