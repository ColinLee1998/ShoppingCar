<?php
    session_start();
    unset($_SESSION['customer']);
    $pdo = new PDO('mysql:host=localhost; dbname=shop; charset=utf8', '')
?>