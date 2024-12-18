<?php

$db_host = 'sql102.infinityfree.com';
$db_dbname = 'if0_37937652_smp';
$db_username = 'if0_37937652';
$db_password = 'AguirBalotelli2';

// TODO: try catch errori connessione

$pdo = new PDO("mysql:host=$db_host;dbname=$db_dbname", $db_username, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
