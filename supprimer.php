<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer des utilisateurs</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table {
            border-collapse: collapse;
            width: 80%; /* Ajustez la largeur du tableau selon vos besoins */
            background-color: rgba(255, 255, 255, 0.8); /* Ajoute un fond blanc semi-transparent au tableau */
            border-radius: 10px; /* Ajoute des coins arrondis */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Inclure le fichier de connexion à la base de données
include("dbconnection.php");

// Vérifier si le formulaire de suppression a été soumis
if(isset($_POST['emploi_id'])) {
    // Récupérer l'identifiant de l'utilisateur à supprimer
    $user_id = $_POST['user_id'];

    // Exécuter une requête SQL pour supprimer l'utilisateur de la base de données
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
}

// Récupérer la liste des utilisateurs depuis la base de données
$sql = "SELECT id, nom, prenom, email FROM users";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Afficher les utilisateurs sous forme de tableau avec un bouton de suppression pour chaque utilisateur
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><form action='' method='post'>";
        echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='delete_user'>Supprimer</button>";
        echo "</form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>

</body>
</html>
