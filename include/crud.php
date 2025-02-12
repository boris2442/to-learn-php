<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  //definir les constantes d'environnement a l'aide des constantes

  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DBNAME', 'crudfevriermonth');

  // Créer une connexion à la base de données

  //DSN de connexion

  //$dsn="mysql:dbname=crudfevriermonth; host=localhost;"
  $dsn = "mysql:dbname=". DBNAME . "; host=" . DBHOST;

  //se connecter a la base en utilisant le trycatch

  try {
    //extensier pdo
    $db = new PDO($dsn, DBUSER, DBPASS);
    echo "Connection valiser avec succes";

    //s'assurer d'envoyer les donnees en utf-8


    $db->exec("SET NAMES utf8");

    //créer une requete pour inserer une nouvelle ligne dans la table
    $sql = "INSERT INTO users (name, email, phone, address) VALUES (:name, :email, :phone, :address)";
    $stmt = $db->prepare($sql);

    //associer les variables à la requete
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);

    //ajouter des données
    $name = "John Doe";
    $email = "johndoe@example.com";
    $phone = "1234567890";
    $address = "123 Main St";
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die($e->getMessage());
  }


  //on est connecté a la base
  //afficher la liste des utilisateur

  $sql = "SELECT*FROM `donneesapprenants`";

  $requette = $db->query($sql);

  //on recupere les donnees a l'aide de fetch;


  //pour quil nya pas de doublures...
  $user = $requette->fetchAll();


  echo "<pre>";
  var_dump($user);
  echo "</pre>";

  $sql = "INSERT INTO `donneesapprenants`(`email`, `pass`, `roles`)
    VALUES('aubinborissimotsebo@gmail.com', 'BAfoussam2334', 'maintenir les apps en ligne')";
  $requete = $db->query($sql);

  //modifier un utilisateur

  $sql = "UPDATE `donneesapprenants` SET `pass`='BAfoussam2442' WHERE `id`=2";

  $requette = $db->query($sql);

  //supprimer un utilisateur
  $sql = "DELETE FROM `donneesapprenants` WHERE `id`>1";
  $requette = $db->query($sql);
  //SAVOIR le nombre de ligne qui ont ete supprimer
  // echo $db->rowCount();


  ?>
</body>

</html>