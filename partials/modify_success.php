<?php
include '../includes/config.php';

  $error_messages = array();
  if(!empty($_POST)){

    if (empty($error_messages)){
      $prepare = $pdo->prepare('UPDATE products SET name_object = :name_object, beginyear = :beginyear, endyear = :endyear, stock= :stock, price = :price, description= :description WHERE id = :id');
      $prepare->bindValue('name_object', $_POST['name-object']);
      $prepare->bindValue('beginyear', $_POST['beginyear']);
      $prepare->bindValue('endyear', $_POST['endyear']);
      $prepare->bindValue('stock', $_POST['stock']);
      $prepare->bindValue('price', $_POST['price']);
      $prepare->bindValue('description', $_POST['description']);
      $prepare->bindValue('id', $_POST['id']);
      $prepare->execute();
    }
  }

  header('Location: ../allproducts.php');
    exit();
 ?>
