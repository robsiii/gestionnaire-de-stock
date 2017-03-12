<?php
include 'includes/config.php';

    $id = (int)$_POST["id_product"];
    $prepare = $pdo->prepare("SELECT * FROM products WHERE id =  :id");
    $prepare->bindValue('id', $id);
    $prepare->execute();
    $product_details = $prepare->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
  <div class="container">
  <form action="partials/modify_success.php" method="post" class="inventaire" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product_details->id ?>">
    <div>
        <input type="file" name="image">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <br>
        <input type="text" name="image_title" placeholder="Photo's title">
    </div>
      <div class="">
          <label class="label_form"> Product Name  </label>
          <input type="text" name="name-object" value="<?= $product_details->name_object ?>" placeholder="Product Name" id="name-object">
      </div>
      <div class="<?= array_key_exists('beginyear', $error_messages) ? 'error' : '' ?>">
          <label class="label_form"> Begin Year  </label>
          <input type="number" name="beginyear" value="<?= $product_details->beginyear?>" placeholder="Begin Year" id="size">
      </div>
      <div class="<?= array_key_exists('endyear', $error_messages) ? 'error' : '' ?>">
          <label class="label_form"> End Year </label>
          <input type="number" name="endyear" value="<?= $product_details->endyear ?>" placeholder="End Year" id="size">
      </div>
      <div class="<?= array_key_exists('stock', $error_messages) ? 'error' : '' ?>">
          <label class="label_form"> Stock </label>
          <input type="number" name="stock" value="<?= $product_details->stock ?>" placeholder="Stock" id="stock">
      </div>
      <div class="<?= array_key_exists('price', $error_messages) ? 'error' : '' ?>">
        <label class="label_form"> Price in € </label>
          <input type="number" name="price" value="<?= $product_details->price ?>" placeholder="Price in €" id="price">
      </div>
      <div class="<?= array_key_exists('description', $error_messages) ? 'error' : '' ?>">
          <label class="label_form"> Description </label>
          <input type="text" name="description" value=" <?= $product_details->description ?>" placeholder="description" id="color">
      </div>
      <div>
          <input class="subbutton" type="submit">
      </div>
  </form>
  </div>
</form>
</body>
</html>
