<?php 

//Inscription
function inscription($nom,$prenom,$email,$password)
{
	$bdd = getBdd();
	$q = $bdd->prepare('INSERT INTO users(nom,prenom,email,password) VALUES (:nom,:prenom,:email,:password)');
	$q->execute(['nom'=>$nom,
		        'prenom'=>$prenom,
			    'email'=>$email,
				'password'=>$password]);
}

?>
