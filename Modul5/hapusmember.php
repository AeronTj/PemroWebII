<?php
require 'model.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_data('member', 'id_member=' . $id);
    header('Location: member.php');
} else {
    header('Location: member.php');
}
?>
