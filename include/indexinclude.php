<?php
session_start();
//se connecter a la base
// require_once  "include/crud.php";
//recuperer la listes des articles dans la base

$sql="SELECT * FROM `users` ORDER BY `created_at` DESC ";
// $requete=$db->query($sql);



$titre='accueil';

  //inclure le headers


  @include_once"include/header.php";
//on recupere les donnees
// $articles=$requete->fetchAll();


  $titre='barre de navigation';

@include_once"include/navbar.php";

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
<?php
$titre='footer de la page';

  @include_once "include/footer.php";
  


     ?>
   