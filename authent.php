
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #c4c4c4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .register-container:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: #003366;
            outline: none;
        }

        button {
            background-color: #003366;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #003344;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #003366;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
        label{
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Connexion</h2>

        <!-- Formulaire d'inscription -->
        <form action="log.php" method="POST">
            <div class="form-group">
                <label for="compte">Compte :</label>
                <input type="text" id="compte" name="compte" required placeholder="Entrez votre Utilisateur">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="motpasse" required placeholder="Entrez votre mot de passe">
            </div>
            
            <button type="submit" name="acces" value='1'>Se Connecter</button>
            
        </form>
        <div class="footer"><br>
            <p>Pas encore inscrit ? <a href="inscription.php">Créer un compte</a></p>
        </div>
    </div>

</body>
</html>
