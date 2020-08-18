<?php
require 'db.php';
$id = $_POST['id'];
function getAuthorById ($iden)
{
    global $db;
    $authors = $db->query("SELECT * FROM library WHERE `id` = $iden");
    foreach ($authors as $author) {
        return $author["authorName"];
    }
}

    $oldAuthor = getAuthorById($id);
    $authorPlus = $_POST["authorName"];
    $newAuthor = $oldAuthor . ', ' . $authorPlus;
    $sql = 'UPDATE `library` SET `authorName` = ? WHERE `library`.id = ?';
    $query = $db->prepare($sql);
    $query->execute([$newAuthor, $id]);
    header('location: index.php');
    exit;

