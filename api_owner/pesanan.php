<?php
include "../Config_owner/koneksi.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $data = mysqli_query($conn, "SELECT * FROM orders");

    $result = [];
    while($row = mysqli_fetch_assoc($data)){
        $result[] = $row;
    }

    echo json_encode($result);
}

if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    parse_str(file_get_contents("php://input"), $put);

    $id = $put['id'];
    $status = $put['status'];

    mysqli_query($conn,
    "UPDATE orders SET status='$status' WHERE id='$id'");

    echo json_encode(["message"=>"Status updated"]);
}
?>