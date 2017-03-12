<?php
	$error_messages = array();
	$success_messages = array();
	// Form sent
	if(!empty($_POST))
	{
			// Retrieve data
			$pseudo = trim($_POST['pseudo']);
			$mot_de_passe = trim($_POST['mot_de_passe']);

	    if(empty($pseudo))
	              $error_messages['pseudo'] = 'should not be empty';

	    if(empty($mot_de_passe))
	              $error_messages['mot_de_passe'] = 'should not be empty';

			// No errors
			if(empty($error_messages))
			{
	            $query = $pdo->query('SELECT COUNT(*) FROM login_users WHERE username="'.$pseudo.'" AND password="'.$mot_de_passe.'"');
	            $val = $query->fetchColumn();

	            if($val > 0)
	            {
	              $_SESSION['connected'] = true;
	              header('Location: formulaire.php');
	              exit();
	            }
	            else
	            	{
	               $error_messages['pseudo'] = 'should not be empty';
	               $error_messages['mot_de_passe'] = 'should not be empty';
	             	}
	    }
    }
    // No data sent
    else
    {


    }
