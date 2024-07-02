<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si le formulaire d'ajout d'événement a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $intitule = $_POST['intitule'];
    $jour = $_POST['jour'];
    if($jour >= 1 && $jour <= 31) {

    // Préparer et exécuter la requête SQL pour insérer l'événement dans la base de données
    $sql = "INSERT INTO evenements (intitule, jour) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
  
    
    // Vérifier si la préparation de la requête a réussi
    if($stmt) {
        // Lier les paramètres et exécuter la requête
        mysqli_stmt_bind_param($stmt, "ss", $intitule, $jour);
        mysqli_stmt_execute($stmt);

        // Vérifier si l'insertion a réussi
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: calendrier.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout de l'événement.";
        }

        // Fermer la déclaration SQL
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête.";
    }
    }else echo"date indifinie.";
}

// Fermer la connexion à la base de données
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter un événement</title>
    <style>
        body {
            background-image: url('/site\ images/esai.jpg'); /* Remplacez 'votre_image.jpg' par le chemin de votre image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Ajoute un fond blanc semi-transparent au formulaire */
            padding: 20px;
            border-radius: 10px; /* Ajoute des coins arrondis */
            text-align: center; /* Centre le contenu du conteneur */
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event {
            margin-bottom: 20px;
            font-size: 24px;
            color: #007bff; /* Couleur du texte */
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333; /* Couleur du texte */
            text-align: left; /* Alignement du texte à gauche */
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            height: 40px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="event">Ajouter un événement</div>
    <form method="post">
        <label for="intitule">Intitulé de l'événement:</label>
        <input type="text" id="intitule" name="intitule" required>
        
        <label for="jour">Jour de l'événement:</label>
        <input type="text" id="jour" name="jour" required>
        
        <input type="submit" name="ajouter_evenement" value="Ajouter l'événement">
    </form>
</div>

</body>
</html>
