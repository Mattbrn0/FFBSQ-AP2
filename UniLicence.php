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

$sql = "SELECT * FROM licence WHERE numlicence = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $utilisateur_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $nom = $row["nomlicence"];
    $prenom = $row["prenomlicence"];
    $sexe = $row["sexelicencie"];
    $datenaissance = $row["datedenaissance"];
    $categorie = $row["categorielicencie"];
    $position = $row["positionlicencie"];
    $adresse = $row["adr_licencie"];
    $ville = $row["adr_ville_licencie"];
    $telephone = $row["tel_licencie"];
    $email = $row["mail_licencie"];
    $nationalite = $row["nationalite_licencie"];
    $classification = $row["classification_licencie"];
    $CM = $row["validite_CM"];
    $annee_reprise = $row["annee_reprise"];
    $premiere_licence = $row["premiere_licence"];
    $clublicence = $row["clublicence"];
} else {
    echo "Aucune licence trouvée avec cet ID";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier - Licences</title>
</head>
<body>
<form action="traitement_modif.php" method="post" id="modification">
<div class="tab-content mt-3" id="myTabsContent">
    <div class="mb-3">
        <label for="LicenceNom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="LicenceNom" name="LicenceNom" placeholder="Non précisé" value="<?php echo $nom; ?>">
        <label for="LicenceNom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="LicencePrenom" name="LicencePrenom" value="<?php echo $prenom; ?>">
        <label for="LicenceNom" class="form-label">Sexe</label>
        <input type="text" class="form-control" id="LicenceSexe" name="LicenceSexe" value="<?php echo $sexe; ?>">
        <label for="LicenceNom" class="form-label">Date de naissance</label>
        <input type="text" class="form-control" id="LicenceDateDeNaissance" name="LicenceDateDeNaissance" value="<?php echo $datenaissance; ?>">
        <label for="LicenceNom" class="form-label">Catégorie</label>
        <input type="text" class="form-control" id="LicenceCategorie" name="LicenceCategorie" value="<?php echo $categorie; ?>">
        <label for="LicenceNom" class="form-label">Position</label>
        <input type="text" class="form-control" id="LicencePosition" name="LicencePosition" value="<?php echo $position; ?>">
        <label for="LicenceNom" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="LicenceAdresse" name="LicenceAdresse" value="<?php echo $adresse; ?>">
        <label for="LicenceNom" class="form-label">Ville</label>
        <input type="text" class="form-control" id="LicenceVille" name="LicenceVille" value="<?php echo $ville; ?>">
        <label for="LicenceNom" class="form-label">Téléphone</label>
        <input type="tel" class="form-control" id="LicenceTelephone" name="LicenceTelephone" value="<?php echo $telephone; ?>">
        <label for="LicenceNom" class="form-label">Email</label>
        <input type="email" class="form-control" id="LicenceEmail" name="LicenceEmail" value="<?php echo $email; ?>">
        <label for="LicenceNom" class="form-label">Nationalité</label>
        <input type="text" class="form-control" id="LicenceNationalite" name="LicenceNationalite" value="<?php echo $nationalite; ?>">
        <label for="LicenceNom" class="form-label">Classification</label>
        <input type="text" class="form-control" id="LicenceClassification" name="LicenceClassification" value="<?php echo $classification; ?>">
        <label for="LicenceNom" class="form-label">Validité CM</label>
        <input type="text" class="form-control" id="LicenceCM" name="LicenceCM" value="<?php echo $CM; ?>">
        <label for="LicenceNom" class="form-label">Année de reprise</label>
        <input type="text" class="form-control" id="AnneeReprise" name="AnneeReprise" value="<?php echo $annee_reprise; ?>">
        <label for="LicenceNom" class="form-label">Première licence</label>
        <input type="text" class="form-control" id="LicencePremiere" name="LicencePremiere" value="<?php echo $premiere_licence; ?>">
        <label for="LicenceNom" class="form-label">Club</label>
        <input type="text" class="form-control" id="LicenceClub" name="LicenceClub" value="<?php echo $clublicence; ?>">
    </div>
</div>
<a href="UniLicence.php?numlicence=<?php echo $utilisateur_id; ?>" class="btn btn-primary">Retour</a>
<button type="submit" class="btn btn-primary">Modifier</button>
</form>
</body>
</html>
