<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'microfinance';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si l'ID client a été envoyé
if (isset($_GET['id_client']) && !empty($_GET['id_client'])) {
    $id_client = htmlspecialchars($_GET['id_client']);

    // Requête SQL pour rechercher le client
    $sql = "SELECT * FROM client WHERE id_client = :id_client";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_client' => $id_client]);
    $client = $stmt->fetch();

} else {
    $client = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat de recherche</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        .result {
            margin-top: 20px;
        }

        .result p {
            margin: 8px 0;
        }

        .btn-retour {
            display: inline-block;
            margin-top: 20px;
            background-color: #2980b9;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn-retour:hover {
            background-color: #21618c;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Résultat de la recherche</h1>

    <?php if ($client): ?>
        <div class="result">
            <p><strong>ID Client :</strong> <?= htmlspecialchars($client['id_client']) ?></p>
            <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
            <p><strong>Prénoms :</strong> <?= htmlspecialchars($client['prenoms']) ?></p>
            <p><strong>Téléphone :</strong> <?= htmlspecialchars($client['telephone']) ?></p>
            <p><strong>Adresse :</strong> <?= htmlspecialchars($client['adresse']) ?></p>
            <p><strong>Profession :</strong> <?= htmlspecialchars($client['profession']) ?></p>
            <p><strong>Type de client :</strong> <?= htmlspecialchars($client['type_client']) ?></p>
        </div>
    <?php else: ?>
        <p>Aucun client trouvé avec l’ID donné.</p>
    <?php endif; ?>

    <a href="dashboard.php" class="btn-retour">← Nouvelle recherche</a>
</div>

</body>
</html>
