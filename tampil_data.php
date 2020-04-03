<?php
$conn = mysqli_connect('localhost', 'root', 'mysql', 'db_ajax_mediatama');

$data = $conn->query("SELECT * FROM tb_siswa");

foreach ($data as $no => $row) {
?>
    <tr>
        <td><?php echo ++$no ?></td>
        <td><?php echo $row['siswa_nama'] ?></td>
        <td><?php echo $row['siswa_usia'] ?></td>
        <td><?php echo $row['siswa_tanggal_lahir'] ?></td>
        <td width="200  px">
            <button class="btn btn-warning" type="button" onclick="edit_data('<?php echo $row['siswa_id'] ?>')">Edit</button>
            <button class="btn btn-danger" type="button" onclick="hapus_data('<?php echo $row['siswa_id'] ?>')">Hapus</button>
        </td>
    </tr>
<?php
}
?>