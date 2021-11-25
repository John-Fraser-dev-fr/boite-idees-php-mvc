<?php 

//Connexion
function getLogin($email,$password)
{
	global $errors;	

	$bdd = getBdd();
	$q=$bdd->prepare("SELECT id_users,nom,prenom,email,password FROM users WHERE (email=:email)");
	$q->execute(['email'=>$email]);
    $userHasBeenFound=$q->rowCount();
	$user=$q->fetch();


	if ($userHasBeenFound and password_verify($password,$user['password'] ))
	{
        $_SESSION['id']=$user['id_users'] ;
		$_SESSION['email']=$user['email'] ;
		
		header('location: ?page=idees');
		exit;
	}
	else
	{
        $errors[]="Email ou mot de passe incorrect";
    }

}
 
?>