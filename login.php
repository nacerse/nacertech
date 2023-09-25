<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifiez les informations d'identification ici
    $valid_username = "admin";
    $valid_password = "nacer";

    if ($username === $valid_username && $password === $valid_password) {
        // Si les informations sont correctes, redirigez l'utilisateur vers la page d'accueil ou une autre page
        header("Location: upload.php");
        exit();
    } else {
        // Si les informations ne sont pas correctes, affichez un message d'erreur ou redirigez l'utilisateur vers la page de connexion
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>