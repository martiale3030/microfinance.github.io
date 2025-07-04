<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des Transferts</title>
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
      margin-bottom: 20px;
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

    .filters {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 20px;
    }

    .filters input {
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
      min-width: 180px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
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

    .form-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    .form-container h2 {
      margin-top: 0;
      color: #2980b9;
    }

    .form-container label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    .form-container input, .form-container select, .form-container textarea {
      width: 100%;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-top: 5px;
    }

    .form-container button {
      margin-top: 20px;
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

    .error {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }

    @media (max-width: 768px) {
      .filters {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<a href="dashboard.php" class="btn-retour">← Retour au tableau de bord</a>
<h1>Gestion des Transferts</h1>

<!-- Filtres -->
<div class="filters">
  <input type="date" id="filtreDate" placeholder="Filtrer par date">
  <input type="number" id="filtreMontant" placeholder="Filtrer par montant">
</div>

<!-- Tableau de transferts -->
<table id="tableTransferts">
  <thead>
    <tr>
      <th>ID Transfert</th>
      <th>Compte Source</th>
      <th>Compte Destination</th>
      <th>Montant</th>
      <th>Date de Transfert</th>
      <th>Remarque</th>
    </tr>
  </thead>
  <tbody id="transfertBody">
    <!-- Lignes ajoutées dynamiquement -->
  </tbody>
</table>

<!-- Formulaire de transfert -->
<div class="form-container">
  <h2>Effectuer un Transfert</h2>
  <form id="formTransfert">
    <label for="compte_source">Compte Source (solde fictif ≤ 100000)</label>
    <input type="text" id="compte_source" required>

    <label for="compte_destination">Compte Destination</label>
    <input type="text" id="compte_destination" required>

    <label for="montant">Montant</label>
    <input type="number" id="montant" required>

    <label for="date_transfert">Date du Transfert</label>
    <input type="date" id="date_transfert" required>

    <label for="remarque">Remarque</label>
    <textarea id="remarque" rows="3"></textarea>

    <div class="error" id="errorMsg"></div>

    <button type="submit">Valider le Transfert</button>
  </form>
</div>

<script>
  let idTransfert = 1;

  const form = document.getElementById("formTransfert");
  const tableBody = document.getElementById("transfertBody");
  const errorMsg = document.getElementById("errorMsg");

  const filtreDate = document.getElementById("filtreDate");
  const filtreMontant = document.getElementById("filtreMontant");

  // Fonction pour ajouter une ligne
  function ajouterLigneTransfert(data) {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${data.id}</td>
      <td>${data.source}</td>
      <td>${data.destination}</td>
      <td>${data.montant} FCFA</td>
      <td>${data.date}</td>
      <td>${data.remarque || ''}</td>
    `;
    tableBody.appendChild(tr);
  }

  // Vérification fictive du solde (limité à 100000 FCFA ici)
  function soldeSuffisant(montant) {
    return parseFloat(montant) <= 100000;
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    errorMsg.textContent = "";

    const source = document.getElementById("compte_source").value;
    const destination = document.getElementById("compte_destination").value;
    const montant = document.getElementById("montant").value;
    const date = document.getElementById("date_transfert").value;
    const remarque = document.getElementById("remarque").value;

    if (!soldeSuffisant(montant)) {
      errorMsg.textContent = "Le solde du compte source est insuffisant pour ce transfert.";
      return;
    }

    ajouterLigneTransfert({
      id: idTransfert++,
      source,
      destination,
      montant,
      date,
      remarque
    });

    form.reset();
  });

  // Filtres (non dynamiques, juste pour structure de base)
  filtreDate.addEventListener("input", function () {
    // À compléter si tu veux du filtrage JS dynamique plus tard
  });

  filtreMontant.addEventListener("input", function () {
    // Pareil ici
  });
</script>

</body>
</html>
