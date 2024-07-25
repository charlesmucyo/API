<?php

// Autoriser l'accès depuis n'importe quelle origine
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'db_config.php';

$nom = $_POST['nom'];
$date_naissance = $_POST['date_naissance'];

// Requête pour récupérer les déclarations correspondant aux critères
$sql = "SELECT * FROM declarations WHERE nom='$nom' AND date_naissance='$date_naissance'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "N°/KAR/GOMA/N-K/00" . $row["id"] . ".\n\n" .
             "L'an " . $row["dateDeclaration"] . ", par devant nous " . $row["officiel"] . 
             ", officiel de la commune de " . $row["commune"] . " est apparu Monsieur/ Madame " . $row["nom_pere"] . 
             ", né à " . $row["lieu_naissance_pere"] . " le " . $row["date_naissance_pere"] . 
             ", ayant comme profession " . $row["profession_pere"] . ", résidant à " . $row["adresse"] . ".\n\n" .
             "Lequel (laquelle) nous a déclaré ce qui suit :\n\n" .
             "Le " . $row["date_naissance"] . " est né à " . $row["lieu_naissance"] . 
             ", un enfant de sexe " . $row["sexe"] . ", nommé " . $row["nom"] . " " . $row["prenom"] . 
             ", fils(fille) de " . $row["nom_pere"] . " né à " . $row["lieu_naissance_pere"] . 
             ", nationalité " . $row["nation_pere"] . ", profession " . $row["profession_pere"] . 
             ", résidant à " . $row["adresse"] . ", et de " . $row["nom_mere"] . 
             ", nationalité " . $row["nation_mere"] . ", profession " . $row["profession_mere"] . 
             ", résidant à " . $row["adresse"] . " conjoints.\n\n" .
             "Lecture de l'acte a été faite en " . $row["langue"] . " langue que nous connaissons.\n\n" .
             "En foi de quoi, nous avons dressé le présent acte.\n\n" .
             "Le déclarant\n\n" .
             "L'officiel de l'état civil\n" . $row["officiel"];
    }
} else {
    echo "Aucune déclaration trouvée"; 
}

$conn->close();
?>
