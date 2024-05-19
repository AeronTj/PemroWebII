<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Peminjaman</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'model.php';
                $data_peminjaman = get_data('peminjaman');
                while($row = $data_peminjaman->fetch_assoc()) {
                    $member = get_data('member', 'id_member=' . $row['id_member'])->fetch_assoc();
                    $buku = get_data('buku', 'id_buku=' . $row['id_buku'])->fetch_assoc();
                    echo "<tr>
                    <td>{$row['id_peminjaman']}</td>
                    <td>{$member['nama_member']}</td>
                    <td>{$buku['judul_buku']}</td>
                    <td>{$row['tanggal_pinjam']}</td>
                    <td>{$row['tanggal_kembali']}</td>
                    <td>
                        <a href='formpeminjaman.php?id={$row['id_peminjaman']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapuspeminjaman.php?id={$row['id_peminjaman']}' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="formpeminjaman.php" class="btn btn-primary">Tambah Peminjaman</a>
    </div>
</body>
</html>
