<?php
include "../config_kurir/koneksi.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM penjemputan
    WHERE id='$id'"
);

header("Location:data_penjemputan.php");