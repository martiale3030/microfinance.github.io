<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Prêts</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        .btn-retour {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            background-color: #34495e;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
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

        .form-container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            font-weight: bold;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>

<a href="dashboard.php" class="btn-retour">← Retour au tableau de bord</a>

<h1>Gestion des Prêts</h1>

<!-- Tableau des prêts (sans données spécifiques) -->
<table>
    <thead>
        <tr>
            <th>ID Prêt</th>
            <th>Montant Initial</th>
            <th>Taux d'Intérêt (%)</th>
            <th>Date de Début</th>
            <th>Date de Fin</th>
            <th>Montant Total à Rembourser</th>
            <th>Montant Remboursé</th>
            <th>Solde Restant</th>
            <th>Statut du Prêt</th>
            <th>Statut du Paiement</th>
        </tr>
    </thead>
    <tbody>
        <!-- Lignes dynamiques à remplir avec PHP -->
    </tbody>
</table>

<!-- Formulaire de demande de prêt (sans données spécifiques) -->
<div class="form-container">
    <h2>Demander un nouveau prêt</h2>
    <form>
        <label for="montant">Montant souhaité :</label>
        <input type="number" id="montant" name="montant" placeholder="Ex : 50 000" required>

        <label for="duree">Durée du prêt (mois) :</label>
        <input type="number" id="duree" name="duree" placeholder="Ex : 12 mois" required>

        <button type="submit">Soumettre la demande</button>
    </form>
</div>

</body>
</html>
