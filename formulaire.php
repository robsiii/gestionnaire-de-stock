<?php
    session_start();
    include 'includes/config.php';
    include 'includes/handle_form.php';

    $query = $pdo->query('SELECT * FROM products');
    $users = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php - Formulaire</title>
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
  <div class="wrong_message">
  <div class="messages success">
      <?php foreach($success_messages as $_message): ?>
          <p><?= $_message ?></p>
      <?php endforeach ?>
  </div>
  <div class="messages errors">
      <?php foreach($error_messages as $_key => $_message): ?>
          <p><?= "$_message" ?></p>
      <?php endforeach ?>
  </div>
</div>
</body>
</html>
