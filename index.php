<?php
// Démarrage de session (utile si plus tard tu veux gérer les connexions, les messages, etc.)
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Ma Microfinance</title>
    <style>
        /* === CSS intégré === */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #004080;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .hero {
            background-color: #e0e0e0;
            padding: 50px;
            text-align: center;
        }

        .hero h2 {
            margin-bottom: 10px;
        }

        .btn {
            background-color: #004080;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .services {
            padding: 30px;
            background-color: white;
            text-align: center;
        }

        .services ul {
            list-style-type: none;
            padding: 0;
        }

        .services li {
            padding: 10px;
            font-size: 18px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Ma Microfinance</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Bienvenue sur notre plateforme</h2>
        <p>Nous vous offrons des services d’épargne et de prêts adaptés à vos besoins.</p>
        <a href="connexion.php" class="btn">Accéder à votre espace</a>
    </section>

    <section class="services">
        <h3>Nos services</h3>
        <ul>
            <li>Ouverture de compte épargne</li>
            <li>Octroi de microcrédits</li>
            <li>Suivi de transactions en ligne</li>
        </ul>
    </section>

    <footer>
        <p>&copy; 2025 Ma Microfinance. Tous droits réservés.</p>
    </footer>

</body>
</html>
