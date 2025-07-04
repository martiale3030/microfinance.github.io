<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Déconnexion - Microfinance</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }

    .logout-container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      text-align: center;
    }

    h1 {
      color: #2c3e50;
      margin-bottom: 10px;
    }

    p {
      color: #555;
      margin-bottom: 30px;
    }

    .btn-retour {
      display: inline-block;
      padding: 12px 24px;
      background-color: #27ae60;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn-retour:hover {
      background-color: #219150;
    }
  </style>
</head>
<body>

  <div class="logout-container">
    <h1>Vous êtes déconnecté</h1>
    <p>Merci d’avoir utilisé notre plateforme de microfinance.</p>
    <a href="dashboard.php" class="btn-retour">↩ Retour à la connexion</a>
  </div>

</body>
</html>
