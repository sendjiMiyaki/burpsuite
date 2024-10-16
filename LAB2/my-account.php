<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: login.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$username = $_SESSION['user']['username'];
$isAdmin = $_SESSION['user']['admin']; // Statut admin
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
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
        .container {
            max-width: 600px;
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
        p {
            font-size: 18px;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-update {
            background-color: #11a27f;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-update:hover {
            background-color: #0c8461;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="index.php">Home</a> | 
        <?php if ($isAdmin === true): ?>
            <a href="JUNGWON">Admin panel</a> |
        <?php endif; ?>
        <a href="my-account.php?id=<?php echo $username; ?>">My account</a> | 
        <a href="logout.php">Log out</a>
    </div>

    <div class="container">
        <h2>My Account</h2>
        <p>Your username is: <?php echo htmlspecialchars($username); ?></p>

        <form action="update-email.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" placeholder="Enter your email">
            <button type="submit" class="btn-update">Update email</button>
        </form>
    </div>

</body>
</html>
