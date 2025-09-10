<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    echo "<h2>Merci, $name ✅</h2>";
    echo "<p>Votre email est : $email</p>";
} else {
    echo "Accès interdit 🚫";
}
?>
