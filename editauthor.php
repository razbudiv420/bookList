<?php
require 'db.php';
$author = $_POST["authorName"];
$new = $_POST['new'];
try {
    if (empty($author)) {
        throw new Exception('Значение автора не должно быть пустым!');
}
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$sql = "UPDATE `library` SET `authorName` = ? WHERE `library`.authorName LIKE lower('%$author%')";
$query = $db->prepare($sql);
$query->execute([$new]);
header('location: index.php');
exit;