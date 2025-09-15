<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);

    // Insérer dans la base
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->close();

    echo "<h2>Merci, $name ✅</h2>";
    echo "<p>Votre email est : $email</p>";
} else {
    echo "Accès interdit 🚫";
}
?>
