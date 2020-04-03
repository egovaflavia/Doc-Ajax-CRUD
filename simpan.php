<?php
$conn = mysqli_connect('localhost', 'root', 'mysql', 'db_ajax_mediatama');

$id            = $_POST['id'];
$nama          = $_POST['nama'];
$usia          = $_POST['usia'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Logika nya
// Klw ad variable id = edit, klw ndak brarti tambah
if ($id != 0 or $id != null) {
    $query = "UPDATE `tb_siswa` SET `siswa_nama` = '$nama', `siswa_usia` = '$usia', `siswa_tanggal_lahir` = '$tanggal_lahir' WHERE `siswa_id` = '$id' ";
    $conn->query($query);
} else {
    $query = "INSERT INTO `tb_siswa` (`siswa_nama`, `siswa_usia`, `siswa_tanggal_lahir`) VALUES ('$nama','$usia','$tanggal_lahir')";
    $conn->query($query);
}
