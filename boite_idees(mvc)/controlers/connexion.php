<?php  require_once 'models/connexion.model.php'; ?>


<?php 
//Connexion
if (isset($_POST['login']))
{

	if (not_empty(['email','password']))
	{
		$_POST=array_map('htmlspecialchars',$_POST);
		$_POST=array_map('trim',$_POST);
		extract($_POST,EXTR_SKIP);

		getLogin($email,$password);
	}
	else
	{
	    $errors[]="Veuillez remplir tous les champs";
	}


}

?>


<?php  require_once 'views/connexion.view.php'; ?>