<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR Shop | S'inscrire</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/headset.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">


  <?php
require_once('includes/header.php');
?>
<?php
 session_start();
$username= "bootcamp";
$pass = "12345";
if(isset($_POST['submit'])){
    
    $user = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password){
      if($username==$user&&$password==$pass){
        $_SESSION['username']=$username;
        header('Location: admin.php'); 
    }
    else{
        echo 'Identifiant éronnés';
    }
}
}
?>

<head>

<link href="../img/headset.png" rel="icon">
<link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">

  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">


  <link href="../css/style.css" rel="stylesheet">
</head>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,900" rel="stylesheet">

</head>
<body id="body">

<div id="login-card" class="card">
<div class="card-body">
  <h2 class="text-center">Inscription</h2>
  <br>


  <form action="" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="password" id="username" placeholder="Mot de passe" name="pswd">
    </div>
    <button type="submit" id="button" name="submit" class="btn btn-primary deep-purple btn-block ">S'inscrire</button>
        <br>
      <p type="text">Vous possédez déjà un compte ?<br><br><a href="login.php">Identifiez-vous</p></a>
    </div>
<br>
    <br>
  </form>
</div>
<div>