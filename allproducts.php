<?php

    include 'includes/config.php';
    include 'includes/handle_form.php';

    $query = $pdo->query('SELECT * FROM products');
    $users = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="src/style/style.css">
  <title>Document</title>
</head>
<body>
  <header>
    <ul>
      <a href="index.php"><li class="right">Sign up</li></a>
      <a href="allproducts.php"><li class="right">Products</li></a>
      <a href="formulaire.php"><li class="right">New products</li></a>
    </ul>
  </header>
  <div class="container_products_test">
    <?php foreach($users as $_product): ?>
      <div class="products_container">
        <p class="name_product_page title"><?= $_product->name_object ?></p>
          <div class="image_products">
            <?=  '<img class="size_image" src="'.$_product->image.'" alt="'.$_product->name_object.'">'?>
          </div>
      <div class="information_products">
        <p>Date de création : <?= $_product->beginyear ?></p>
        <p>Date de fin de production : <?= $_product->endyear ?></p>
        <p>Stock : <?= $_product->stock ?></p>
        <p class="price_products"><?= $_product->price ?>€</p>
      <div class="clear border"></div>
        <form class="buttons" action="product.php" method="post" enctype="multipart/form-data">
          <input class="envoie_id" name="id_product" type="number" value="<?= $_product->id ?>">
          <input class="view_more buttons_send" type="submit" value ="See the product">
        </form>
        <form class="buttons" action="partials/delete.php" method="post" enctype="multipart/form-data">
          <input class="envoie_id" name="id_product" type="number" value="<?= $_product->id ?>">
          <input class="view_more buttons_send" type="submit" value ="Delete">
        </form>
        <form class="buttons" action="modify.php" method="post" >
          <input class="envoie_id" name="id_product" type="number" value="<?= $_product->id ?>">
          <input class="view_more buttons_send" type="submit" value ="Modify">
        </form>
      </div>
      </div>
    <?php endforeach; ?>
  </div>
    <div class='add-button' onclick="funcWind()"><p>+</p></div>
      <div id="pop-up" class="wind">
        <div class="container">
          <form action="#" method="post" class="inventaire" enctype="multipart/form-data">
            <div>
                <input type="file" name="image">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <br>
                <input type="text" name="image_title" placeholder="Photo's title">
            </div>
              <div class="<?= array_key_exists('name-object', $error_messages) ? 'error' : '' ?>">
                  <label class="label_form"> Product Name  </label>
                  <input type="text" name="name-object" value="<?= $_POST['name-object'] ?>" placeholder="Nintendo" id="name-object">
              </div>
              <div class="<?= array_key_exists('beginyear', $error_messages) ? 'error' : '' ?>">
                  <label class="label_form"> Begin Year  </label>
                  <input type="number" name="beginyear" value="<?= $_POST['beginyear'] ?>" placeholder="1900" id="size">
              </div>
              <div class="<?= array_key_exists('endyear', $error_messages) ? 'error' : '' ?>">
                  <label class="label_form"> End Year </label>
                  <input type="number" name="endyear" value="<?= $_POST['endyear'] ?>" placeholder="1993" id="size">
              </div>

              <div class="<?= array_key_exists('stock', $error_messages) ? 'error' : '' ?>">
                  <label class="label_form"> Stock </label>
                  <input type="number" name="stock" value="<?= $_POST['stock'] ?>" placeholder="2" id="stock">
              </div>
              <div class="<?= array_key_exists('price', $error_messages) ? 'error' : '' ?>">
                  <label class="label_form"> Price in € </label>
                  <input type="number" name="price" value="<?= $_POST['price'] ?>" placeholder="230 €" id="price">
              </div>
              <div class="<?= array_key_exists('description', $error_messages) ? 'error' : '' ?>">
                <label class="label_form"> Description </label>
                <input type="text" name="description" value="<?= $_POST['description'] ?>" placeholder="La Nintendo 64 ....." id="color">
              </div>
              <div>
                  <input class="subbutton" type="submit">
              </div>
          </form>
        </div>
      </div>
<script type='text/javascript' src='src/scripts/script.js'></script>
</body>
</html>
