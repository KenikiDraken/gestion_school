
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <style>
       /* Styles pour la navbar */
.navbar {
    background: linear-gradient(to right, #211f20, #003366);
    padding: 1px;
    height: 50px;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: space-between; 
    align-items: center; 
    border-radius: 0px;
    flex-wrap: wrap; /* Permet d'aller à la ligne sur petits écrans */
}

.logo-container {
    display: flex;
    align-items: center;
    color: #ffffff;
}

.logo {
    width: 74px;
    height: 50px;
    margin-right: 10px;
}

.deconnexion-container {
    margin-left: auto;
}

.deconnexion {
    font-size: 14px;
}

.deconnexion:hover {
    font-size: 15px;
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    flex-wrap: wrap; /* Permet d'aller à la ligne si nécessaire */
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    text-align: center;
    padding: 0px;
    text-decoration: none;
    display: block;
}

.user-info {
    color: #ffffff;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-left: auto;
}

.user-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    margin-right: 5px;
    font-size: 16px;
}

.form-group-1 {
    display: flex;
    gap: 4px;
    margin-bottom: 2px;
    flex-wrap: wrap; /* Permet de passer en colonne sur petits écrans */
}

.user-name {
    margin-top: 4px;
}

.degist {
    color: linear-gradient(to right, #ffff, #8eaeea);
    font-family: "black ops";
    font-size: 24px;
    font-weight: bold;
}

/* Media queries pour rendre responsive */

/* Pour les petits appareils (mobiles) */
@media (max-width: 576px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
        height: auto;
    }

    .user-info {
        justify-content: center;
        margin-left: 0;
        margin-top: 10px;
        width: 100%;
    }

    .navbar ul {
        flex-direction: column;
        width: 100%;
        text-align: center;
    }

    .navbar ul li {
        margin: 5px 0;
    }
}

/* Pour les tablettes */
@media (max-width: 768px) {
    .user-info {
        margin-left: 0;
        text-align: center;
        justify-content: center;
    }

    .form-group-1 {
        flex-direction: column;
    }
}

/* Pour les écrans moyens (ordinateurs portables) */
@media (max-width: 992px) {
    .user-info {
        margin-left: auto;
    }
}

    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo-container">
        <ul>
            <li class="degist">Draken School</li>
        </ul>
    </div>
    <div class="user-info">
        <ul>
            <li>
                <div class="form-group-1">
                    <div class="user-circle">
                        <?php 
                        $username = isset($_SESSION['cmp']) ? $_SESSION['cmp'] : 'U'; 
                        $firstLetter = strtoupper(substr($username, 0, 1));
                        echo $firstLetter; 
                        ?>
                    </div>
                    <span class="user-name"><?php echo $username; ?></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="deconnexion-container">
        <ul>
            <li>
                <a class="deconnexion" href="../../log.php?quitter=1" style="color: red;">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>

</body>
</html>
 