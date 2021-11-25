<?php   ob_start()  ?>

<div class="d-inline-flex" id="admin_container">

    <div class="gauche_admin col-2">
        <div>
            <a class="nav-link mb-5" href="?page=deconnexion">Déconnexion</a>
        </div>
        <h4>Filtres</h4>  
    </div>

    <div class="tableau col-10">
        <table class="table" id="tableau_admin">
            <thead>
                <tr>
                    <th scope="col-2">Dates</th>
                    <th scope="col-2">Utilisateurs</th>
                    <th scope="col-3">Idées</th>
                    <th scope="col-1">Suppression idées</th>
                </tr>
            </thead>
            <tbody>

                <!-- Foreach idées dans le tableau -->
                <?php foreach($idees as $idee) { ?>
              
                <tr>
                    <td><?php echo $idee['date_idees']; ?></td>
                    <td><?php echo $idee['prenom'];?></td>
                    <td><?php echo $idee['sujet']; ?></td>
                    <td>
                        <!-- Button modal supprimer -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?php echo $idee['id_idees']; ?>"><i class="fas fa-trash-alt"data-toggle="modal" data-target="#exampleModal<?php echo $idee['id_idees']; ?>"></i></button>
                    </td>
                </tr>

                <!-- Modal supprimer -->
                <div class="modal fade" id="exampleModal<?php echo $idee['id_idees']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sur de vouloir supprimer cette idée ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo $idee['sujet']; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form method="POST">
                                    <input type="hidden" name="num_delete" class="num_delete[]" value="<?php echo $idee['id_idees']; ?>" >
                                    <input type="submit" class="btn btn-primary" name="sub_delete"  value="Supprimer"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
                <!-- Fin du foreach -->

            </tbody>
        </table>

    </div>

</div>




<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>