<?php
// Démarrer une session
session_start();

// Activer l'affichage des erreurs (mode dev)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Spécifier le chemin du fichier users.json
    $json_file = 'admin/users.json';

    // Vérifier si le fichier users.json existe
    if (!file_exists($json_file)) {
        echo "<p class='error'>Fichier 'users.json' introuvable.</p>";
    } else {
        // Lire le fichier JSON
        $json_data = file_get_contents($json_file);

        // Décoder le fichier JSON
        $users = json_decode($json_data, true);

        // Récupérer les valeurs du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Chercher l'utilisateur dans le fichier JSON
        $user_found = false;
        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                $user_found = true;
                $_SESSION['user'] = $user; // Stocker les infos dans la session
                break;
            }
        }

        if ($user_found) {
            // Redirection vers my-account.php avec l'ID utilisateur dans l'URL
            header("Location: my-account.php?id=" . $username);
            exit();
        } else {
            echo "<p class='error'>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #ff5e00;
            padding: 10px 20px;
            text-align: right;
        }
        .header a {
            color: #007bff;
            margin-left: 20px;
            text-decoration: none;
        }
        .header a:hover {
            text-decoration: underline;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f1f5f7;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #0c4b8d;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-login {
            background-color: #11a27f;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-login:hover {
            background-color: #0c8461;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Log in</button>
    </form>
</body>
</html>
