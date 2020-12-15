<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR Shop | Boutique</title>
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
<section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Casques de réalité virtuelles</h2>
        </div>
        <div class="row">
<?php
$select = $db->prepare("SELECT * FROM products");
$select->execute();

while($s=$select->fetch(PDO::FETCH_OBJ)){
    
?>
          <div class="col-lg-4">
            <div class="box wow fadeInLeft">
              <h4 class="title"><a href="event.php"><?php echo $s->title;?></a></h4>
              <h4 class="description"><?php echo $s->description;?></h4>
              <h4 class="price"><?php echo $s->price;?>$</h4>
              <img class="img-product" src="img/oculus-quest.jpg">
            </div>
          </div>


          
<?php 

}


?>
</div>
</section>
<?php include 'footer.php';?>