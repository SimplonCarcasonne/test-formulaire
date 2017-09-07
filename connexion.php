<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Connectez-vous</title>
</head>
<body>
  <?php
    if(isset($_POST)) {
      if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])) {
        //Récupération et sécurisation des parametres
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = $_POST['pwd'];

        //Vérification mot de passe
        try
        {
          // On se connecte à MySQL
          $bdd = new PDO('mysql:host=localhost;dbname=annonces-immo;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
          // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
        }

        //Recherche utilisateur
        $sql = sprintf("select * from uti_utilisateur where uti_pseudo = '%s';", $pseudo);
        $response = $bdd->query($sql);
        $row = $response->fetch();
        if(password_verify($password, $row['uti_password'])) {
          session_start();
          $_SESSION['uti_pseudo'] = $pseudo;
          $_SESSION['uti_oid'] = $row['uti_oid'];
          header('Location: ajout_utilisateur.php');
        } else {
          echo "Identifiants incorrects";
        }
      }
    }
  ?>
  <form method="post" >
    <input type="pseudo" name="pseudo">
    <input type="password" name="pwd">
    <input type="submit" value="Connexion">
  </form>
</body>
</html>
