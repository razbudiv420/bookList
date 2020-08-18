<?php

require 'db.php';
$ident = $_POST['ident'];

$sql =  'DELETE  FROM `library` WHERE `id` = ?';
$query = $db->prepare($sql);
$query -> execute([$ident]);
 header('location: index.php');
 exit;
