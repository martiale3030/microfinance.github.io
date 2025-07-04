<?php
require_once 'connexion.php';

// Maintenant tu peux utiliser $conn ici
$sql = "SELECT * FROM client";
$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['nom'] . "<br>";
}

if ($stmt->rowCount()) {
    echo "✅ Client ajouté avec succès.";
} else {
    echo "❌ Échec de l'ajout.";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Client</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
    }

    .form-container {
      max-width: 600px;
      background-color: #fff;
      margin: 0 auto;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      margin-top: 20px;
      width: 100%;
      background-color: #27ae60;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #219150;
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

  </style>
</head>
<body>

<a href="dashboard.php" class="btn-retour">← Retour au tableau de bord</a>

<h1>Ajouter un Nouveau Client</h1>

<div class="form-container">
  <form action="traitement_ajout_client.php" method="POST">
    <label for="id_client">ID Client</label>
    <input type="text" id="id_client" name="id_client" required>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenoms">Prénoms</label>
    <input type="text" id="prenoms" name="prenoms" required>

    <label for="telephone">Téléphone</label>
    <input type="tel" id="telephone" name="telephone" required>

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse" required>

    <label for="profession">Profession</label>
    <input type="text" id="profession" name="profession" required>

    <label for="type_client">Type de client</label>
    <select id="type_client" name="type_client" required>
      <option value="">-- Sélectionner --</option>
      <option value="individuel">individuel</option>
      <option value="entrepreneur">entrepreneur</option>
      <option value="salarié">salarié</option>
      <option value="institutionniel">institutionniel</option>
      <option value="groupe">groupe</option>
    </select>

    <button type="submit">Ajouter le client</button>
  </form>
</div>

</body>
</html>