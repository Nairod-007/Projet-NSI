<?php
// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "nom_utilisateur";
$mot_de_passe = "mot_de_passe";
$nom_base_de_donnees = "nom_base_de_donnees";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Récupération des données soumises par le formulaire
$titre = $_POST["titre"];
$date_publication = $_POST["date_publication"];

// Insertion du livre dans la base de données
$sql = "INSERT INTO livres (titre, date_publication) VALUES ('$titre', '$date_publication')";

if ($connexion->query($sql) === TRUE) {
    echo "Le livre a été ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout du livre : " . $connexion->error;
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>
