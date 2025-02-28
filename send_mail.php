<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "ton-email@example.com"; // Remplace avec ton adresse email
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $body = "Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Email envoyé avec succès.";
    } else {
        http_response_code(500);
        echo "Erreur lors de l'envoi du message.";
    }
} else {
    http_response_code(403);
    echo "Accès interdit.";
}
?>
