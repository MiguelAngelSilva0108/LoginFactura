<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  $stmt = $conn->query("SELECT * FROM tabla_prueba");
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  print_r($rows);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>