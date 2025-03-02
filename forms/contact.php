<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Vérifie le bon chemin du fichier autoload.php

$mail = new PHPMailer(true);

try {
    // Configurer SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Serveur SMTP (Gmail par exemple)
    $mail->SMTPAuth = true;
    $mail->Username = 'tonemail@gmail.com'; // Remplace par ton adresse Gmail
    $mail->Password = 'tonmotdepasse'; // Remplace par ton mot de passe Gmail (utilise un mot de passe d'application si nécessaire)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Paramètres de l'email
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('serignefallouniang776@gmail.com'); // Ton email de réception
    $mail->Subject = $_POST['subject'];
    $mail->Body = "Nom: " . $_POST['name'] . "\nEmail: " . $_POST['email'] . "\n\nMessage:\n" . $_POST['message'];

    // Envoyer l'email
    if ($mail->send()) {
        echo 'Votre message a été envoyé avec succès !';
    } else {
        echo 'Erreur lors de l\'envoi du message.';
    }
} catch (Exception $e) {
    echo "Erreur: {$mail->ErrorInfo}";
}
?>
