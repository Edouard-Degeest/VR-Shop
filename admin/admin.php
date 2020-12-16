<?php


session_start();

?>

<h1> Bienvenue, <?php echo $_SESSION['username']; ?> </h1>

<a href="?action=add">Ajouter un produit </a>
<a href="?action=modifyanddelete">Modifier / Supprimer un produit </a>

<a href="?action=add_category">Ajouter une catégorie </a>
<a href="?action=modifyanddelete_category">Modifier / Supprimer une catégorie </a>



<?php
require_once('../includes/db.php');
if(isset($_SESSION['username'])){
    
    if(isset($_GET['action'])){
        if($_GET['action']=='add'){

            if(isset($_POST['submit'])){

                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                
                $img = $_FILES['img']['name'];

                $img_tmp = $_FILES['img']['tmp_name'];
                
                if(!empty($img_tmp)){
                $image = explode('.',$img);
                  
                    $image_ext = end($image);
                   if(in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){
                       echo"Veuillez rentrer une image avec une extension valide.";
                   }else{

                        $image_size = getimagesize($img_tmp);
                      if($image_size['mime']=='image/jpeg'){
                          
                        $image_src = imagecreatefromjpeg($img_tmp);
                      }else if($image_size['mime']=='image/png'){
                          
                        $image_src = imagecreatefrompng($img_tmp);

                      } else{
                          $image_src = false;
                          echo"Veuillez rentrer une image valide";
                      }

                      if($image_src!==false){
                          
                        $image_width=200;
                        if($image_size[0]==$image_width){
                            $image_finale = $image_src;
                        }else{
                            $new_width[0] =$image_width;
                            $new_height[1] = 200;

                            $image_finale = imagecreatetruecolor($new_width[0],$new_height[1]);
                            
                            imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);

                        }

                        imagejpeg($image_finale, 'img/'.$title.'.jpg');
                      }

                        
                   }
                }else{
                    echo"Veuillez rentrer une image";
                }

                if($title&&$description&&$price){
                    $category=$_POST['category'];
                       $insert = $db->prepare("INSERT INTO products VALUES(null, '$title', '$description', '$price','$category')");
                        $insert->execute();
                }else{
                    echo 'Veuillez remplir tout les champs';
                }

                 }
?>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label for="product">Titre du produit : </label>
  <input type="text" class="form-control" name="title" id="title" />

  <label for="description">Description du produit : </label>
  <input type="text" class="form-control" name="description" id="description" />

  <label for="price">Prix  : </label>
  <input type="text" class="form-control" name="price" id="price" />
  <label for="img">Catégorie  : </label>
    <select name="category">
        <?php $select=$db->query("SELECT * FROM category") ;
        while($s = $select->fetch(PDO::FETCH_OBJ)){
            ?>
            <option ><?php echo $s->name; ?></option>
            <?php
        }
        ?>
    </select>
  <label for="img">Image  : </label>
  <input type="file"  name="img"  />

  <input type="submit" name="submit"/>
</div>
</form>
  

<?php

}else if($_GET['action']=='modifyanddelete'){

        $select = $db->prepare("SELECT * FROM products");
        $select->execute();

        while($s=$select->fetch(PDO::FETCH_OBJ)){
            echo $s->title;
        ?>

       <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a> 
          <a href="?action=delete&amp;id=<?php echo $s->id; ?>">X</a> 
           
           <?php
             }
         }else if($_GET['action']=='modify'){
            
            $id=$_GET['id'];

            $select = $db->prepare("SELECT *  FROM products WHERE id=$id");
            $select->execute();
            $data = $select->fetch(PDO::FETCH_OBJ);

            ?>
            <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
            <label for="product">Titre du produit : </label>
            <input type="text" value="<?php echo $data->title; ?>" class="form-control" name="title" id="title" />

            <label for="description">Description du produit : </label>
            <input type="text" value="<?php echo $data->description; ?>" class="form-control" name="description" id="description" />

            <label for="price">Prix  : </label>
            <input type="text" value="<?php echo $data->price; ?>" class="form-control" name="price" id="price" />
     
            <input type="submit" name="submit" value="Modifier"/>
            </div>
            </form>
            <?php

            if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                
                $update = $db->prepare("UPDATE products SET title='$title', description='$description', price='$price' WHERE id=$id");
                $update->execute();
                header('Location: admin.php?action=modifyanddelete');
            }


         } else if($_GET['action']=='delete'){ 
             $id=$_GET['id'];
            $delete = $db->prepare("DELETE FROM products WHERE id=$id");
            $delete->execute();
    
    }else if($_GET['action']=='add_category'){
        
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                if($name){
                    $insert = $db->prepare("INSERT INTO category VALUES(null, '$name')");
                    $insert->execute();
                }else{
                    echo'Veuillez remplir tous les champs';
                }
            }

        ?>

        <form action="" method="post">
            <div class="form-group">
            <label for="exampleInputEmail1">Titre de la catégorie</label>
            <input type="text" class="form-control" name="name">
            <input type="submit" name="submit" value="Ajouter ">

        </form>
        <?php 

    
    }else if($_GET['action']=='modifyanddelete_category'){
        $select = $db->prepare("SELECT * FROM category");
        $select->execute();

        while($s=$select->fetch(PDO::FETCH_OBJ)){
            echo $s->name;
        ?>

       <a href="?action=modify_category&amp;id=<?php echo $s->id; ?>">Modifier</a> 
          <a href="?action=delete_category&amp;id=<?php echo $s->id; ?>">X</a> 
           
           <?php
             }
         
    }else if($_GET['action']=='modify_category'){
 
        $id=$_GET['id'];

        $select = $db->prepare("SELECT *  FROM category WHERE id=$id");
        $select->execute();
        $data = $select->fetch(PDO::FETCH_OBJ);

        ?>
        <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label for="product">Titre de la catégorie : </label>
        <input type="text" value="<?php echo $data->name; ?>" class="form-control" name="title" id="title" />

      
        <input type="submit" name="submit" value="Modifier"/>
        </div>
        </form>
        <?php

        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            
            $update = $db->prepare("UPDATE category SET name='$title' WHERE id=$id");
            $update->execute();
            header('Location: admin.php?action=modifyanddelete_category');
        }

    }else if($_GET['action']=='delete_category'){
        $id=$_GET['id'];
        $delete = $db->prepare("DELETE FROM category WHERE id=$id");
        $delete->execute();

        header('Location: admin.php?action=modifyanddelete_category');
    } else{
        
        die('Une erreur s\'est produite.');
     }
      }

}else{
    header('Location: ../index.php'); 
}
?>



<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../lib/animate/animate.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">


<link href="../css/style.css" rel="stylesheet">




