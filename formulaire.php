<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once './config/config.php';
require_once './assets/header.php';

$utilisateur_id = isset($_GET['numlicence']) ? $_GET['numlicence'] : null;

if ($utilisateur_id ==  null || $utilisateur_id == '') {
    echo "ID de l'utilisateur non spécifié";
    header("Location: licences_visualisation.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numLicence = $_POST['numlicence'];
    $nom = $_POST['LicenceNom'];
    $prenom = $_POST['LicencePrenom'];
    $Sexe = $_POST['LicenceSexe'];
    $DateNaissance = $_POST['LicenceDateDeNaissance'];
    $Categorie = $_POST['LicenceCategorie'];
    $Position = $_POST['LicencePosition'];
    $adr_licencie = $_POST['LicenceAdresse'];
    $adr_ville = $_POST['LicenceVille'];
    $Telephone = $_POST['LicenceTelephone'];
    $Mail = $_POST['LicenceEmail'];
    $Nationalite = $_POST['LicenceNationalite'];
    $Classification = $_POST['LicenceClassification'];
    $Validite = $_POST['LicenceCM'];
    $Annee_reprise = $_POST['AnneeReprise'];
    $Premiere_Licence = $_POST['LicencePremiere'];
    $club = $_POST['LicenceClub'];

    $sql = "UPDATE licence SET LicenceNom=?, LicencePrenom=?, LicenceSexe=?, LicenceDateDeNaissance=?, LicenceCategorie=?, LicencePosition=?, LicenceAdresse=?, LicenceVille=?, LicenceTelephone=?, LicenceEmail=?, LicenceNationalite=?, LicenceClassification=?, LicenceCM=?, AnneeReprise=?, LicencePremiere=?, LicenceClub=? WHERE numlicence=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssssssssssssssi", $nom, $prenom, $sexe, $datenaissance, $categorie, $position, $adresse, $ville, $telephone, $email, $nationalite, $classification, $CM, $annee_reprise, $premiere_licence, $club, $utilisateur_id);
    $stmt->execute();
    $stmt->close();
    
    if ($stmt) {
        $_SESSION['message'] = "Les informations de l'utilisateur ont été mises à jour avec succès.";
    } else {
        $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour des informations de l'utilisateur : " . $mysqli->error;
    }
    header("Location: UniLicence.php?numlicence=" . $utilisateur_id);
    exit;
}