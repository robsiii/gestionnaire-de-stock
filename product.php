<? include 'includes/config.php';

$query = $pdo->query('SELECT * FROM products WHERE id="'.$_POST['id_product'].'"');
$product_details = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="src/style/style.css">
</head>
<body>
  <header>
    <ul>
      <a href="index.php"><li class="right">Sign up</li></a>
      <a href="allproducts.php"><li class="right">Products</li></a>
      <a href="formulaire.php"><li class="right">New products</li></a>
    </ul>
  </header>
  <?php foreach($product_details as $_product_details): ?>
    <div class="container_individual_product">
      <div class="individual_product_image">
          <?=  '<img class="size_image" src="'.$_product_details->image.'" alt="'.$_product_details->name_object.'">'?>
          <p>Date de création : <?= $_product_details->beginyear?></p>
          <p>Date de fin de production : <?= $_product_details->endyear ?></p>
          <p>Stock : <?= $_product_details->stock ?></p>
          <p>Prix : <?= $_product_details->price ?>€</p>
          <a href="allproducts.php"><p>retour</p></a>
      </div>
        <div class="individual_product_informations">
          <p class="name_product_page"> <?= $_product_details->name_object ?></p>
          <p class="individual_product_description">Description : <?= $_product_details->description ?></p>
        </div>
    </div>
  <?php endforeach; ?>
</body>
</html>
