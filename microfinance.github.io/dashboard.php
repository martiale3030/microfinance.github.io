<?php
session_start();

// Exemple de sécurisation (décommenter si nécessaire)
// if (!isset($_SESSION["utilisateur"])) {
//     header("Location: connexion.php");
//     exit();
// }

// Connexion à la base de données
$host = 'localhost';
$dbname = 'microfinance';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=localhost;dbname=microfinance",$username='root',$password='');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les prêts actifs
    $sql = "SELECT COUNT(*) AS nb_prets, SUM(montant) AS total_montant FROM prets WHERE statut = 'actif'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $nbPrets = $result['nb_prets'] ?? 0;
    $montantTotal = $result['total_montant'] ?? 0;

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    $nbPrets = 0;
    $montantTotal = 0;
}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - Ma Microfinance</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* En-tête */
        header {
            background-color: #004080;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #f0f0f0;
            position: fixed;
            height: 100%;
            top: 70px;
            left: 0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar a {
            display: block;
            color: #333;
            text-decoration: none;
            margin: 15px 0;
            font-weight: bold;
        }

        .sidebar a:hover {
            color: #004080;
        }

        /* Contenu principal */
        .content {
            margin-left: 240px;
            padding: 30px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            flex: 1;
            min-width: 250px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #004080;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Pied de page */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                box-shadow: none;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>



    <!-- En-tête -->
    <header>
        <h1>Ma Microfinance - Tableau de bord</h1>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="accueil.php">🏠 Accueil</a>
        <a href="client.php"><a href="client.php"><button>💰 Compte Client</button></a>

        <a href="liste_clients.php">📄 Voir tous les clients</a>
        <a href="prets.php">📄 Gérer les prêts</a>
        <a href="transactions.php">🔁 Transactions</a>
        <a href="ajout_client.php">➕ Ajouter un client</a>
        <a href="logout.php">🚪 Déconnexion</a>
    </div>

    <!-- Contenu principal -->
    <div class="content">
        <h2>Bienvenue, Martiale 👋</h2>
        <p>Choisissez une action ci-dessous pour gérer votre microfinance :</p>

        <div class="card-container">
            <div class="card">
                <h3>📊 Résumé des prêts</h3>
                <p>Prêts actifs : <strong><?= $nbPrets ?></strong><br>Montant total : <strong><?= number_format($montantTotal, 0, ',', ' ') ?> FCFA</strong></p>
                <a href="prets.php" class="btn">Voir les prêts</a>
            </div>

            <div class="card" style="background-color:#fff3cd;">
                <h3>💼 Nouvel enregistrement</h3>
                <p>Ajouter un nouveau client ou dossier.</p>
                <a href="ajout_client.php" class="btn">Ajouter un client</a>
            

            <div class="card" style="background-color:#d4edda;">
                <h3>🔍 Rechercher un client</h3>
                <form method="get" action="recherche.php">
                    <input type="text" name="query" placeholder="Nom ou ID client" required>
                    <br><br>
                    <input type="submit" class="btn" value="Rechercher">
                </form>
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        &copy; 2025 Ma Microfinance | Tous droits réservés
    </footer>

</body>
</html>


