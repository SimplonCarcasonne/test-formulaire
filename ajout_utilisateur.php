<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Starter Template Bootstrap + Modal</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- My css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <h1>Ajout d'un utilisateur</h1>
      <?php
        //Fonction de test de champ vide
        function testEmptyField($field) {
          if(empty($_POST[$field])) {
            return "Le champ ".$field." est vide.<br>";
          }
        }

        if(isset($_POST['valider'])) {
          //Validation du formulaire
          $erreur = "";
          if( strlen($_POST['pwd1']) < 8 ) {
            $erreur .= "Longueur du mot de passe doit être supérieur à 8<br>" ;
          }
          if ($_POST['pwd1'] != $_POST['pwd2']) {
            $erreur .= "Les mots de passes ne sont pas identiques<br>";
          }
          $erreur .= testEmptyField('prenom');
          $erreur .= testEmptyField('nom');
          $erreur .= testEmptyField('age');
          $erreur .= testEmptyField('pseudo');
          $erreur .= testEmptyField('email');

          if( !empty($erreur)) {
            //Traitement du formulaire
            echo "<p>" . var_dump($_POST);
            $password = password_hash($_POST['pwd1'], PASSWORD_DEFAULT);
            echo "Voici le password crypté: ".$password;

          }

          echo "<p>" . $erreur . "</p>";

        }
      ?>

      <form method='post' action='ajout_utilisateur.php'>
        <div class="form-group">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="form-group">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="form-group">
          <label for="pseudo">Pseudo:</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="form-group">
          <label for="pwd1">Password:</label>
          <input type="password" class="form-control" id="pwd1" name="pwd1">
        </div>
        <div class="form-group">
          <label for="pwd2">Confirmation password:</label>
          <input type="password" class="form-control" id="pwd2" name="pwd2">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" name="email">
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" data-dismiss="modal" name="valider" value="Valider"/>
      </form>

    </div><!-- End container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

