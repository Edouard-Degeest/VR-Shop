<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VR Shop | Panel Admin </title>

    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">


    <link href="../css/style.css" rel="stylesheet">
    <link href="../img/headset.png" rel="icon">
</head>

<?php


session_start();
if (empty($_GET['action'])) {
    $_GET['action'] = array();
}
?>
<div class="username"> 
<h1> Bienvenue <?php echo $_SESSION['username']; ?> </h1>
</div>
<section id="services">
    <div class="container">
        <div class="section-header">
            <h2>Panel Admin</A></h2>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="box wow fadeInLeft">
                    <a href="?action=add">AJOUTER UN PRODUIT </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="box wow fadeInLeft">
                    <a href="?action=add_category">AJOUTER UNE CATEGORIE </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="box wow fadeInLeft">
                    <a href="?action=modifyanddelete">MODIFIER / SUPPRIMER UN PRODUIT </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="box wow fadeInLeft">
                    <a href="?action=modifyanddelete_category">MODIFIER / SUPPRIMER UNE CATEGORIE </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="box wow fadeInLeft">
                    <a href="?action=options">OPTIONS </a>
                </div>
            </div>
</section>



<?php
require_once('../includes/db.php');
if (isset($_SESSION['username'])) {

    if (isset($_GET['action'])) {
        if (!empty($_GET['action']) && $_GET['action'] == 'add') {

            if (isset($_POST['submit'])) {

                $stock = $_POST['stock'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $img = $_FILES['img']['name'];

                $img_tmp = $_FILES['img']['tmp_name'];

                if (!empty($img_tmp)) {
                    $image = explode('.', $img);

                    $image_ext = end($image);
                    if (in_array(strtolower($image_ext), array('png', 'jpg', 'jpeg')) === false) {
                        echo "Veuillez rentrer une image avec une extension valide.";
                    } else {

                        $image_size = getimagesize($img_tmp);
                        if ($image_size['mime'] == 'image/jpeg') {

                            $image_src = imagecreatefromjpeg($img_tmp);
                        } else if ($image_size['mime'] == 'image/png') {

                            $image_src = imagecreatefrompng($img_tmp);
                        } else {
                            $image_src = false;
                            echo "Veuillez rentrer une image valide";
                        }

                        if ($image_src !== false) {

                            $image_width = 200;
                            if ($image_size[0] == $image_width) {
                                $image_finale = $image_src;
                            } else {
                                $new_width[0] = $image_width;
                                $new_height[1] = 200;

                                $image_finale = imagecreatetruecolor($new_width[0], $new_height[1]);

                                imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);
                            }

                            imagejpeg($image_finale, 'img/' . $title . '.jpg');
                        }
                    }
                } else {
                    echo "Veuillez rentrer une image";
                }

                if ($title && $description && $price && $stock) {

                    $category = $_POST['category'];
                    $weight = $_POST['weight'];

                    $select = $db->query("SELECT price FROM weights WHERE name='$weight'");
                    $s = $select->fetch(PDO::FETCH_OBJ);
                    $shipping = $s->price;
                    $old_price = $price;
                    $Final_price = $old_price + $shipping;
                    $select = $db->query("SELECT tva FROM products");
                    $s1 = $select->fetch(PDO::FETCH_OBJ);
                    $tva = $s1->tva;
                    $final_price1 = $Final_price + $Final_price * $tva / 100;
                    $insert = $db->prepare("INSERT INTO products VALUES(null, '$title', '$description', '$price','$category','$weight','$shipping','$tva','$final_price1','$stock')");
                    $insert->execute();
                } else {
                    echo 'Veuillez remplir tout les champs';
                }
            }
?>

            <form action="" class="r70" method="post" enctype="multipart/form-data">



                <div class="form-group ">
                    <label for="product">Titre du produit : </label>
                    <input type="text" class="form-control" name="title" id="title" />

                    <label for="description">Description du produit : </label>
                    <input type="text" class="form-control" name="description" id="description" />

                    <label for="price">Prix : </label>
                    <input type="text" class="form-control" name="price" id="price" />
                    <label for="ctg">Catégorie : </label>
                    <select name="category">
                        <?php $select = $db->query("SELECT * FROM category");
                        while ($s = $select->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option><?php echo $s->name; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="weight">Poids plus de : </label>
                    <select name="weight">
                        <?php $select = $db->query("SELECT * FROM weights");
                        while ($s = $select->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option><?php echo $s->name; ?></option>
                        <?php
                        }
                        ?>

                    </select>
                    <label for="img">Image : </label>
                    <input type="file" name="img" />
                    <label for="stock" name="stock">Stock : </label>
                    <input type="text" name="stock" />
                    <input type="submit" name="submit" />

                </div>

            </form>


            <?php

        } else if (!empty($_GET['action']) && $_GET['action'] == 'modifyanddelete') {

            $select = $db->prepare("SELECT * FROM products");
            $select->execute();

            while ($s = $select->fetch(PDO::FETCH_OBJ)) {


            ?>
                <table class="table">
                    
                    
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $s->title; ?></th>
                            <th scope="row"> <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a> </th>
                            <th scope="row"> <a href="?action=delete&amp;id=<?php echo $s->id; ?>">X</a> </th>

                        </tr>
                    </tbody>

                </table>



            <?php
            }
        } else if (!empty($_GET['action']) && $_GET['action'] == 'modify') {

            $id = $_GET['id'];

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

                    <label for="price">Prix : </label>
                    <input type="text" value="<?php echo $data->price; ?>" class="form-control" name="price" id="price" />
                    <label for="stock" name="stock">Stock : </label> <input type="text" value="<?php echo $data->stock ?>" name="stock" />
                    <input type="submit" name="submit" value="Modifier" />
                </div>
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $stock = $_POST['stock'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $update = $db->prepare("UPDATE products SET title='$title', description='$description', price='$price', stock='$stock' WHERE id=$id");
                $update->execute();
                header('Location: admin.php?action=modifyanddelete');
            }
        } else if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
            $id = $_GET['id'];
            $delete = $db->prepare("DELETE FROM products WHERE id=$id");
            $delete->execute();
        } else if (!empty($_GET['action']) && $_GET['action'] == 'add_category') {

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                if ($name) {
                    $insert = $db->prepare("INSERT INTO category VALUES(null, '$name')");
                    $insert->execute();
                } else {
                    echo 'Veuillez remplir tous les champs';
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


        } else if (!empty($_GET['action']) && $_GET['action'] == 'modifyanddelete_category') {
            $select = $db->prepare("SELECT * FROM category");
            $select->execute();

            while ($s = $select->fetch(PDO::FETCH_OBJ)) {
            ?>
                <table class="table">
                    <tr>
                        <th scope="row"><?php echo $s->name; ?></th>
                        <th scope="row"><a href="?action=modify_category&amp;id=<?php echo $s->id; ?>">Modifier</a> </th>
                        <th scope="row"><a href="?action=delete_category&amp;id=<?php echo $s->id; ?>">X</a></th>
                    </tr>
                    </thead>

                </table>
            <?php
            }
        } else if (!empty($_GET['action']) && $_GET['action'] == 'modify_category') {

            $id = $_GET['id'];

            $select = $db->prepare("SELECT *  FROM category WHERE id=$id");
            $select->execute();
            $data = $select->fetch(PDO::FETCH_OBJ);

            ?>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="product">Titre de la catégorie : </label>
                    <input type="text" value="<?php echo $data->name; ?>" class="form-control" name="title" id="title" />


                    <input type="submit" name="submit" value="Modifier" />
                </div>
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $title = $_POST['title'];

                $update = $db->prepare("UPDATE category SET name='$title' WHERE id=$id");
                $update->execute();
                header('Location: admin.php?action=modifyanddelete_category');
            }
        } else if (!empty($_GET['action']) && $_GET['action'] == 'delete_category') {
            $id = $_GET['id'];
            $delete = $db->prepare("DELETE FROM category WHERE id=$id");
            $delete->execute();

            header('Location: admin.php?action=modifyanddelete_category');
        } else if (!empty($_GET['action']) && $_GET['action'] == 'options') {
            ?>
            <div class="frais">
                <h2>Frais de ports :</h2>
                <h3>Options de poids</h3>
            </div>
            <?php
            $select = $db->query("SELECT * FROM weights");
            while ($s = $select->fetch(PDO::FETCH_OBJ)) {

            ?>
                <div class="frais">
                    <form action="" method="post">

                        <input type="text" name="weight" value="<?php echo $s->name; ?>" /><a href="?action=modify_weight&amp;name=<?php echo $s->name; ?>"> Modifier </a>

                    </form>
                </div>
            <?php
            }

            $select = $db->query("SELECT tva FROM products");
            $s = $select->fetch(PDO::FETCH_OBJ);
            if (isset($_POST['submit2'])) {

                $tva = $_POST['tva'];
                if ($tva) {
                    $update = $db->query("UPDATE products SET tva=$tva");
                }
            }
            ?>
            <div class="frais">
                </br>
                <h3> TVA: </h3>
                <form action="" method="POST">
                    <input type="text" name="tva" value="<?php echo $s->tva; ?>">
                    <input type="submit" name="submit2" value="Modifier" />
                </form>
            </div>
        <?php
        }
    } else if ($_GET['action'] == 'modify_weight') {
        $old_weight = $_GET['name'];
        $select = $db->query("SELECT * FROM weights WHERE name=$old_weight");
        $s = $select->fetch(PDO::FETCH_OBJ);
        if (isset($_POST['submit'])) {
            $weight = $_POST['weight'];
            $price = $_POST['price'];

            if ($weight && $price) {
                $update = $db->query("UPDATE weights SET name='$weight', price='$price' WHERE name=$old_weight");
            }
        }
        ?>
        <h2>Frais de ports :</h2>
        <h3>Options de poids</h3>
        <?php
        $select = $db->query("SELECT * FROM weights");
        while ($s = $select->fetch(PDO::FETCH_OBJ)) {
        }
        ?>

        <form action="" method="POST">
            <h3>Poids (plus de): </h3> <input type="text" name="weight" value="<?php echo $_GET['name']; ?> " />
            <h3>Correspond à</h3><input type="text" name="price" value="<?php echo $s->price; ?> " /> €


            <input type="submit" name="submit" value="Modifier " />

        </form>



<?php

    } else {

        die('Une erreur s\'est produite.');
    }
} else {
    header('Location: ../index.php');
}
?>






</html>