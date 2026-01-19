<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':id' => $id])) {
        header("Location: index.php");
    } else {
        echo "<div style='color:red'>Faild</div>";
    }
}