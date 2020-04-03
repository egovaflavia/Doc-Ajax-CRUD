<?php
$conn = mysqli_connect('localhost', 'root', 'mysql', 'db_ajax_mediatama');

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM tb_siswa WHERE siswa_id = '$id'")->fetch_assoc();

echo json_encode($data);
