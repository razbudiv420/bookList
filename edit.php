<?php

require 'db.php';
$author = $_POST['authorName'];
$bookName = $_POST['bookName'];
$writeData = $_POST['date'];
$pages = $_POST['pages'];
$genre = $_POST['genre'];
$id = $_POST['id'];

$sql = 'UPDATE `library` SET `authorName` = ?, `bookName` = ?, `writeDate` = ?, `pages` = ?, `genre`= ? WHERE `library`.id = ?';
$query = $db->prepare($sql);
$query->execute([$author, $bookName, $writeData, $pages, $genre, $id]);
header('location: index.php');
exit;
