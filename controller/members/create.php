<?php

include '../../model/Member.php';
session_start();

$namaLengkap = $_POST['nama'];
$jenisKelamin = $_POST['jenis_kelamin'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$newMember = createNewMember($namaLengkap, $jenisKelamin, $alamat, $telepon);

if ($newMember !== false) {
  $data = getLastMember();
  $response = [
    'status' => 'success',
    'message' => 'Member baru berhasil ditambahkan',
    'data' => $data['id']
  ];
  
  $_SESSION['response'] = $response;
  header('location: ../../views/members/index.php');
}
