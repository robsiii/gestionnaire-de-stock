<?php
  session_start();
  include 'includes/config.php';
  include 'includes/handle_form_co.php';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>MDP</title>
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        <link rel="stylesheet" href="src/style/style.css">
    </head>
    <body>
      <div class="login_encar">
        <div class="sign_in">
        </div>
          <div class="login">
            <h1>Inventory</h1>
            <h2>Time to feel like home and sign in</h2>
              <form action="index.php" method="post">
                <label class="label_signin pseudo"for="pseudo"> NAME </label>
                <input type="text" name="pseudo"  class="<?= array_key_exists('pseudo', $error_messages) ? 'error' : '' ?>"placeholder="azizmoke03">
                <br>
                <label class="label_signin password"for="mot_de_passe"> PASSWORD </label>
                <input type="password" name="mot_de_passe" class="<?= array_key_exists('mot_de_pass', $error_messages) ? 'error' : '' ?>" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                <br>
                <br>
              <input class="subbutton" type="submit" value="Sign in"/>
              </form>
            </div>
      </div>
        <div class="messages success">
        <?php foreach($success_messages as $_message): ?>
            <p><?= $_message ?></p>
        <?php endforeach ?>
        </div>
        <div class="messages errors">
          <?php foreach($error_messages as $_key => $_message): ?>
              <p><?= "$_key : $_message" ?></p>
          <?php endforeach ?>
        </div>
    </body>
</html>
