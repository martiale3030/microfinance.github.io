<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'connexion.php';

try {
    $stmt = $conn->query("SELECT * FROM client");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>"; print_r($clients); echo "</pre>"; 

} catch (PDOException $e) {
    die("❌ Erreur de connexion ou de requête : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Clients</title>
  <style>
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
    }
    a {
      display: block;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<a href="ajout_client.php">➕ Ajouter un nouveau client</a>
<h1>Liste des Clients</h1>

<?php if (count($clients) === 0): ?>
  <p style="text-align:center;">⚠ Aucun client trouvé dans la base de données.</p>
<?php else: ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénoms</th>
        <th>Téléphone</th>
        <th>Adresse</th>
        <th>Profession</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clients as $client): ?>
        <tr>
          <td><?= htmlspecialchars($client['id_client']) ?></td>
          <td><?= htmlspecialchars($client['nom']) ?></td>
          <td><?= htmlspecialchars($client['prenoms']) ?></td>
          <td><?= htmlspecialchars($client['telephone']) ?></td>
          <td><?= htmlspecialchars($client['adresse']) ?></td>
          <td><?= htmlspecialchars($client['profession']) ?></td>
          <td><?= htmlspecialchars($client['type_client']) ?></td>
          <td>
            <a href="client.php?id=<?= $client['id_client'] ?>">Voir</a>
            | <a href="modifier_client.php?id=<?= $client['id_client'] ?>">Modifier</a>
            | <a href="supprimer_client.php?id=<?= $client['id_client'] ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

</body>
</html>
