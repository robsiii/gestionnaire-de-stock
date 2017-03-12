<?php
    // Messages
    $error_messages   = array();
    $success_messages = array();

    // Form sent
    if(!empty($_POST))
    {
        // Retrieve data
        $image_title = trim($_POST['image_title']); //nom de l'image
        $maxsize = 1048576; //Taille
        $valid_extensions = array('png','jpg','jpeg'); //Type de l'extenssion
        $check_extension = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1)); //retirer l'extension du fichier
        $name_object = trim($_POST['name-object']);
        $beginyear  = (int)$_POST['beginyear'];
        $endyear      = (int)$_POST['endyear'];
        $stock       = (int)$_POST['stock'];
        $price       = (float)$_POST['price'];
        $description = trim($_POST['description']);

        // First name errors
        if(empty($name_object))
            $error_messages['name-object'] = 'should not be empty';
        // YEAR begin
        if(empty($beginyear))
            $error_messages['beginyear'] = 'should not be empty';
        // YEAR end
        if(empty($endyear))
                $error_messages['endyear'] = 'should not be empty';
        // stock errors
        if(empty($stock))
            $error_messages['stock'] = 'should not be empty';
        // price errors
        if(empty($price))
            $error_messages['price'] = 'should not be empty';
        // Description errors
        if(empty($description))
            $error_messages['description'] = 'should not be empty';
        // No errors
        if(empty($error_messages))
        {
        $path = 'src/images/'.$image_title.'.'.$check_extension;
        $result = move_uploaded_file($_FILES['image']['tmp_name'],$path);

          if($result)
          {

            $prepare = $pdo->prepare('INSERT INTO products (image, name_object, beginyear, endyear, stock, price, description) VALUES (:image, :name_object, :beginyear, :endyear, :stock, :price, :description)');
            $prepare->bindValue('image', $path);
            $prepare->bindValue('name_object', $name_object);
            $prepare->bindValue('beginyear', $beginyear);
            $prepare->bindValue('endyear', $endyear);
            $prepare->bindValue('stock', $stock);
            $prepare->bindValue('price', $price);
            $prepare->bindValue('description', $description);


            $prepare->execute();
            // Add success message
               $_POST['name-object'] = '';
               $_POST['beginyear']        = '';
               $_POST['endyear']        = '';
               $_POST['stock']    = '';
               $_POST['price']    = '';
               $_POST['description']    = '';

          }



        }
    }

    // No data sent
    else
    {
        // Default values
        $_POST['name-object'] = '';
        $_POST['beginyear']        = '';
        $_POST['endyear']        = '';
        $_POST['stock']    = '';
        $_POST['price']    = '';
        $_POST['description']    = '';

    }
