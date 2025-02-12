<h1>titre</h1>
    <nav>
        <ul>
            <li>Accueil</li>
            <li>services</li>
            <?php
            if(!isset($_SESSION["users"])){

            }
            
            ?>
            <li><a href="/connexion.php">connexion</a></li>
            <li><a href="/inscription.php">inscription</a></li>

            <?php ?>
            else{
                <li>Bonjour <?php $_SESSION["user"]["pseudo"]  ?></li>
                <li><a href="/deconnexion.php">deconnexion</a></li>

            }
       
        </ul>
    </nav>