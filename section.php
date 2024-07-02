<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Divisée</title>
    <style>
         body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('/site\ images/essai.jpg'); /* Ajouter l'image de fond */

        }

        .container {
            display: flex;
            height: 100vh;
        }

        .section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .section:hover {
            background-color: #f0f0f0;
        }

        .section a {
            text-decoration: none;
            color: #333;
            font-size: 24px;
            text-align: center; /* Aligner le texte au centre */
        }

        .section img {
            max-width: 300px; /* Ajustez la taille de l'image selon vos besoins */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="section">
            <img src="/site images/section.png" alt="Section 1 Image">
            <a href="pageadmin.php">la liste des utilisateurs</a>
        </div>
        <div class="section">
            <img src="/site images/section.png" alt="Section 2 Image">
            <a href="ajouter.php">Ajouter un utilisateur</a>
        </div>
        <div class="section">
            <img src="/site images/section.png" alt="Section 3 Image">
            <a href="supprimer.php">Supprimer un utilisateur</a>
        </div>
        <div class="section">
            <img src="/site images/section.png" alt="Section 4 Image">
            <a href="events.php">Ajouter un evenement</a>
        </div>
    </div>

</body>

</html>

