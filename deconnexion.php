<?php
session_start();
//supprimer une variable
unset($_SESSION["user"]);

header("Location:index.php");

?>