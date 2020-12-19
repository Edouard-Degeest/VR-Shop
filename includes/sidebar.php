<div class="sidebar">
    
<h4>Derniers Articles</h4>
<?php
 require_once('db.php');
 $select = $db->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,2");
$select->execute();

while($s=$select->fetch(PDO::FETCH_OBJ)){
    
?>
<img src="admin/img/<?php echo $s->title;?>.jpg" alt="">

<h2><?php echo $s->title;?></h2>
<h5><?php echo $s->description;?></h5>
<h4><?php echo $s->price;?> €</h4>
<?php
 }
?>



</div>

