<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Member</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Bayar Terakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'model.php';
                $data_member = get_data('member');
                while($row = $data_member->fetch_assoc()) {
                    echo "<tr>
                    <td>{$row['id_member']}</td>
                    <td>{$row['nama_member']}</td>
                    <td>{$row['nomor_member']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['tgl_daftar']}</td>
                    <td>{$row['tgl_bayar_terakhir']}</td>
                    <td>
                        <a href='formmember.php?id={$row['id_member']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapusmember.php?id={$row['id_member']}' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="formmember.php" class="btn btn-primary">Tambah Member</a>
    </div>
</body>
</html>
