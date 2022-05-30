<?php
include dirname(__DIR__) . '/config/db.php';

function store($nama,$harga,$gambar){
    $query = "INSERT INTO barang VALUES ('','$nama','$harga','$gambar')";
    mysqli_query($GLOBALS['DB'], $query);

    return (mysqli_affected_rows($GLOBALS['DB']) > 0)
    ? true
    : false;
}
    
function view($outletId = null){
    $query = "SELECT * FROM barang ORDER BY id ASC";
    if ($outletId) {
        $query = "SELECT b.*, s.jumlah AS stok_barang, s.id AS stok_id FROM barang b
        INNER JOIN stok s ON s.barang_id = b.id
        INNER JOIN outlet o ON s.outlet_id = o.id
        WHERE s.outlet_id = '$outletId'";
    }
    $result = mysqli_query($GLOBALS['DB'], $query);
    
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }

    return $data;
}

function show($id) {
    $query = "SELECT * FROM barang WHERE id = '$id'";
    $result = mysqli_query($GLOBALS['DB'], $query);
    
    return mysqli_num_rows($result) > 0
    ? mysqli_fetch_assoc($result)
    : false;
}