<?php
require 'model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_data('peminjaman', 'id_peminjaman=' . $id);
    header('Location: peminjaman.php');
} else {
    header('Location: peminjaman.php');
}
?>
