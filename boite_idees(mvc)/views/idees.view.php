<?php   ob_start()  ?>


<!-- Container -->
<div class="d-inline-flex" id="container">



    <!-- Section gauche -->
    <div class="col-2 " id="section_gauche" style="position: fixed">
        <!-- Utilisateur -->
        <div id="section_utilisateur">

            <!-- Button modal modification photo -->
            <div class="modif_avatar" style="text-align:right">
                <button type="button" class="btn" data-toggle="modal" data-target="#modification_photo"><i class="fas fa-pen"  style="color: #4060b8"></i></button>
            </div>
            <?php foreach($infos as $info){ ?>
            <!-- Image profil -->
            <div class="photo_profile ml-auto mr-auto" style="width: 200px;height: 200px;border: 4px solid #4060b8;border-radius: 10%;background-color: white;overflow:hidden">
                <img src="assets/avatar/<?php echo $info['avatar'] ?>" class="img-fluid" alt="photo_profil">
            </div>
     
            <!-- Nom utilisateur -->
            <div class="mt-3">
                <p><b><?php echo $info['prenom']; ?>&ensp;<?php echo $info['nom']; ?></b></p>
            </div>

            <?php } ?>
            
            <!-- Déconnexion -->
            <div>
                <a class="nav-link mb-5" href="?page=deconnexion">Déconnexion</a>
            </div>
            
        </div>
        
    </div>

    

    <!-- Section milieu -->
    <div class=" col-10 mr-0 ml-auto" id="section_milieu">

        <!-- Formulaire idée -->
        <div class="row col-9 mr-auto ml-auto">
            <form class="bg-white mt-3 p-3 mb-5 col-9" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="sujet" placeholder="Sujet">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="message" placeholder="Partagez votre idée..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="valider" style="background-color: #4060b8"> Publier </button>
            </form>
        </div>

        <!-- Titre -->
        <div class="row col-19 mr-auto ml-auto ">
            <p style="color:grey"><b>Liste des idées</b></p>
        </div>

        <!-- Liste idées -->
        <div class="row liste_idees col-9 mr-auto ml-auto">  

            <!-- Foreach idées -->  
            <?php foreach($idees as $idee){ ?>
               
            <!-- Card -->
            <div class="card m-3 mb-5 col-9 shadow bg-body rounded" name="<?php echo $idee['id_idees']; ?>">
            
                <!-- Idées -->
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="card-text pt-2"><span style="color: #4060b8"><b><?php echo $idee['prenom'];?> <?php echo $idee['nom'];?></b></span>&ensp;<span style="color:grey">a partagé cette idée</span></p>
                        </div>

                        <!-- Si utilsateur connecté = utilsateur qui a crée l'idée, on affiche le bouton modifier sinon non -->
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $idee["id_users"] )  { ?>
                        <!-- Button  modal modification idee -->
                        <div class="modif_idee" style="text-align:right">
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?php echo $idee['id_idees']; ?>" data-whatever="@mdo"><i class="fas fa-pen"  style="color: #4060b8"></i></button>
                        </div>
                    <?php }else{} ?>
                    </div>
                    <p class="card-text mt-1" style="font-size: 10px;color:grey"><b><?php echo $idee['date_idees']; ?></b></p>
                    <h5 class="card-title"><?php echo $idee['sujet']; ?></h5>
                    <p class="card-text"><?php echo $idee['message']; ?></p>
                </div>

                <!-- Formulaire commentaire -->
                <div class="card-footer">
                    <form  method="POST">
                        <div class="form-inline d-flex">
                            <div class="form-group d-flex col-10 mt-1">
                                <input type="text" class="form-control" id="form-control" name="com" placeholder="Ecrivez un commentaire...">
                            </div>
                            <div class="d-flex ml-auto mr-auto mt-1">
                                <input type="hidden" name="id_ide" id="id_ide[]" value="<?php echo $idee['id_idees']; ?>" >
                                <input type="submit" class="btn btn-primary d-flex" name="valid_commentaire" style="background-color: #4060b8" value="Envoyer"/>
                            </div>
                        </div>
                    </form>
                </div>
                <button class="btn btn btn-secondary showhidereply" data-id="<?php echo $idee['id_idees'];?>"><span>Commentaire(s)&emsp;<i class="fas fa-sort"></i></span></button>
              
                <!-- Foreach commentaires -->
                <?php foreach($coms as $key => $com){
                
                    /* Récupération et initialisation date commentaire + initialisation date d'aujourd'hui */
                    $dc = $com['date_com'];     
                    $debut = new DateTime($dc);
                    $today = new DateTime('today');

                    /* If idée = commentaire */
                    if($idee['id_idees'] == $com['idees_com']){ ?>
                 
                       
                <!-- Commentaires -->
                <div class="card-footer reply-<?php echo $com['idees_com'];; ?>" style="display:none" name="<?php echo $com['idees_com']; ?>">
                        <div id="card-com" class="d-flex justify-content-between">
                            <div>
                                <p class="card-text"><span style="color: #4060b8; font-size:15px"><b><?php echo $com['prenom']; ?>&ensp;<?php echo $com['nom']; ?></b></span>&emsp;<?php echo $com['com']; ?></p>
                            </div>
                            <!-- Si utilsateur connecté = utilsateur qui a crée le commenataire, on affiche le bouton modifier sinon non -->
                            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $com["users_com"] )  { ?>
                            <div class="modif_sup_com" style="text-align:right">
                                <!-- Button modal modif commentaire -->
                                <button type="button" class="btn" data-toggle="modal" data-target="#modifCom<?php echo $com["id_com"]; ?>" data-whatever="@mdo"><i class="fas fa-pen"  style="color: #4060b8"></i></button>
                                <!-- Button modal supprimer commentaire -->
                                <button type="button" class="btn" data-toggle="modal" data-target="#suppCom<?php echo $com["id_com"]; ?>"><i class="fas fa-trash-alt"data-toggle="modal" style="color: #4060b8"></i></button>
                            </div>
                            <?php }else{} ?>
                        </div>
    
                    
                    <!-- If date commentaire inférieur à aujourd'hui, on récupére l'intervalle en format jour -->
                    <?php 
                    if($debut < $today){
                        $interval = $debut->diff($today);
                        $interval->format('%a');

                    /* If intervalle jour supérieur à 1, on affiche 'Il y a ... jours */
                    if ($interval->format('%a') > 1) { ?>

                    <p class="card-text" id="date_jour" style="font-size: 10px"><?php echo $interval->format('Il y a %a jours')?></p>
                    
                    <!-- If intervalle égale à 1, on affiche 'Il y a 1 jour' -->
                    <?php } if ($interval->format('%a') == 1) { ?>

                    <p class="card-text" id="date_jour" style="font-size: 10px">Il y a 1 jour</p>

                    <!-- Sinon si égale, on affiche aujourd'hui -->
                    <?php }} else if ($debut == $today ){ ?> 

                    <p class="card-text" id="date_jour" style="font-size: 10px">Aujourd'hui</p> 

                    <?php } ?>
                    
                </div>


                <!-- Modal modification commentaire-->
                <div class="modal fade" id="modifCom<?php echo $com["id_com"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier votre commentaire</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulaire modification commentaire -->
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Message :</label>
                                        <textarea class="form-control"  name="message_com_update"><?php echo $com['com']; ?></textarea>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <input type="hidden" name="com_update" class="com_update[]" value="<?php echo $com['id_com']; ?>" >
                                    <input type="submit" class="btn btn-primary" name="update_com" value="Envoyer">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal supprimer commentaire-->
                <div class="modal fade" id="suppCom<?php echo $com["id_com"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sur de vouloir supprimer votre commentaire ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo $com['com']; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form method="POST">
                                    <input type="hidden" name="com_delete" class="com_delete[]" value="<?php echo $com['id_com'];?>" >
                                    <input type="submit" class="btn btn-primary" name="delete_com"  value="Supprimer"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                    
                <?php } } ?>
                <!-- Fin du if + fin du foreach commentaires -->

            </div>
        

            <!-- Modal modification idee-->
            <div class="modal fade" id="exampleModal<?php echo $idee['id_idees']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier votre idée</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- formulaire modification idée -->
                            <form method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sujet :</label>
                                    <textarea class="form-control"  name="sujet_update"><?php echo $idee['sujet']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message :</label>
                                    <textarea class="form-control"  name="message_update"><?php echo $idee['message']; ?></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <input type="hidden" name="idee_update" class="idee_update[]" value="<?php echo $idee['id_idees']; ?>" >
                                <input type="submit" class="btn btn-primary" name="valider_update" value="Envoyer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php } ?>
            <!-- Fin du foreach idées -->

        </div>
    </div>

    <!-- Modal modification photo-->
    <div class="modal fade" id="modification_photo" tabindex="-1" aria-labelledby="modification_photo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier votre photo de profil</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="avatar"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="submit" class="btn btn-primary" name="valider_photo" value="Envoyer">  
                    </form>
                </div>     
            </div>
        </div>
    </div>
    
    

   
</div>





<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>


