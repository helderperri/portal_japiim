<?php 
//    include ("connection.php");
    require_once ("config.php");



            try {
                ?>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="background-color: #ffffff;">
                <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Email</th><th>Password</th></tr>
                    </thead>
                    <tbody>

                <?php

                    $result = $link->query("SELECT `user_id`, first_name, last_name, username, password, email FROM users");

                    if($result->rowCount()>0){
                            foreach ($result as $row){
                                ?>

                                <tr><td><?php echo $row['user_id'];?></td><td><?php echo $row['first_name'];?></td><td><?php echo $row['last_name'];?></td><td><?php echo $row['username'];?></td><td><?php echo $row['email'];?></td><td><?php echo $row['password'];?></td></tr>
                            
                                <?php
                            }
                            ?>
                    </tbody>
                            </table>
                    </div>
                    <script>
                            $(document).ready(function () {
                                $('#dtVerticalScrollExample').DataTable({
                                "scrollY": "200px",
                                "scrollCollapse": true,
                                "language": {
                                    "sProcessing": "Traitement en cours...",
                                    "sSearch": "Rechercher&nbsp;:",
                                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                                    "sInfoPostFix": "",
                                    "sLoadingRecords": "Chargement en cours...",
                                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                                    "oPaginate": {
                                        "sFirst": "Premier",
                                        "sPrevious": "Pr&eacute;c&eacute;dent",
                                        "sNext": "Suivant",
                                        "sLast": "Dernier"
                                    },
                                    "oAria": {
                                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                                    },

                                    "select": {
                                        "rows": {
                                            "_": "%d lignes sélectionnées",
                                            "0": "Aucune ligne sélectionnée",
                                            "1": "1 ligne sélectionnée"
                                        }
                                    }
                                }

                                });

                                $('.dataTables_length').addClass('bs-select');




                                });



                    </script>
                            <?php


                        }else{
                            echo "Nenhum usuário na tabela";
                        }


            } catch(PDOException $e){
                echo "Opps, houve um erro na sua busca<br><br>".$e->getMessage();
            }

        ?>
       