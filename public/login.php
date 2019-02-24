
<?php
/*
 include 'connect_db.php';

if(isset($_POST['formconnexion'])) {

   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = md5($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {

      $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {

         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['email'] = $userinfo['email'];
         $_SESSION['admin'] = $userinfo['admin'];
         header("Location: index.html");
         exit(0);

      } else {
         $erreur = "email ou mot de passe inconnu";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
} else { echo "erreur";}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Connexion</title>

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
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>






                  <form class="user" method="POST">
                        <div class="form-group">
                          <input type="email" name="mailconnect" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Adresse mail...">
                        </div>
                        <div class="form-group">
                          <input type="password"  name="mdpconnect" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Se rappeler de moi</label>
                          </div>
                        </div>
                        <input type="submit" name="formconnexion" class="btn btn-primary  btn-user btn-block" value="Se connecter" />




                   <?php
                  if(isset($erreur)) {
                  echo '<font color="red">'.$erreur."</font>";
                  }
                   ?>



                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>






                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Mot de passe oublié ?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Crée un compte !</a>
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
