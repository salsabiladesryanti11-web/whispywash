<?php

include "../config/koneksi.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch($method){

    case 'GET':

        $query = mysqli_query($conn,"SELECT * FROM penjemputan");

        $data = [];

        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }

        echo json_encode($data);
        break;

    case 'POST':

        $nama = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $tanggal = $_POST['tanggal_jemput'];

        mysqli_query($conn,"
            INSERT INTO penjemputan
            (nama_pelanggan,alamat,tanggal_jemput)
            VALUES
            ('$nama','$alamat','$tanggal')
        ");

        echo json_encode([
            "message"=>"Data berhasil ditambahkan"
        ]);
        break;

}
?>