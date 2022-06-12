<?php
include '../../model/Barang.php';
include '../../model/Stok.php';
session_start();

$idbarang = $_POST['idbrg'];
$idstok = $_POST['idstok'];

$deleteStok = deleteStokById($idstok);

if ($deleteStok !== false) {
    $response = [
        'status' => 'success',
        'message' => 'Stok Barang Berhasil Di Hapus'
      ];

    $_SESSION['response'] = $response;
    header("location:../../views/barang/show-barang.php?id=$idbarang");
}
else {
    $response = [
        'status' => 'error',
        'message' => 'Stok Barang Gagal Di Hapus'
      ];

    $_SESSION['response'] = $response;
    header("location:../../views/barang/show-barang.php?id=$idbarang");
}
?>