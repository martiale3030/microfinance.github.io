<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'microfinance';
$user = 'root';
$pass = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Vérifie si toutes les données sont présentes
        if (
            isset($_POST['id_client'], $_POST['nom'], $_POST['prenoms'], $_POST['telephone'],
                  $_POST['adresse'], $_POST['profession'], $_POST['type_client'])
        ) {
            // Récupération des données du formulaire
            $id_client = $_POST['id_client'];
            $nom = $_POST['nom'];
            $prenoms = $_POST['prenoms'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adresse'];
            $profession = $_POST['profession'];
            $type_client = $_POST['type_client'];

            // Requête d'insertion
            $sql = "INSERT INTO client (id_client, nom, prenoms, telephone, adresse, profession, type_client)
                    VALUES (:id_client, :nom, :prenoms, :telephone, :adresse, :profession, :type_client)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id_client' => $id_client,
                ':nom' => $nom,
                ':prenoms' => $prenoms,
                ':telephone' => $telephone,
                ':adresse' => $adresse,
                ':profession' => $profession,
                ':type_client' => $type_client
            ]);

            echo "✅ Client ajouté avec succès !<br><a href='ajout_client.php'>Ajouter un autre client</a>";

        } else {
            echo "❌ Tous les champs ne sont pas remplis.";
        }

    } else {
        echo "⚠ Le formulaire n’a pas été soumis correctement.";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>