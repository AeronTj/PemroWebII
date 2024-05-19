<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
        <?php
        require 'model.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_member' => $_POST['id_member'],
                'id_buku' => $_POST['id_buku'],
                'tanggal_pinjam' => $_POST['tanggal_pinjam'],
                'tanggal_kembali' => $_POST['tanggal_kembali']
            ];
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $result = update_data('peminjaman', $data, "id_peminjaman=" . $_POST['id']);
            } else {
                $result = insert_data('peminjaman', $data);
            }
            header('Location: peminjaman.php');
        } else if (isset($_GET['id'])) {
            $data_peminjaman = get_data('peminjaman', "id_peminjaman=" . $_GET['id']);
            $peminjaman = $data_peminjaman->fetch_assoc();
        }
        
        $members = get_data('member');
        $books = get_data('buku');
        ?>
        <form method="POST" action="formpeminjaman.php">
            <input type="hidden" name="id" value="<?= isset($peminjaman) ? $peminjaman['id_peminjaman'] : '' ?>">
            <div class="form-group">
                <label for="id_member">Nama Member:</label>
                <select class="form-control" id="id_member" name="id_member">
                    <?php
                    while ($member = $members->fetch_assoc()) {
                        $selected = isset($peminjaman) && $peminjaman['id_member'] == $member['id_member'] ? 'selected' : '';
                        echo "<option value='{$member['id_member']}' $selected>{$member['nama_member']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_buku">Judul Buku:</label>
                <select class="form-control" id="id_buku" name="id_buku">
                    <?php
                    while ($book = $books->fetch_assoc()) {
                        $selected = isset($peminjaman) && $peminjaman['id_buku'] == $book['id_buku'] ? 'selected' : '';
                        echo "<option value='{$book['id_buku']}' $selected>{$book['judul_buku']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= isset($peminjaman) ? $peminjaman['tanggal_pinjam'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= isset($peminjaman) ? $peminjaman['tanggal_kembali'] : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
