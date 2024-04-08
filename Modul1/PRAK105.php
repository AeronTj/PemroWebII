<?php
$daftarSmartphone = array("S22" => "Samsung Galaxy S22", "S22+" => "Samsung Galaxy S22+", "A03" => "Samsung Galaxy A03", "Xcover5" => "Samsung Galaxy Xcover 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: sans-serif; 
            color: #232323;
        }
        table, th, td { 
            border: 1px solid;
        }
        th {
            background-color: red; 
            padding: 20px 25px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr>
            <td><?= $daftarSmartphone["S22"] ?></td>
        </tr>
        <tr>
            <td><?= $daftarSmartphone["S22+"] ?></td>
        </tr>
        <tr>
            <td><?= $daftarSmartphone["A03"] ?></td>
        </tr>
        <tr>
            <td><?= $daftarSmartphone["Xcover5"] ?></td>
        </tr>
    </table>
</body>
</html>