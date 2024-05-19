<?php
function open_connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "perpustakaan";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}

function get_data($table, $condition = "") {
    $conn = open_connection();
    $sql = "SELECT * FROM $table";
    if ($condition != "") {
        $sql .= " WHERE $condition";
    }
    $result = $conn->query($sql);
    if ($result === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
    $conn->close();
    return $result;
}

function insert_data($table, $data) {
    $conn = open_connection();
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_map([$conn, 'real_escape_string'], array_values($data)));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
    if ($conn->query($sql) === TRUE) {
        $result = "New record created successfully";
    } else {
        $result = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    return $result;
}

function update_data($table, $data, $condition) {
    if (empty($condition)) {
        return "Error: Condition cannot be empty";
    }

    $conn = open_connection();
    $set = "";
    foreach ($data as $column => $value) {
        $set .= "$column='" . $conn->real_escape_string($value) . "', ";
    }
    $set = rtrim($set, ", ");
    $sql = "UPDATE $table SET $set WHERE $condition";
    if ($conn->query($sql) === TRUE) {
        $result = "Record updated successfully";
    } else {
        $result = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    return $result;
}

function delete_data($table, $condition) {
    if (empty($condition)) {
        return "Error: Condition cannot be empty";
    }

    $conn = open_connection();
    $sql = "DELETE FROM $table WHERE $condition";
    if ($conn->query($sql) === TRUE) {
        $result = "Record deleted successfully";
    } else {
        $result = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    return $result;
}
?>
