<?php
session_start();
//levenshtein
if (!empty($_POST)) {
    //le formulaire a ete envoyer
    //ainsi, on verifie que tous les champs sont remplis

    if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"] && !empty($_POST["password"]))) {
        //on verifie si l'email en est un

        $pseudo = strip_tags($_POST["nickname"]);
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("l'adresse email est incorrecte");
        }
        //on se connecte a la base de donnees
        require_once "include/crud.php";
        //requettesql pour verifier si l'email exist
        $sql = "SELECT * FROM `users` WHERE `email`=:email";
        $query = $db->prepare($sql);
        $query->bindValue("$email", $_POST["email"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if (!$users) {
            die("l'utilisateur et ou le mot de passe est incorrect");
        }
        //on a un user existant et on peut verifier son mot de passe

        if (!password_verify($_POST["password"], $users["pass"])) {
            die("l'utilisateur et ou le mot de passe est incorrect");
        }
        //ici, l'utilisateur et le mot de passe sont correct


        //on va pouvoir connecter l'utilisateur
        //creer une session php pour connecter les donnees de l'urilisateur
        session_start();//demmarrer la session php pour connecter
        
        //on doit stocker dans $SESSION les informations de l'utilisateur
        $_SESSION["users"]=[
            "id"=>$user["id"],
            "pseudo"=>$user["pseudo"],
            "roles"=>$user["roles"]
        ];

        //on peut rediriger vers la page de profil

        header("location:profil.php?");
        
        


        //on va hasher le mot de passe
        //$password=password_hash($_POST["password"], PASSWORD_ARGON2ID);

        //ajouter les controles souhaités!


        //on enregistre a la base de donnée
        //pour cela, il faut see connecter a la base

        include_once "/include/crud.php";

        //passageau sql
        $sql = "INSERT INTO `users`(`username`,`email` ,`password`, `roles`) VALUES(:pseudo, :email, '$password', [\"ROLE_USER\"])";

        $query = $db->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $query->execute();

        //on connectera l'utilisateur
    } else {
        die("Please enter le formulaire est incomplet");
    }
}

//se connecter a la base
// require_once  "include/crud.php";
//recuperer la listes des articles dans la base

// $sql="SELECT * FROM `users` ORDER BY `created_at` DESC ";
// $requete=$db->query($sql);



$titre = 'accueil';

//inclure le headers


@include_once "include/header.php";
//on recupere les donnees
// $articles=$requete->fetchAll();


$titre = 'barre de navigation';

@include_once "include/navbar.php";

?>
//on ecrit le contenu de la page
// <?php
    //  foreach($articles as $article):
    ?>
<section>
    <article>
        <h1 class="">
            <?php
            //  echo $article=["title"]   
            ?>
        </h1>
        <div>Publier le
            <?php
            // echo  $article["creat_at"] 
            ?>
            contenu</div>
    </article>
    <?php
    // endforeach; 
    ?>
</section>






// foreach($articles as $article)
//


<p>ceci est le contenu de la page web!</p>
<h1>Connexion</h1>

<form method="post">
    <!-- <div class="">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div> -->
    <div class="">
        <label for="email">pseudo</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="">
        <label for="password">pseudo</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">me connecter</button>
</form>


<?php
$titre = 'footer de la page';

@include_once "include/footer.php";



?>