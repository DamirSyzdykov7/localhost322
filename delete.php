<?php 
require "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = $database->prepare("DELETE FROM `library` WHERE id = :id");
$query->bindParam(':id', $id);
if ($query->execute()) {
    echo "Запись успешно удалена!";
}


header("Location: /index.php");