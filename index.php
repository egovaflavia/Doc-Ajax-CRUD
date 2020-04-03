<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Pakai Bootsraps CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajax CRUD</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="clo-12 ">
                <h2>AJAX CRUD</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <!-- Rancangan Form -->
                <form>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" class="form-control" id="id">
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Usia</label>
                        <input type="number" class="form-control" id="usia">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir">
                    </div>

                    <button class="btn btn-primary" id="simpan">Simpan</button>
                    <button class="btn btn-warning" id="kosong" onclick="bersihkan()">Bersihkan</button>
                </form>
            </div>
            <div class="col-6">
                <!-- Rancangan Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <!-- Ini yang di JavaScriptan id isi -->
                    <tbody id="isi"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            autoload();
            bersihkan();
        });

        // Mengosongkan Textfield dengan javascript /JQuery
        function bersihkan() {
            $('#nama').focus();
            $('#nama').val('');
            $('#usia').val('');
            $('#tanggal_lahir').val('');
        }

        $('#simpan').click(function(e) {
            // Mencegah Reload
            e.preventDefault();

            // Menangkap nilai dengan JQuery
            let nama = $('#nama').val();
            let usia = $('#usia').val();
            let tanggal_lahir = $('#tanggal_lahir').val();
            let id = $('#id').val();

            // Proses Ajax Simpan / Berjalan di belakang layar
            // Proses Ajax Edit / Berjalan di belakang layar
            // Nanti di logika kan di file simpan.php
            $.ajax({
                url: 'simpan.php',
                type: 'POST',
                data: {
                    // kiri nama $_POST yang di kirim ke type
                    // kanan nama variable javascript
                    'nama': nama,
                    'usia': usia,
                    'tanggal_lahir': tanggal_lahir,
                    'id': id
                },
                success: function() {
                    autoload();
                    bersihkan();
                }
            });
            bersihkan();
        });

        // Proses Ajax Menampilkan data yang akan di Edit / Berjalan di belakang layar
        // Kalau edit ada object dataType ny
        function edit_data(id) {
            $.ajax({
                url: 'tampil_edit.php',
                type: 'GET',
                data: {
                    'id': id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#nama').val(data.siswa_nama);
                    $('#usia').val(data.siswa_usia);
                    $('#tanggal_lahir').val(data.siswa_tanggal_lahir);
                    $('#id').val(data.siswa_id);
                }
            });
        }

        // Fungsi menampilkan isi data datalam table (tr)
        function autoload() {
            $('#isi').load('tampil_data.php');
        }

        // // Proses Ajax Hapus / Berjalan di belakang layar
        function hapus_data(id) {
            $.ajax({
                url: 'hapus.php',
                type: 'GET',
                data: {
                    'id': id
                },
                success: function() {
                    autoload();
                }
            })
        }
    </script>
</body>

</html>