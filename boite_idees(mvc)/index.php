<?php  //routeur

session_start();

require_once 'includes/functions.php'; //fichier qui contient toute les fonctions
require_once 'config/database.php'; //connexion BDD
require_once 'config/constants.php';

$errors=[]; //initialisation du tableau contenant les erreurs du formulaire

if (!empty($_GET['page']) && is_file('controlers/'.$_GET['page'].'.php')  ) //si fichier existe
{
  require_once 'controlers/'.$_GET['page'].'.php'; //renvoie au controleur concerné
} 
else 
{
  require_once 'controlers/connexion.php'; //sinon controleur connexion
} 


?>

