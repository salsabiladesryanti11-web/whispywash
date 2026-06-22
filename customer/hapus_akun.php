<?php

session_start();

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM users
     WHERE id='$id'"
);

session_destroy();

header("Location: ../auth/register.php");

?>