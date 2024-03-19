<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once './config/config.php';
require_once './assets/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations personnelles</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Informations personnelles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Licence</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Club</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Position</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nationalité</th>
                    <th scope="col">Validité CM</th>
                    <th scope="col">Année de reprise</th>
                    <th scope="col">Première Licence</th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php

                if(isset($_GET['numlicence'])) {
                    $licence_id = $_GET['numlicence'];
                    
                    $sql = "SELECT * FROM licence WHERE numlicence = $licence_id";
                    $result = $mysqli->query($sql);

                    if($result->num_rows > 0) {

                        $row = $result->fetch_assoc();
                        echo '<tr>';
                        echo '<td>' . $row['numlicence'] . '</td>';
                        echo '<td>' . $row['nomlicence'] . '</td>';
                        echo '<td>' . $row['prenomlicence'] . '</td>';
                        echo '<td>' . $row['sexelicencie'] . '</td>'; 
                        echo '<td>' . $row['datedenaissance'] . '</td>';
                        echo '<td>' . $row['clublicence'] . '</td>';
                        echo '<td>' . $row['categorielicencie'] . '</td>';
                        echo '<td>' . $row['positionlicencie'] . '</td>';
                        echo '<td>' . $row['adr_licencie'] . '</td>';
                        echo '<td>' . $row['adr_ville_licencie'] . '</td>';
                        echo '<td>' . $row['tel_licencie'] . '</td>';
                        echo '<td>' . $row['mail_licencie'] . '</td>';
                        echo '<td>' . $row['nationalite_licencie'] . '</td>';
                        echo '<td>' . $row['validite_CM'] . '</td>';
                        echo '<td>' . $row['annee_reprise'] . '</td>';
                        echo '<td>' . $row['premiere_licence'] . '</td>';
                        echo '<td>' . $row['photolicencie'] . '</td>';
                        echo '</tr>';
                    } else {
                        echo '<tr><td colspan="15">Aucune licence trouvée avec cet identifiant.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="15">Aucun identifiant de licence spécifié.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="licences_visualisation.php" class="btn btn-primary">retour</a>
    <a href="Modify_licences.php?numlicence=<?php echo $row['numlicence']; ?>" class="btn btn-primary">Modifier</a>
    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

