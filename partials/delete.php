<? include '../includes/config.php';

    $id = (int)$_POST["id_product"];
    $prepare = $pdo->prepare("DELETE FROM products WHERE id =  :id");
    $prepare->bindParam('id', $id);
    $prepare->execute();

    header('Location: ../allproducts.php');
    exit();
?>
