<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $email = $_POST['email'];
    $mot_passe = $_POST['motPasse'];

    if (!empty($email) && !empty($mot_passe) && !is_numeric($email)) {

        // read from database
        $query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1"; // Utilisez la table admin
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $admin_data = mysqli_fetch_assoc($result);

                if ($admin_data['motPasse'] === $mot_passe) {
                    $_SESSION['id'] = $admin_data['id'];
                   
                    // Rediriger vers la page de liste des utilisateurs
                    header("Location: section.php");
                    exit;
                }
            }
        }

        echo "Email ou mot de passe incorrect!";
    } else {
        echo "Email ou mot de passe incorrect!";
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
            background-color: #f9f9f9;
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
        #box{
            background-color: white;
            margin: auto;
            width: 350px;
            padding: 20px;
            border-radius: 20px;
            margin-top: 150px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
        }

        #box label {
            font-size: 18px;
            color: #007bff;
        }
    </style>
</head>
<body>


    <div id="box">

        <form method="post">
            
            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" placeholder="Enter your email" required ><br>

            <label for="motPasse">Password:</label><br>
            <input id="motPasse" type="password" name="motPasse" placeholder="Enter your password" required ><br>


            <input id="button" type="submit" value="Login"><br><br>

        </form>
    </div>
</body>

</html>
