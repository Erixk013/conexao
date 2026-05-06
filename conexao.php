<?php 
$host = "localhost";
$banco = "biblioteca2";
$user = "root";
$password = "usbw"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage());
}
