<?php 

//Affichage des idées
function affichage()
{
    $bdd = getBdd();
    $requete = $bdd->prepare("SET lc_time_names = 'fr_FR'");
    $requete = $bdd->prepare('SELECT *, DATE_FORMAT(date_idees,"%d %M %Y") AS date_idees 
                              FROM idees,users WHERE users_idees=id_users 
                              ORDER BY idees.date_idees DESC');
    $requete->execute();
    $idees = $requete->fetchAll();

    return $idees;
}



//Suppression de l'idée
function delete_idee($num_delete)
{
	$bdd = getBdd();
    $d = $bdd->prepare("DELETE FROM idees WHERE idees.id_idees =:idees_id ");
	$d->execute(array('idees_id'=>$num_delete));
}

?>