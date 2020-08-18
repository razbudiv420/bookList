<?php
require 'db.php';

$author = $_POST['authorName'];
$bookName = $_POST['bookName'];
$writeData = $_POST['date'];
$pages = $_POST['pages'];
$genre = $_POST['genre'];

$sql = 'INSERT INTO library(bookName, authorName, writeDate, genre, pages) VALUES (:bookName, :authorName, :writeDate, :genre, :pages)';
$query = $db->prepare($sql);
$query->execute(['bookName'=> $bookName, 'authorName'=>$author, 'writeDate'=>$writeData, 'genre'=>$genre, 'pages'=>$pages]);
header('location: index.php');;
exit;

