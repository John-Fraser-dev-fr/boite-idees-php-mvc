<?php require_once '_partials/header.php';   ?>
<?php require_once '_partials/nav.php';   ?>
<?php  require_once '_partials/errors.php'; ?>


<?php
//variable pour afficher le message d'alerte
if(!empty($_SESSION['messages_flash'])) 
{ 
   echo $_SESSION['messages_flash'];
   $_SESSION['messages_flash']=[]; 
}
             
?>



<?= $content;  ?>

<?php require_once '_partials/footer.php';   ?>