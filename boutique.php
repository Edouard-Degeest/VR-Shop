<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR Shop | Boutique</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


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
  if(isset($_GET['show'])){
    $product=$_GET['show'];

    $select = $db->prepare("SELECT * FROM products WHERE title='$product'");
    $select->execute();
    $s = $select->fetch(PDO::FETCH_OBJ);
    $description = $s->description;
    $description_finale=wordwrap($description,25,true);

    ?>
    	<div class="container">
      <div class="card">
      <div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
          <div class="details col-md-6">
    <h1 class="product-title"><?php echo $s->title; ?></h1>


    <h5 class="product-description">Description : <?php echo $description_finale; ?></h5>
    <h1 class="class=price">Prix :<?php echo $s->price; ?> €</h1>
    <h5>Stock : <?php echo $s->stock; ?></h5>
    <div class="preview-pic tab-content">
    <div class="tab-pane active" id="pic-1"> <img src="admin/img/<?php echo $s->title;?>.jpg" > </div>
    </div>
    <a href="panier.php?action=ajout&amp">Ajouter au panier</a> 
    </div>
    </div>
    </div>
    </div>

    <?php
  }else{

  
    if(isset($_GET['category'])){
    $category=$_GET['category'];
    $select = $db->prepare("SELECT * FROM products WHERE category='$category'");
    $select->execute();

    while($s=$select->fetch(PDO::FETCH_OBJ)){ 

    $lenght=10;

    $description = $s->description;

    $new_description=substr($description,0,$lenght)."...";

    $description_finale=wordwrap($new_description,25,true);
    ?>
    

            <div class="col-lg-4">
            <div class="box wow fadeInLeft">
            <a href="?show=<?php echo $s->title;?>"><h4 class="title"><?php echo $s->title;?></h4></a>
              <h4 class="description"><?php echo $description_finale;?></h4>
              <h4 class="price"><?php echo $s->price;?>€</h4>
            <a href="panier.php?action=ajout&amp;l=<?php echo $s->title;?>&amp;q=<?php echo $s->stock;?>&amp;p=<?php echo $s->price;?>">Ajouter au panier</a> 
              <a href="?show=<?php echo $s->title;?>"><img src="admin/img/<?php echo $s->title;?>.jpg" ></a> 

              </div>
          </div>

          <?php

}

?>
<?php

   }else {
    $select = $db->query("SELECT * FROM category");

    while($s = $select->fetch(PDO::FETCH_OBJ)){

?> 
<div class="col-lg-4" >
                <div class="box wow fadeInLeft">
                    <a href="?category=<?php echo $s->name;?>"><h4 ><?php echo $s->name;?></h4></a>
                </div>
              </div>
<?php 

 }
}
}
?>
</div>

<?php
require_once('includes/footer.php');



?>