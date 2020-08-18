<?php

$dbhost = 'localhost';
$dbname = 'bookslibrary';
$db_user = 'root';
$db_pass = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$db = new PDO("mysql:host=$dbhost; dbname=$dbname; charset = utf-8", $db_user, $db_pass);

//Получение всех книг из БД
function getAllBooks($limit, $offset)
{
    global $db;
    $allBooks = $db->query("SELECT *  from `library` LIMIT $limit OFFSET $offset");
    return $allBooks;
}

function getBooksByAuthor($limit, $offset)
{
    global $db;
    $key = $_POST['filter-auth'];
    $allBooks = $db-> query("SELECT * FROM `library` WHERE `authorName` LIKE lower('%$key%')");
    return $allBooks;
}
function getBooksByName($limit, $offset)
{
    global $db;
    $key = $_POST['filter-bookName'];
    $allBooks = $db->query("SELECT * from `library` WHERE `genre` LIKE lower('%$key%') LIMIT $limit OFFSET $offset");
    return $allBooks;
}
function getBooksByDate($limit, $offset)
{
    global $db;
    $key = $_POST['filter-date'];
    $allBooks = $db->query("SELECT * from `library` WHERE `writeDate` LIKE lower('%$key%')");
    return $allBooks;
}
//Сортировка всех книг по названию
function getAllBooksSortName($limit, $offset)
{
    global $db;
    $allBooks = $db->query("SELECT *  from library  ORDER BY `bookName` LIMIT $limit OFFSET $offset");
    return $allBooks;
}
//Сортировка всех книг по дате
function getAllBooksSortDate($limit, $offset)
{
    global $db;
    $allBooks = $db->query("SELECT *  from library  ORDER BY `writeDate` LIMIT $limit OFFSET $offset");
    return $allBooks;
}

function countPages () {
    global $db;
    $count = $db->query("SELECT `id` from library");
    $countPages = $count->rowCount();
    return $countPages;
}




