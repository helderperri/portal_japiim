<?php 



if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once ("config2.php");

       




$dic_name = "";
/*
if(isset($_POST["dic_to_search"])){

    $dic_name = $_POST["dic_to_search"];

}
*/


//$lang_code = "por";


$phonemic_id = "";
$phonemic = "";
$phonetic_id = "";
$phonetic = "";
$pron_id = "";
$wav = "";

$user_id = $_SESSION["user_sub"];


?>

    <table id="search_dics_results_table" class="display table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        
    <thead>
        <tr><th>Língua</th><th>Vernácula</th><th>Fonêmica</th><th>Fonética</th><th> <button id='pron_btn_thread' type="button"  audio="none" class='btn btn-default btn-sm btnpron_thread p-0'>
                                        <span class="material-icons md-18">volume_up</span>
                                    </button></th><th>Glosa (Português)</th></tr>
        </thead>

    <tbody id="search_dics_results">


    <?php






        $result1 = $link2->query("SELECT * FROM users_words WHERE user_id = $user_id");
        if($result1->rowCount()>0){
            foreach ($result1 as $row){
                
                $lang_code = $row["lang_code"];
                $dic_name = $row["dic_name"];
                $form_bundle_id = $row["form_bundle_id"];
                $form_id = $row["form_id"];
                //echo $lang_code;



                $dic_path = "dic/".$dic_name."/connection.php";
                include ($dic_path);







                $result6 = $link->query("SELECT * FROM forms WHERE form_id = $form_id");
                if($result6->rowCount()>0){
                    foreach ($result6 as $row){
                        $i = 1;
                        while ($i <= 1){
                            $vernacular=$row['vernacular'];




                            $result5 = $link->query("SELECT * FROM phonemic WHERE form_id = $form_id");
                            if($result5->rowCount()>0){
                                foreach ($result5 as $row){
                                    $i2 = 1;
                                    while ($i2 <= 1){
                                        $phonemic=$row['phonemic'];
                                        $phonemic_id=$row['phonemic_id'];

                                        




                                        $result43 = $link->query("SELECT * FROM phonetic WHERE phonemic_id = $phonemic_id");

                                        if($result43->rowCount()>0){
                                            foreach ($result43 as $row){
                                                $i3 = 1;
                                                while ($i3 <= 1){
                                                    $phonetic=$row['phonetic'];
                                                    $phonetic_id=$row['phonetic_id'];
                        
            






                                                    $result4 = $link->query("SELECT * FROM prons WHERE phonetic_id = $phonetic_id");

                                                    if($result4->rowCount()>0){
                                                        foreach ($result4 as $row){
                                                            $i4 = 1;
                                                            while ($i4 <= 1){
                                                                $wav=$row['wav'];
                                                                $pron_id=$row['pron_id'];

                                                                
                                                                
            
                                                
                                                
                                              
                                                            
            

                                                                







            
            
            
                                                                
                                    
                        
                        
                                                    $i4 = $i4 +1;
                        
                                                            }
                        
                                                }
                        
                            
                                            }
                        
                        
            










                        
            
            
                                        $i3 = $i3 +1;
            
                                                }
            
                                    }
            
                
                                }
            
            







            


                            $i2 = $i2 +1;

                                    }

                        }

    
                    }





                            $i = $i +1;
                        }

    
                    }
                }




  
                                            ?>
                                            

                                                                <tr>
                                                                
                                                                <td><?php echo $lang_code; ?></td>
                                                                
                                                                <td><?php echo $vernacular; ?></td>
                                                                
                                                                <td><?php echo $phonemic; ?></td>
                                                                
                                                                <td><?php echo $phonetic; ?></td>
                                                                
                                                                <td>
                                                                    <?php
                                
                                                                if(!empty($wav)){
                                
                                
                                
                                                                    ?>
                                                                    <button id='<?php echo $dic_name; ?>_<?php echo $pron_id;?>' type="button"  audio="assets/audio/<?php echo $wav?>" class='btn btn-default btn-sm btnpron p-0'>
                                                                        <span class="material-icons md-18">volume_up</span>
                                                                    </button>
                                                                    <audio controls hidden id="audio_<?php echo $dic_name; ?>_<?php echo $pron_id;?>">
                                                        
                                                                    <source id="<?php echo $pron_id;?>_wav" src="dic/<?php echo $dic_name; ?>/assets/audio/<?php echo $wav?>" type="audio/wav">
                                                                    <!-- <source id="<?php echo $pron_id;?>_ogg" src="#" type="audio/ogg">
                                                                    <source id="<?php echo $pron_id;?>_mp3" src="assets/audio/<?php echo $mp3?>" type="audio/mpeg">
                                                                    -->
                                                                    </audio> 
                                                                <?php
                                
                                                            }
                                
            
                                                                ?>


                           
            
                                </td>
                                <td>
            






                        <?php



                                $result2 = $link->query("SELECT * FROM form_bundles WHERE form_bundle_id = $form_bundle_id");
                                                                if($result2->rowCount()>0){
                                                            
                                                                  foreach ($result2 as $row){
                                                                    $entry_id=$row['entry_id'];
                                                
                                                
                                                
                                                
                                                                    $result3 = $link->query("SELECT * FROM sense_bundles WHERE entry_id = $entry_id");
                                                                    if($result3->rowCount()>0){
                                                                
                                                                      foreach ($result3 as $row){
                                                                        $sense_bundle_id=$row['sense_bundle_id'];
                                                            
                                                            
                                                
                                                
                                                
                                                                        $result4 = $link->query("SELECT * FROM senses WHERE ((sense_bundle_id = $sense_bundle_id) AND (lang_code = 'por'))");
                                                                        if($result4->rowCount()>0){
                                                                    
                                                                          foreach ($result4 as $row){
                                                    
                                                                            $gloss=$row['def'];
                                                
                                                                
                                                    

                                            ?>

                                            <?php echo $gloss; ?><br>
                                                                            
            
                                            <?php
            
                                                    
                                                    
                                                    
                                                    
                                                                            }//foreach
                                                    
                                                                            }//if
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                
                                                
                                                
                                                
                                                                        }//foreach
                                                
                                                                        }//if
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                                  }//foreach
                                                
                                                                }//if
                                                
                                                ?>




                                            </td>
                                                                            </tr>
            
                                            <?php
            
                                                







            }

        }


    ?>




