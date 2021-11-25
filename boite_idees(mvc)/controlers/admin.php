<?php  require_once 'models/admin.model.php'; ?>


<?php 

if (!isset($_SESSION['id']) && !isset($_SESSION['email']))
{
    header('location: ?page=connexion');
    exit;
}



if (isset($_SESSION['id']) && $_SESSION['id'] != 23)
{
    header('location: ?page=idees');
    exit;
}



//Affichage des idées
$idees= affichage();




//Suppression de l'idée
if(isset($_POST['sub_delete']) && !empty($_POST['num_delete']))
{
    $num_delete = $_POST['num_delete'];
	delete_idee($num_delete);
	messages_flash("L'idée a bien été supprimée");
	header('location: ?page=admin');
	exit();
}


?>


<?php  require_once 'views/admin.view.php'; ?>