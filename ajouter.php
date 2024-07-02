<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Définir les variables vides pour stocker les valeurs du formulaire
$nom = $prenom = $email = $motPasse = $date = "";
$nom_err = $prenom_err = $email_err = $motPasse_err = $date_err = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider le nom
    if (empty(trim($_POST["nom"]))) {
        $nom_err = "Veuillez entrer un nom.";
    } else {
        $nom = trim($_POST["nom"]);
    }

    // Valider le prénom
    if (empty(trim($_POST["prenom"]))) {
        $prenom_err = "Veuillez entrer un prénom.";
    } else {
        $prenom = trim($_POST["prenom"]);
    }

    // Valider l'email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Veuillez entrer une adresse email.";
    } else {
        // Vérifier si l'email existe déjà dans la base de données
        $email = trim($_POST["email"]);
        $query = "SELECT id FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($con, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $email_param);
            $email_param = $email;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "Cette adresse email est déjà utilisée.";
                }
            } else {
                echo "Oops! Une erreur s'est produite. Veuillez réessayer plus tard.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Valider le mot de passe
    if (empty(trim($_POST["motPasse"]))) {
        $motPasse_err = "Veuillez entrer un mot de passe.";
    } else {
        $motPasse = trim($_POST["motPasse"]);
    }

    // Récupérer la date actuelle
    $date = date("Y-m-d H:i:s");

    // Vérifier s'il n'y a pas d'erreur de saisie
    if (empty($nom_err) && empty($prenom_err) && empty($email_err) && empty($motPasse_err)) {
        // Préparer la requête d'insertion
        $sql = "INSERT INTO users (nom, prenom, email, motPasse, date) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Liaison des variables à la déclaration préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $email, $motPasse, $date);

            // Exécuter la déclaration préparée
            if (mysqli_stmt_execute($stmt)) {
                // Rediriger l'utilisateur vers une autre page après l'insertion
                header("location: pageadmin.php");
            } else {
                echo "Oops! Une erreur s'est produite. Veuillez réessayer plus tard.";
            }
            // Fermer la déclaration préparée
            mysqli_stmt_close($stmt);
        }
    }
    // Fermer la connexion à la base de données
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un membre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url('/site\ images/esssai.jpg');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            width: 100%;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        span {
            color: red;
            font-size: 12px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ajouter un nouveau membre</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Nom:</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>">
                <span><?php echo $nom_err; ?></span>
            </div>
            <div>
                <label>Prénom:</label>
                <input type="text" name="prenom" value="<?php echo $prenom; ?>">
                <span><?php echo $prenom_err; ?></span>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <span><?php echo $email_err; ?></span>
            </div>
            <div>
                <label>Mot de passe:</label>
                <input type="password" name="motPasse" value="<?php echo $motPasse; ?>">
                <span><?php echo $motPasse_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</body>

</html>
