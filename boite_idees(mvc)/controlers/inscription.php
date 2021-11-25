<?php  require_once 'models/inscription.model.php'; ?>


<?php 
//Inscription
if (isset($_POST['register']))
{

	//si tous les champs sont remplis
	if (not_empty(['nom','prenom','email','password']))
	{
		$_POST=array_map('htmlspecialchars',$_POST);
		extract($_POST,EXTR_SKIP);

		if (count($errors)==0)
        {
			$password = password_hash($password,PASSWORD_DEFAULT);
            inscription($nom,$prenom,$email,$password);
            messages_flash("Le compte a bien été créé");
			header('location: ?page=inscription');
			exit();
		}
		else{}

	}
	else
	{		
	   $errors[]="Veuillez remplir tous les champs";
	}

}
?>


<?php require_once 'views/inscription.view.php'; ?>