<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR Shop | Panier</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/headset.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="body">
<?php include 'includes/header.php';?>
<link href="css/checkout.css" type="text/css" rel="stylesheet" media="all">
<section class="checkout_wthree py-sm-5 py-3">
        <div class="container">
            <div class="check_w3ls">
                <div class="d-sm-flex justify-content-between mb-4">
                    <h4>Vérifiez votre commande
                    </h4>
                    <h4 class="mt-sm-0 mt-3">Ton panier contient:
                        <span>3 Produits</span>
                    </h4>
                </div>
                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Produits</th>
                                <th>Quantité</th>
                                <th>Nom du Produit</th>

                                <th>Prix</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="rem1">
                                <td class="invert">1</td>
                                <td class="invert-image">
                                    <a href="single_product.html">
                                        <img src="img/oculus-quest-2.png" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Oculus Quest 2</td>

                                <td class="invert">$400</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>

                                </td>
                            </tr>
                            <tr class="rem2">
                                <td class="invert">2</td>
                                <td class="invert-image">
                                    <a href="single_product.html">
                                        <img src="img/oculus-rift-s.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Oculus Rift S</td>

                                <td class="invert">$420</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close2"> </div>
                                    </div>

                                </td>
                            </tr>
                            <tr class="rem3">
                                <td class="invert">3</td>
                                <td class="invert-image">
                                    <a href="single_product.html">
                                        <img src="img/cable-usb.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Cable USB C</td>

                                <td class="invert">$5.00</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div  class="close3"></div>
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                    <div class="col-md-8 address_form">
                        <hr>
                        <h4>Adresse de facturation</h4>
                        <form action="payment.html" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                            <div class="creditly-wrapper wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Nom: </label>
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                        <div class="card_number_grids">
                                            <div class="card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Numéro de Téléphone:</label>
                                                    <input class="form-control" type="text" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Ville/Etat: </label>
                                            <input class="form-control" type="text" placeholder="Town/City">
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Type d'Adresse: </label>
                                            <select class="form-control option-fieldf">
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <button class="submit check_out">Acheter</button>
                                </div>
                                <?php include 'includes/footer.php';?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>