<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styleindex/output.css">
  <link rel="stylesheet" href="styleindex/style.css">
  
  
 
     <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <
  
 </head>

<body >

<?php
require "classes/loginform.php";

form::Loginform();


require "classes/dbcon.php";
require "classes/Userlogin.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider et filtrer les données de formulaire
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // Créer une instance de Userlogin
    $user = new Userlogin($db, $username, $password);

    // Tenter la connexion
    $loginSuccess = $user->Login();

    if ($loginSuccess) {
        // Rediriger vers index.php avec un paramètre GET pour indiquer la connexion réussie
      
        header("Location:classes/profile.php");
        exit();
    } else {
        // Authentification échouée, rediriger avec un paramètre GET pour indiquer l'échec de la connexion
        echo "Échec de la connexion. Vérifiez vos informations de connexion.";
        echo 
        exit();
    }
}
?>


   
 





</body>
</html>