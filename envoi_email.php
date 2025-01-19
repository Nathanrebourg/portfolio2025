<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récup email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validation email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $portfolioLink = "https://drive.google.com/drive/u/0/folders/1WVnshN51DxcjQ2zfqdsz18StRyXt3XnE";

        $subject = "Votre portfolio";
        $message = "Bonjour,\n\nMerci de votre intérêt ! Vous pouvez consulter mon portfolio en cliquant sur le lien ci-dessous :\n\n$portfolioLink\n\nCordialement,\n[Votre nom]";
        $headers = "From: votre-email@example.com\r\n";
        $headers .= "Reply-To: votre-email@example.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoi email
        if (mail($email, $subject, $message, $headers)) {
            echo "L'e-mail a été envoyé avec succès !";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
        }
    } else {
        echo "Adresse e-mail invalide.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>