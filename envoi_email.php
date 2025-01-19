<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail de l'utilisateur
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Vérifier si l'adresse e-mail est valide
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Lien vers votre portfolio sur Google Drive
        $portfolioLink = "https://drive.google.com/drive/u/0/folders/1WVnshN51DxcjQ2zfqdsz18StRyXt3XnE";

        // Préparer les détails de l'e-mail
        $subject = "Votre portfolio";
        $message = "Bonjour,\n\nMerci de votre intérêt ! Vous pouvez consulter mon portfolio en cliquant sur le lien ci-dessous :\n\n$portfolioLink\n\nCordialement,\n[Votre nom]";
        $headers = "From: votre-email@example.com";

        // Envoyer l'e-mail
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
