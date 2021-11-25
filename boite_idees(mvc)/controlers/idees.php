<?php  require_once 'models/idees.model.php'; ?>

<?php 



//Si l'utilisateur n'est pas connecté, redirige vers la page connexion
if (!isset($_SESSION['id']) && !isset($_SESSION['email']))
{
    header('location: ?page=connexion');
    exit;
}

//Si l'utilisateur qui est connecté est l'amdin, redirige vers la page admin
if (isset($_SESSION['id']) && $_SESSION['id'] == 23)
{
    header('location: ?page=admin');
    exit;
}

//Envoie idée
if (isset($_POST['valider']))
{
	//si tous les champs sont remplis
	if (not_empty(['sujet','message']))
	{
        //récupération données + date et sécurisation
		$_POST=array_map('htmlspecialchars',$_POST);
		extract($_POST,EXTR_SKIP);
		$date= date("Y-m-d");
		$u=$_SESSION['id'];
				
		//Si aucune erreur	
        if (count($errors)==0)
        {
            declaration($u,$sujet,$message,$date);
            messages_flash("L'idée a été postée");
			header('location: ?page=idees');
			exit();
		}

    }
	else
	{
		$errors[]="Veuillez remplir tous les champs !";
	}

}


//Affichage des idées
$idees= affichage();


//Modification idee
if (isset($_POST['valider_update']) && !empty($_POST['idee_update']))
{
	//si tous les champs sont remplis
	if (not_empty(['sujet_update','message_update']))
	{
        //récupération données + sécurisation
		$_POST=array_map('htmlspecialchars',$_POST);
		extract($_POST,EXTR_SKIP);
		$id_update=$_POST['idee_update'];
		$sujet_update=$_POST['sujet_update'];
		$message_update=$_POST['message_update'];
				
		if (count($errors)==0)
        {
            update_idee($id_update,$sujet_update,$message_update);
            messages_flash("L'idée a été modifiée");
            header('location: ?page=idees');
			exit();
		}

	}
	else
	{
		$errors[]="Veuillez remplir tous les champs !";
		save_input_data();
	}

}




//Envoie commentaire
if(isset($_POST['valid_commentaire']) && !empty($_POST['id_ide']))
{
    //Si le commentaire n'est pas vide
	if (not_empty(['com']))
	{  
        //récupération données + date et sécurisation
		$_POST=array_map('htmlspecialchars',$_POST);
		extract($_POST,EXTR_SKIP);
		
		$date= date("Y-m-d");
		$u=$_SESSION['id'];
		$c=$_POST['id_ide'];
		$commentaire=$_POST['com'];
		
		decla_com($u,$c,$commentaire,$date);
		messages_flash("Le commentaire a été envoyé");
		header('location: ?page=idees');
		exit();	    
	}
    else
	{
		$errors[]="Veuillez remplir le champ !";
	}
}


//Affichage des commentaires
$coms= affi_com();



//Modification commentaires
if (isset($_POST['update_com']) && !empty($_POST['com_update']))
{
	//si tous les champs sont remplis
	if (not_empty(['message_com_update']))
	{
        //récupération données + sécurisation
		$_POST=array_map('htmlspecialchars',$_POST);
		extract($_POST,EXTR_SKIP);
		$com_update=$_POST['com_update'];
		$message_com_update=$_POST['message_com_update'];
				
		if (count($errors)==0)
        {
            update_com($com_update,$message_com_update);
            messages_flash("Le commentaire a été modifiée");
            header('location: ?page=idees');
			exit();
		}
		

	}
	else
	{
		$errors[]="Veuillez remplir le champ !";
		save_input_data();
	}

}

//Suppression commentaire
if(isset($_POST['delete_com']) && !empty($_POST['com_delete']))
{
    $com_delete = $_POST['com_delete'];
	delete_com($com_delete);
	messages_flash("Le commentaire a bien été supprimé");
	header('location: ?page=idees');
	exit();
}




//Envoie photo de profil
if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name']))
{
    //Mise en place d'une taille max par fichier + vérification extensions
	$tailleMax= 2097152;
	$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
     

	if($_FILES['avatar']['size'] <= $tailleMax)
	{
		// vérification minuscule extension / ignore le 1er caractère de la chaine / recupére l'extension du fichier avec le '.'
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); 
		// Si l'extension d'upload correpond à $extensionsValides
		if(in_array($extensionUpload,$extensionsValides))
		{
            $chemin= "assets/avatar/".$_SESSION['id'].".".$extensionUpload;
			$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
			if($resultat)
			{
                update_avatar($extensionUpload);
				messages_flash("La photo a été mise à jour");
				header('location: ?page=idees');
				exit();
			}
			else
			{
			    $errors[]="Erreur lors de l'importation de votre photo de profil";	
			}
		}
		else
		{
			$errors[]="Votre photo de profil doit être au format jpg, jpeg, gif ou png";	
		}
	}
    else
	{
	    $errors[]="Votre photo de profil ne doit pas dépasser 2 Mo";
	}
		    
}
   


// Affichage informations utilisateurs
$infos = infos_membre_connecte();


?>



<?php require_once 'views/idees.view.php'; ?>