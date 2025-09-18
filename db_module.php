<?php
require_once("config.php");

function getConnection() {
    global $host, $user, $pass, $db;
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function executeQuery($sql, $isSelect = true) {
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);
    if ($isSelect) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_close($conn);
        return $data;
    } else {
        mysqli_close($conn);
        return $result;
    }
}
?>
