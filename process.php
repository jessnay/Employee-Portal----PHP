<?php
require 'config.php';

$name = $_POST['name'];
$hours = $_POST['hours'];
$email = $_POST['email'];

$query = "INSERT INTO employees (name, hours_worked, email) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$name, $hours, $email]);

header('Location: view.php');
?>
