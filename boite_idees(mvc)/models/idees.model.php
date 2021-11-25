<?php 
	
//Déclaration des idées
function declaration($u,$sujet,$message,$date)
{
	$bdd = getBdd();
	$qr = $bdd->prepare("INSERT INTO idees(users_idees,sujet,message,date_idees) VALUES (:id,:sujet,:message,:date)");
	$qr->execute(array('id'=>$u,
	                   'sujet'=>$sujet,
		               'message'=>$message,
					   'date'=>$date));
    return $qr;
}



//Affichage des idées	
function affichage()
{
    $bdd = getBdd();
    $requete = $bdd->prepare("SET lc_time_names = 'fr_FR'");
    $requete = $bdd->prepare('SELECT *, DATE_FORMAT(date_idees,"%W %d %M %Y") AS date_idees 
	                          FROM idees,users WHERE users_idees=id_users ORDER BY idees.date_idees DESC');
    $requete->execute();
    $idees = $requete->fetchAll();

    return $idees;
}



//Modification des idées
function update_idee($id_update,$sujet_update,$message_update)
{
	$bdd = getBdd();
	$q = $bdd->prepare(" UPDATE idees SET sujet=:sujet_update, message=:message_update WHERE id_idees=:id ");
	$q->execute(array('sujet_update'=>$sujet_update,
                      'message_update'=>$message_update,
					  'id'=>$id_update));

	return $q;
}



//Déclaration des commentaires
function decla_com($u,$c,$commentaire,$date)
{
	$bdd = getBdd();
	$q = $bdd->prepare("INSERT INTO commentaires(users_com,idees_com,com,date_com) VALUES (:id,:id_idee,:com,:date)");
	$q->execute(array('id'=>$u,
	                  'id_idee'=>$c,
	                  'com'=>$commentaire,
                      'date'=>$date));
	return $q;
}



//Affichage des commentaires
function affi_com()
{
    $bdd = getBdd();
    $requete = $bdd->prepare('SELECT * FROM commentaires,idees,users 
	                          WHERE idees.id_idees=commentaires.idees_com 
							  AND users.id_users=commentaires.users_com 
							  ORDER BY date_com DESC');
    $requete->execute();
    $coms = $requete->fetchAll();

    return $coms; 
}


//Modification des commentaires
function update_com($com_update,$message_com_update)
{
	$bdd = getBdd();
	$q = $bdd->prepare("UPDATE commentaires SET com=:com WHERE id_com=:id_com ");
	$q->execute(array('com'=>$message_com_update,
                      'id_com'=>$com_update));
	return $q;
}


//Suppression du commentaire
function delete_com($com_delete)
{
	$bdd = getBdd();
    $a = $bdd ->prepare("DELETE FROM commentaires WHERE id_com =:id_com ");
    $a->execute(array('id_com'=>$com_delete));
	return $a;

}



//Modification photo de profil
function update_avatar($extensionUpload)
{
	$bdd = getBdd();
	$ua = $bdd->prepare("UPDATE users SET avatar= :avatar WHERE id_users= :id ");
	$ua->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload,
			           'id' => $_SESSION['id']));
}



// Informations sur l'utilisateur connecté
function infos_membre_connecte()	
{
	$bdd = getBdd();
	$req = $bdd->prepare('SELECT * FROM users WHERE id_users= :id ');
	$req->execute(array('id' => $_SESSION['id']));
	$infos = $req->fetchAll();

	return $infos; 
}


?>






