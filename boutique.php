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
    if(isset($_GET['category'])){
    $category=$_GET['category'];
    $select = $db->prepare("SELECT * FROM products WHERE category='$category'");
    $select->execute();

    while($s=$select->fetch(PDO::FETCH_OBJ)){ ?>


            <div class="col-lg-4">
            <div class="box wow fadeInLeft">
              <h4 class="title"><a href="event.php"><?php echo $s->title;?></a></h4>
              <h4 class="description"><?php echo $s->description;?></h4>
              <h4 class="price"><?php echo $s->price;?>$</h4>
              <img src="admin/img/<?php echo $s->title;?>.jpg" >

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
<a href="?category=<?php echo $s->name;?>"><h4 ><?php echo $s->name;?></h4></a>

<?php 

 }
}
?>
</div>

<?php
require_once('includes/footer.php');



?>