<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $conn = new PDO("mysql:host=localhost;dbname=microfinance;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Connexion réussie.<br>";

    $stmt = $conn->query("SELECT * FROM client");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$clients) {
        echo "⚠ Table 'client' vide.";
    } else {
        echo "✅ Données trouvées :<br>";
        print_r($clients);
    }
} catch (PDOException $e) {
    die("❌ Erreur SQL : " . $e->getMessage());
}
