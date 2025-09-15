<?php
require 'config.php';

// Récupérer tous les utilisateurs
$result = $conn->query("SELECT id, name, email, created_at FROM users ORDER BY created_at DESC");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Liste des utilisateurs 🚀</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".htmlspecialchars($row['id'])."</td>";
                echo "<td>".htmlspecialchars($row['name'])."</td>";
                echo "<td>".htmlspecialchars($row['email'])."</td>";
                echo "<td>".htmlspecialchars($row['created_at'])."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center'>Aucun utilisateur trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>
