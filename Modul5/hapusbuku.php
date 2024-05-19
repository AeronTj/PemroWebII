<?php
require 'model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_data('buku', 'id_buku=' . $id);
    header('Location: buku.php');
} else {
    header('Location: buku.php');
}
?>
