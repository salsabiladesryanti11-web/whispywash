<?php

include '../config/koneksi.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch($method){

    case 'GET':

        $data = [];

        $query = mysqli_query(
            $conn,
            "SELECT * FROM pesanan"
        );

        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }

        echo json_encode($data);

        break;


    case 'POST':

        $input = json_decode(
            file_get_contents("php://input"),
            true
        );

        mysqli_query(
            $conn,
            "INSERT INTO pesanan
            (id_user,tanggal_pickup,waktu_pickup,alamat,instruksi,status)
            VALUES(
            '{$input['id_user']}',
            '{$input['tanggal_pickup']}',
            '{$input['waktu_pickup']}',
            '{$input['alamat']}',
            '{$input['instruksi']}',
            'Menunggu'
            )"
        );

        echo json_encode([
            "message"=>"Pesanan berhasil ditambah"
        ]);

        break;


    case 'PUT':

        parse_str(
            $_SERVER['QUERY_STRING'],
            $params
        );

        $id = $params['id'];

        $input = json_decode(
            file_get_contents("php://input"),
            true
        );

        mysqli_query(
            $conn,
            "UPDATE pesanan
            SET
            tanggal_pickup='{$input['tanggal_pickup']}',
            waktu_pickup='{$input['waktu_pickup']}',
            alamat='{$input['alamat']}'
            WHERE id='$id'"
        );

        echo json_encode([
            "message"=>"Pesanan berhasil diupdate"
        ]);

        break;


    case 'DELETE':

        parse_str(
            $_SERVER['QUERY_STRING'],
            $params
        );

        $id = $params['id'];

        mysqli_query(
            $conn,
            "DELETE FROM pesanan
            WHERE id='$id'"
        );

        echo json_encode([
            "message"=>"Pesanan berhasil dihapus"
        ]);

        break;
}
?>