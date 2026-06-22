<?php

include '../config/koneksi.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch($method){

    case 'GET':

        $data = [];

        $query = mysqli_query(
            $conn,
            "SELECT id,nama,email,role
             FROM users"
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

        $password = md5($input['password']);

        mysqli_query(
            $conn,
            "INSERT INTO users
            (nama,email,password,role)
            VALUES(
            '{$input['nama']}',
            '{$input['email']}',
            '$password',
            'pelanggan'
            )"
        );

        echo json_encode([
            "message"=>"User berhasil ditambah"
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
            "UPDATE users
            SET
            nama='{$input['nama']}',
            email='{$input['email']}'
            WHERE id='$id'"
        );

        echo json_encode([
            "message"=>"User berhasil diupdate"
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
            "DELETE FROM users
            WHERE id='$id'"
        );

        echo json_encode([
            "message"=>"User berhasil dihapus"
        ]);

        break;
}
?>