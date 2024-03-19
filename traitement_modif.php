<?php 
require_once './config/config.php';

session_start();

$result = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'modification') {
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

            // Requête SQL pour mettre à jour les données dans la base de données
            $sql = "UPDATE licence SET 
                    nomlicence = '$nom',
                    prenomlicence = '$prenom',
                    sexelicencie = '$Sexe',
                    datedenaissance = '$DateNaissance',
                    categorielicencie = '$Categorie',
                    positionlicencie = '$Position',
                    adr_licencie = '$adr_licencie',
                    adr_ville_licencie = '$adr_ville',
                    tel_licencie = '$Telephone',
                    mail_licencie = '$Mail',
                    nationalite_licencie = '$Nationalite',
                    classification_licencie = '$Classification',
                    validite_CM = '$Validite',
                    annee_reprise = '$Annee_reprise',
                    premiere_licence = '$Premiere_Licence',
                    clublicence = '$club'
                    WHERE numlicence = '$numLicence'";

            
            if ($mysqli->query($sql) === TRUE) {
                echo "Mise à jour effectuée avec succès.";
            } else {
                echo "Erreur lors de la mise à jour : " . $mysqli->error;
            }
        }
    }
}
