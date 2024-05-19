<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Buku</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'model.php';
                $data_buku = get_data('buku');
                while($row = $data_buku->fetch_assoc()) {
                    echo "<tr>
                    <td>{$row['id_buku']}</td>
                    <td>{$row['judul_buku']}</td>
                    <td>{$row['penulis']}</td>
                    <td>{$row['penerbit']}</td>
                    <td>{$row['tahun_terbit']}</td>
                    <td>
                        <a href='formbuku.php?id={$row['id_buku']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapusbuku.php?id={$row['id_buku']}' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="formbuku.php" class="btn btn-primary">Tambah Buku</a>
    </div>
</body>
</html>
