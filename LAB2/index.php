<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>banque d'images</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

    <!-- Header avec les liens Home et My Account -->
    <div class="header">
        <a href="index.php">Home</a> | 
        <a href="login.php">My account</a>
    </div>

    <h1>banque d'images</h1>

    <h2>Image 1</h2>
    <img src="image/image1.jpg" alt="image 1">

    <h2>Image 2</h2>
    <img src="image/image2.jpg" alt="image 2">
    
    <h2>Image 3</h2>
    <img src="image/image3.jpg" alt="image 3">

    <div class="login-container">
        <h2>Connexion</h2>
        <input type="text" id="username" placeholder="Nom d'utilisateur" required>
        <input type="password" id="password" placeholder="Mot de passe" required>
        <button onclick="login()">Se connecter</button>
        <div id="message"></div>
    </div>

</body>
</html>
