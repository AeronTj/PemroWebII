<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Buku</h2>
        <?php
        require 'model.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'judul_buku' => $_POST['judul_buku'],
                'penulis' => $_POST['penulis'],
                'penerbit' => $_POST['penerbit'],
                'tahun_terbit' => $_POST['tahun_terbit']
            ];
            if (isset($_POST['id_buku']) && !empty($_POST['id_buku'])) {
                update_data('buku', $data, "id_buku=" . $_POST['id_buku']);
            } else {
                insert_data('buku', $data);
            }
            header('Location: buku.php');
        } else if (isset($_GET['id'])) {
            $data_buku = get_data('buku', "id_buku=" . $_GET['id']);
            $buku = $data_buku->fetch_assoc();
        }
        ?>
        <form method="POST" action="formbuku.php">
            <input type="hidden" name="id_buku" value="<?= isset($buku) ? $buku['id_buku'] : '' ?>">
            <div class="form-group">
                <label for="judul_buku">Judul:</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= isset($buku) ? $buku['judul_buku'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= isset($buku) ? $buku['penulis'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= isset($buku) ? $buku['penerbit'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= isset($buku) ? $buku['tahun_terbit'] : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