</tbody>
    </table>





                <script>
         
                $('.btnpron').click(function() {
        
        
                        var pron_id = $(this).attr('id');
        
                        audio_id = "#audio_"+pron_id;
                        var audio_play = $(audio_id).get(0);
                        audio_play.load();
                        audio_play.play();
                        
        
                       });
        
        
                </script>



    <script>
                                $(document).ready(function () {
                                    $('#search_dics_results_table').dataTable({

                                        dom: 'Bfrtip',
                                        buttons: [
                                            
                    {
                        "extend": "excel",
                        "text": "Excel",
                        "charset": "utf-8",
                        "bom": "true",
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                //order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                //search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                    {
                        "extend": "csv",
                        "text": "CSV",
                        "charset": "utf-8",
                        "bom": "true",
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                //order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                //search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                    {
                        "extend": "pdfHtml5",
                        "text": "PDF",
                        "charset": "utf-8",
                        "bom": "true",
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                //order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                //search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                    {
                        "extend": "copy",
                        "text": "Copiar",
                        "charset": "utf-8",
                        "bom": "true",
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                //order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                //search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                    {
                        "extend": "print",
                        "text": "Imprimir",
                        "charset": "utf-8",
                        "bom": "true",
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                //order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                //search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0, 1, 2, 3, 5]
                            }
                        }
                                        ],

    

                                        'pageLength': 25,
                                        'scrollY': '500px',
                                        'scrollCollapse': true,

                                        "language": {
                                        "sProcessing": "Buscando...",
                                        "sSearch": "Procurar nos resultados&nbsp;:",
                                        "sLengthMenu": "Mostrar _MENU_ entradas",
                                        "sInfo": "Exibindo entradas _START_ a _END_, de _TOTAL_ entradas",
                                        "sInfoEmpty": "Não há entradas a serem exibidas",
                                        "sInfoFiltered": "(filtrado de _MAX_ entradas em total)",
                                        "sInfoPostFix": "",
                                        "sLoadingRecords": "Chargement en cours...",
                                        "sZeroRecords": "Não houve resultados para a sua busca.",
                                        "sEmptyTable": "Não há entradas na tabela",
                                        "oPaginate": {
                                            "sFirst": "Primeiro",
                                            "sPrevious": "Anterior",
                                            "sNext": "Pr&oacute;ximo",
                                            "sLast": "&Uacute;ltimo"
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
    
                                    //$('.dataTables_length').addClass('bs-select');
    
    
    
    
                                    });
    
    
    
                        </script>
