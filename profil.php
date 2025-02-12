
<?php
//inclure le header
session_start();
include "./include/header.php";


// inclusion de la navbar

include_once "./include/navbar.php";

?>
<h1>Profil de:<?php $_SESSION["users"]["pseudo"]?></h1>
<p>pseudo: <?php $_SESSION["users"]["pseudo"]?></p>
<p>Email: <?php $_SESSION["users"]["email"]?></p>








