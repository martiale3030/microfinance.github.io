
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tableau de bord Client </title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
    }

    .grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      flex: 1;
      min-width: 280px;
    }

    .card h2 {
      font-size: 18px;
      color: #2980b9;
      margin-bottom: 10px;
    }

    .info p {
      margin: 6px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f1f1f1;
      color: #555;
    }

    .form {
      margin-top: 20px;
    }

    label, input, button {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }

    input {
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #27ae60;
      color: white;
      border: none;
      padding: 10px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #219150;
    }

    @media (max-width: 768px) {
      .grid {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
<a href="dashboard.php" class="btn-retour">← Retour au tableau de bord</a>
<a href="client.php">compte clients</a>
  <h1>Bienvenue, [Nom du client]</h1>

  <div class="grid">
    <div class="card">
      <h2>Informations personnelles</h2>
      <div class="info">
        <p><strong>ID Client :</strong> [id_client]</p>
        <p><strong>nom :</strong> [nom]</p>
        <p><strong>prenoms:</strong> [prenoms]</p>
        <p><strong>Téléphone :</strong> [téléphone]</p>
        <p><strong>adresse :</strong> [adresse]</p>
        <p><strong>profession:</strong> [profession]</p>
        <p><strong>type_client :</strong> [type_client]</p>
      </div>
    </div>

    <div class="card">
      <h2>État du compte</h2>
      <p><strong>Solde épargne :</strong> [solde_epargne] FCFA</p>
      <p><strong>Montant prêté :</strong> [montant_prete] FCFA</p>
      <p><strong>Montant à rembourser :</strong> [montant_rembourse] FCFA</p>
    </div>
  </div>

  <div class="card">
    <h2>Historique des transactions</h2>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Type</th>
          <th>Montant</th>
        </tr>
      </thead>
      <tbody>
        <!-- À remplir dynamiquement -->
      </tbody>
    </table>
  </div>

  <div class="card">
    <h2>Demande de prêt</h2>
    <form class="form">
      <label for="montant">Montant souhaité :</label>
      <input type="number" id="montant" name="montant" placeholder="Ex : 50 000" required>

      <button type="submit">Soumettre la demande</button>
    </form>
  </div>
  

</body>
</html>
