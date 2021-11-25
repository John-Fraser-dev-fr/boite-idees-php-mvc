<?php 

//vérification que les champs ne sont pas vides
function not_empty($fields)
{
    if (count($fields)!=0)
	{
        foreach ($fields as $field) { //pour chaque champ de tout les autres champs
            if (empty($_POST[$field]) || trim($_POST[$field])=="") //si champs est vide OU barre d'espace
			{
                return false;//sort de la fonction
            }
			
		}
        return true;
	}

}



//fonction pour le message d'alerte
function messages_flash($message,$type='success') {

$_SESSION['messages_flash']='

<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
  '.$message.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

';}






?>