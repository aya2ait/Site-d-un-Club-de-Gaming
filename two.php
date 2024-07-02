<?php
include("connection.php");
if (isset($_GET["email"], $_GET["nom"], $_GET["prenom"], $_GET["motPasse"])) {
    // Récupérer toutes les données du formulaire
    $email = $_GET["email"];
    $nom = $_GET["nom"];
    $prenom = $_GET["prenom"];
    $mot_passe = $_GET["motPasse"];

    // Mettre à jour la base de données pour enregistrer l'utilisateur
    $query = "INSERT INTO users (nom, prenom, email, motPasse, date) VALUES ('$nom', '$prenom', '$email', '$mot_passe', NOW())";
    mysqli_query($con, $query);
}
// Inclure les fichiers PHPMailer nécessaires
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    // Générer un code de vérification
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    // Enregistrer le code de vérification dans la base de données
    $query = "UPDATE users SET verification_code = '$verification_code' WHERE email = '$email'";
    mysqli_query($con, $query);

    // Instancier PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Activer la sortie de débogage verbose
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        // Envoi via SMTP
        $mail->isSMTP();

        // Définir le serveur SMTP pour envoyer
        $mail->Host = 'smtp.gmail.com';

        // Activer l'authentification SMTP
        $mail->SMTPAuth = true;

        // Nom d'utilisateur SMTP
        $mail->Username = 'ayaaitsakrim@gmail.com';

        // Mot de passe SMTP
        $mail->Password = 'aurv qajz xakq fozg';

        // Activer le cryptage TLS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // Port TCP à connecter, utiliser 465 pour `PHPMailer::ENCRYPTION_SMTPS` ci-dessus
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom('ayaaitsakrim@gmail.com', 'index.php');

        // Ajouter un destinataire
        $mail->addAddress($email);

        // Définir le format de l'e-mail en HTML
        $mail->isHTML(true);

        // Sujet et corps de l'e-mail
        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        // Envoyer l'e-mail
        $mail->send();

        // Rediriger vers la page de vérification
        header("Location: verification.php?email=$email");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
