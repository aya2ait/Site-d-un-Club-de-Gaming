<?php
include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // something was posted
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $type_competition = $_POST['type_competition'];
    if(!empty($nom) && !empty($prenom) && !empty($email)&&!empty($type_competition) )
    {
        // Insertion des données dans la base de données
        $query = "INSERT INTO competition (nom, prenom, email,type_competition) VALUES ('$nom', '$prenom', '$email','$type_competition')";
        $result = mysqli_query($con, $query);
    }

    else {
        echo "Veuillez saisir des informations valides!";
    }
}
?>












<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Page admin</title>
    <style>
body {
    background-image: url('/site\ images/esssai.jpg');
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}



label {
      font-weight: bold;
      color: #333; /* Couleur du texte */
      margin-bottom: 10px;
      display: block;
    }

    /* Style de la liste déroulante */
    select {
      width: 100%; /* Prend la largeur de son conteneur */
      padding: 8px; /* Espace à l'intérieur */
      border: 1px solid #ccc; /* Bordure */
      border-radius: 5px; /* Coins arrondis */
      font-size: 16px;
      background-color: #f8f9fa; /* Couleur de fond */
    }

    /* Style des options dans la liste déroulante */
    option {
      font-size: 16px;
    }

input[type="text"],
input[type="email"],
input[type="password"] {
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
    margin-top: 10px;
    display: block;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

#box {
    background-color: white;
    margin: auto;
    width: 370px;
    padding: 20px;
    border-radius: 20px;
    margin-top: 100px;
    box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
}

#box label {
    font-size: 18px;
    color: #007bff;
}

#box a {
    color: #007bff;
    text-decoration: none;
}

#box a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>

<div id="box">
    
    <form method="post">
        <h2>Competition</h2>
        
        <label for="nom">Nom:</label>
        <input id="nom" type="text" name="nom" placeholder="Enter your nom">

        <label for="prenom">Prénom:</label>
        <input id="prenom" type="text" name="prenom" placeholder="Enter your prénom">


        <label for="email">email:</label>
        <input id="email" type="email" name="email" placeholder="Enter your email">

        <div class="container">
    <div class="form-group">
      <!-- Label -->
      <label for="type_competition">Type de compétition:</label>
      <!-- Liste déroulante -->
      <select id="type_competition" name="type_competition" class="form-control">
        <option value="competition1">Compétition Fortnite</option>
        <option value="competition2">Compétition Dota</option>
        <option value="competition3">Compétition League of Legends</option>
        <option value="competition4">Compétition Free Fire</option>
        <option value="competition5">Compétition PUBG</option>
      </select>
    </div>
  </div>
        
        <!-- Ajoutez d'autres options selon vos besoins -->
     </select>


        <input type="submit" value="inscription">

    </form>
</div>
</body>
</html>
