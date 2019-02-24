<?php
 include 'connect_db.php';
 if ( isset( $_POST[ 'formmdp' ] ) ) {
    if(!empty($_POST['email'])){
            $email = htmlspecialchars( $_POST[ 'email' ] );
            }else{
            	exit("mail vide.");
            }
             
           // $bdd = "SELECT email FROM utilisateur WHERE email = ".$email." ";
           // $req = mysql_query($bdd) or die ('Erreur SQL !<br>'.$bdd.'<br>'.mysql_error());
            echo $email;
            $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $req->execute(array($email)); // or die ('Erreur SQL !<br>'.$bdd.'<br>'.mysql_error());
             
            $mailexist = $req->rowCount();
			if ( $mailexist == 1 ) {//si le nombre de lignes retourne par la requete != 1
	            $row1 = mysql_fetch_assoc($req);
	            echo $row1['email'];
	            $retour = mysql_query("SELECT password FROM utilisateur WHERE email = '".$email."' ");
	            $row2 = mysql_fetch_assoc($retour);
	             
	            $headers  = 'MIME-Version: 1.0' . "\r\n";
	            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	            $objet = 'Récupération de votre mot de passe';
	            echo $row1['email'];
	            echo $row2['password'];
	            echo $objet;
	            echo $headers;
	             
	            if(!mail($row1['email'], $objet, $row2['password'], $headers)){
	            	echo 'probleme lors de l\'envoi du mail';
	            }else{
	            	echo 'mail envoye';
	            }
	        } else {
				$erreur = "Adresse mail introuvble !";
			}
			echo $erreur;
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mot de passe oublié ?</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Mot  de passe oublié ?</h1>
                    <p class="mb-4">Entrez simplement votre adresse email ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe !</p>
                  </div>
                  <form class="user"  method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail...">
                    </div>
                    <input type="submit" name="formmdp" id="formmdp" class="btn btn-primary btn-user btn-block" value=" Réinitialiser votre mot de passe" />
                     
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Crée un compte !</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.php">Vous avez dejà un compte ? connectez vous !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
