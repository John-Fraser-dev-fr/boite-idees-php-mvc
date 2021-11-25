<?php 

function getBdd()
{
    try 
	{ 
		$bdd = new PDO('mysql:host=localhost;dbname=boite_idees', 'root', 'root'); 
		$bdd -> exec("set names utf8"); // pour passer à l'UTF 8 
		$requete= $bdd->query('SET lc_time_names = \'fr_FR\'');  // changement date au format français
	} 
	catch (Exception $e) 
	{ 
	    die('Erreur : ' . $e->getMessage()); 
	} 
    return $bdd;
}

?>
		