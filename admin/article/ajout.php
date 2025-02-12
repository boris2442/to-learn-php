<?php
session_start();
// var_dump($_POST);

//on traite le formulaire

if(!empty($_POST)){
//post n'est pas vide, on verifie que toutes les donnees sont presentes

if(
    isset($_POST["titre"], $_POST["contenu"])&& !empty($_POST["titre"]) && !empty($_POST["contenu"])){
 
    //on recupere les donnees en les protegeant!

    //on retire toutes les balises de titre

    $titre=strip_tags($_POST["titre"]);
     

    //on neutralise toute balise du contenu

    $contenu=htmlspecialchars($_POST["contenu"]);

    //on peut les enregistrer

    //on se connecte a la base
    require_once"../../include/crud.php";

    //j'ecris ma requettee
    $sql="INSERT INTO `users` (`id`, `username`) VALUES(:title, :content)";

    //preparer la requette
    $query=$db->prepare($sql);

    //on injecte des valeurs
    $query->bindValue(":title",$title, PDO::PARAM_STR);
    $query->bindValue(":content",$contenu, PDO::PARAM_STR);

    //execuuter la requette
    $query->execute();

    if(!$query->execute()){
        die("une errreur s'est produite");
    }
    //on recupere l'id de l'article
    $id=$db->lastInsertId();
    }else{
        die("le formulaire est incomplet!");
    }

}
// inclure le header
$titre="ajout un article";
include_once "../../include/header.php";
include_once "../../include/navbar.php";

?>
<h1>ajouter un article</h1>
<form action="" method="post" action="">
    <div class="">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id=titre>
    </div>
    <div class="">
        <label for="contenu">Titre</label>
      <textarea name="contenu" id="contenu"></textarea>
    </div>
    <button type="submit">enregistrer</button>
</form>

include_once "../../include/footer.php";
<?php




?>