<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "declaration_naissances";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Échec de la connexion : " . $conn->connect_error);
}

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO declarations (nom, prenom, date_naissance, lieu_naissance, sexe, adresse, nom_pere, nation_pere, lieu_naissance_pere, date_naissance_pere, profession_pere, nom_mere, nation_mere, lieu_naissance_mere, date_naissance_mere, profession_mere, langue, empreinte_digital, officiel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssssss", $nom, $prenom, $date_naissance, $lieu_naissance, $sexe, $adresse, $nom_pere, $nation_pere, $lieu_naissance_pere, $date_naissance_pere, $profession_pere, $nom_mere, $nation_mere, $lieu_naissance_mere, $date_naissance_mere, $profession_mere, $langue, $empreinte_digital, $officiel);

// Récupérer les données POST
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$lieu_naissance = $_POST['lieu_naissance'];
$sexe = $_POST['sexe'];
$adresse = $_POST['adresse'];
$nom_pere = $_POST['nom_pere'];
$nation_pere = $_POST['nation_pere'];
$lieu_naissance_pere = $_POST['lieu_naissance_pere'];
$date_naissance_pere = $_POST['date_naissance_pere'];
$profession_pere = $_POST['profession_pere'];
$nom_mere = $_POST['nom_mere'];
$nation_mere = $_POST['nation_mere'];
$lieu_naissance_mere = $_POST['lieu_naissance_mere'];
$date_naissance_mere = $_POST['date_naissance_mere'];
$profession_mere = $_POST['profession_mere'];
$langue = $_POST['langue'];
$empreinte_digital = $_POST['empreinte_digital'];
$officiel = $_POST['officiel'];

// Exécuter la requête
if ($stmt->execute()) {
  echo "Nouvelle déclaration ajoutée avec succès";
} else {
  echo "Erreur : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
