<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Member</h2>
        <?php
        require 'model.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_member' => $_POST['nama_member'],
                'nomor_member' => $_POST['nomor_member'],
                'alamat' => $_POST['alamat'],
                'tgl_daftar' => $_POST['tgl_daftar'],
                'tgl_bayar_terakhir' => $_POST['tgl_bayar_terakhir']
            ];
            if (isset($_POST['id_member']) && !empty($_POST['id_member'])) {
                update_data('member', $data, "id_member=" . $_POST['id_member']);
            } else {
                insert_data('member', $data);
            }
            header('Location: member.php');
        } else if (isset($_GET['id'])) {
            $data_member = get_data('member', "id_member=" . $_GET['id']);
            $member = $data_member->fetch_assoc();
        }
        ?>
        <form method="POST" action="formmember.php">
            <input type="hidden" name="id_member" value="<?= isset($member) ? $member['id_member'] : '' ?>">
            <div class="form-group">
                <label for="nama_member">Nama Member:</label>
                <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= isset($member) ? $member['nama_member'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_member">Nomor Member:</label>
                <input type="text" class="form-control" id="nomor_member" name="nomor_member" value="<?= isset($member) ? $member['nomor_member'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= isset($member) ? $member['alamat'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_daftar">Tanggal Daftar:</label>
                <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="<?= isset($member) ? $member['tgl_daftar'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_bayar_terakhir">Tanggal Bayar Terakhir:</label>
                <input type="date" class="form-control" id="tgl_bayar_terakhir" name="tgl_bayar_terakhir" value="<?= isset($member) ? $member['tgl_bayar_terakhir'] : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
