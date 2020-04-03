<?php
// Proses Ajax hapus yang berjalan di belakang layar
$conn = mysqli_connect('localhost', 'root', 'mysql', 'db_ajax_mediatama');

$id = $_GET['id'];

$data = $conn->query("DELETE FROM tb_siswa WHERE siswa_id = '$id'");
