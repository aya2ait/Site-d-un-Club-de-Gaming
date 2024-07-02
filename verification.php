<?php
include("connection.php");


// Vérifier si le formulaire de vérification a été soumis
if(isset($_POST["verify_email"])) {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // Mettre à jour la base de données pour marquer l'email comme vérifié
    $update_query = "UPDATE users SET email_verified_at=NOW(), verification_code=NULL WHERE email='$email' AND verification_code='$verification_code'";
    $result = mysqli_query($con, $update_query);

    if($result && mysqli_affected_rows($con) > 0) {
       header("Location:login.php");
       echo "<p>Votre email a été vérifié avec succès. Vous pouvez maintenant vous connecter.</p>";
    } else {
        // Afficher le code de vérification stocké dans la base de données et celui soumis par l'utilisateur
        $query = "SELECT verification_code FROM users WHERE email='$email'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $stored_verification_code = $row['verification_code'];
        echo "<p>Code stocké : $stored_verification_code</p>";
        echo "<p>Code soumis : $verification_code</p>";

        echo "<p>Le code de vérification est incorrect. Veuillez réessayer.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'email</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('/site\ images/esssai.jpg');
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"] {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>

    <div class="container">
        <h2>Vérification de l'email</h2>
        <form method="POST">
            <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
            <input type="text" name="verification_code" placeholder="Entrez le code de vérification" required />
            <input type="submit" name="verify_email" value="Vérifier l'email">
        </form>
    </div>

</body>

</html>


