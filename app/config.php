<?php
// Connexion à la base de données via env variables
$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpassword';
$db   = getenv('DB_NAME') ?: 'devops_demo';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
?>
