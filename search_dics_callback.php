<?php 

require_once ("config.php");

       


      
function logged_in2(){
    if(isset($_SESSION["user_sub"])){
        return true;
      //$user_sub = $_SESSION["user_sub"];
    
    }elseif(isset($_COOKIE["user_sub"])){
      return true;
    }else{
  
      
  
    
        return false;
     
  
  }
    
    }


$dic_name = "";
/*
if(isset($_POST["dic_to_search"])){

    $dic_name = $_POST["dic_to_search"];

}
*/

if(isset($_POST["text_to_search"])){

    $text_to_search = $_POST["text_to_search"];

}


$lang_code = "por";


$phonemic_id = "";
$phonemic = "";
$phonetic_id = "";
$phonetic = "";
$pron_id = "";
$wav = "";



?>

    <table id="search_dics_results_table" class="display table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        
    <thead>
        <tr><th>Língua</th><th>Vernácula</th><th>Fonêmica</th><th>Fonética</th><th> <button id='pron_btn_thread' type="button"  audio="none" class='btn btn-default btn-sm btnpron_thread p-0'>
                                        <span class="material-icons md-18">volume_up</span>
                                    </button></th><th>Glosa (Português)</th>
                                    <?php

                                    
                                    
              $user_id = "";

if(logged_in2()){

  $user_id = $_SESSION["user_sub"];

?>
<th>
  <button id="add_word_btn" user_id = "<?php echo $user_id; ?>" href="#"  type="button" class='btn btn-default mr-auto add_word sl p-0 pl-2'>
  <span class="material-icons md-18">add</span>
</button>
</th>

<?php

}






?>


                                    
                                    </tr>
        </thead>

    <tbody id="search_dics_results">


        <?php









        ?>

    

    <?php


        $dic_names = array();

        if(isset($_POST["dic_names"])){

            $dic_names = $_POST["dic_names"];

        }

        //echo implode(",", $dic_names);

        $key = 0;
       foreach($dic_names as $dic_name){

        //echo $lang_code;
        $key = $key + 1;

        $dic_path = "dic/".$dic_name."/connection.php";


        include ($dic_path);



    $result9 = $link->query("SELECT * FROM  glosses WHERE ((lang_code = '$lang_code' AND gloss LIKE '$text_to_search%') OR (lang_code = '$lang_code' AND gloss LIKE '%$text_to_search'))");
    if($result9->rowCount()>0){

      foreach ($result9 as $row){
        $phonemic_id = "";
        $phonemic = "";
        $phonetic_id = "";
        $phonetic = "";
        $pron_id = "";
        $wav = "";
        
        $sense_bundle_id=$row['sense_bundle_id'];
        $gloss=$row['gloss'];
        //$entry_ref=$row['entry_ref'];
  

    try {



        $result8 = $link->query("SELECT * FROM sense_bundles WHERE sense_bundle_id = $sense_bundle_id");
        if($result8->rowCount()>0){
    
          foreach ($result8 as $row){
            $entry_id=$row['entry_id'];

            try{

                $result7 = $link->query("SELECT * FROM form_bundles WHERE entry_id = $entry_id");
                if($result7->rowCount()>0){
            
                  foreach ($result7 as $row){
                    $form_bundle_id=$row['form_bundle_id'];


                    try{

                        $result6 = $link->query("SELECT * FROM forms WHERE form_bundle_id = $form_bundle_id");
                        if($result6->rowCount()>0){
                    
                          foreach ($result6 as $row){
                            $vernacular=$row['vernacular'];
                            $form_id=$row['form_id'];
                            $lang_code_source = $row['lang_code'];
                            $native_name = "";


                            try{

                                $result5 = $link->query("SELECT * FROM phonemic WHERE form_id = $form_id");

                               $phonemic_number = 0;
                               
                               
                                if($result5->rowCount()>0){
 
                                    while($phonemic_number<1){

                                    
                                foreach ($result5 as $row){
                                    $phonemic_id=$row['phonemic_id'];
                                    $phonemic=$row['phonemic'];







                                    try{

                                        $result5 = $link->query("SELECT * FROM phonetic WHERE phonemic_id = $phonemic_id");
        
                                       $phonetic_number = 0;
                                       
                                       
                                        if($result5->rowCount()>0){
         
                                            while($phonetic_number<1){
        
                                            
                                        foreach ($result5 as $row){
                                            $phonetic_id=$row['phonetic_id'];
                                            $phonetic=$row['phonetic'];
        
        
        
        
        
        
        
        
                                            try{

                                                $result5 = $link->query("SELECT * FROM prons WHERE phonetic_id = $phonetic_id");
                
                                               $pron_number = 0;
                                               
                                               
                                                if($result5->rowCount()>0){
                 
                                                    while($pron_number<1){
                
                                                    
                                                foreach ($result5 as $row){
                                                    $pron_id=$row['pron_id'];
                                                    $wav=$row['wav'];
                
                
                
                
                
                
                
                
                
                
                
                                                    
                                                    
                                                    
                
                
                
                                                }//foreach
                
                                                $pron_number = $pron_number+1; 
                                                }//while
                
                
                                            }//if
                    
                                            } catch(PDOException $e){
                                                echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                                                } // try
                            
                
                
        
        
                                            
                                            
                                            
        
        
        
                                        }//foreach
        
                                        $phonetic_number = $phonetic_number+1; 
                                        }//while
        
        
                                    }//if
            
                                    } catch(PDOException $e){
                                        echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                                        } // try
                    
        




                                    
                                    



                                }//foreach

                                $phonemic_number = $phonemic_number+1; 
                                }//while


                            }//if
    
                            } catch(PDOException $e){
                                echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                                } // try
            






                            try{

                                $result3 = $link->query("SELECT * FROM languages WHERE lang_code = '$lang_code_source'");
                                if($result3->rowCount()>0){
                            
                                foreach ($result3 as $row){
                                    $native_name=$row['native_name'];

                                

                                }//foreach
                                }//if
    
                            } catch(PDOException $e){
                                echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                                } // try
            
    
                                
                                ?>
                                <tr>
                                
                                <td><?php echo $native_name; ?></td>
                                
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
                                
                                <td><?php echo $gloss; ?></td>
                                <?php

                                                            
                                                            
                        $user_id = "";

                        if(logged_in2()){

                        $user_id = $_SESSION["user_sub"];

                        ?>
                        <td>
                        <button id="add_word_btn_<?php echo $form_id; ?>" user_id = "<?php echo $user_id; ?>" form_id="<?php echo $form_id; ?>" href="#" form_bundle_id = "<?php echo $form_bundle_id; ?>" lang_code = "<?php echo $lang_code_source; ?>" dic_name = "<?php echo $dic_name; ?>"  type="button" class='btn btn-default mr-auto add_word sl p-0 pl-2'">
                        <span class="material-icons md-18">add</span>
                        </button>
                        </td>

                        <script>
                            $("#add_word_btn_<?php echo $form_id; ?>").on('click', function(){

                            var lang_code = $(this).attr('lang_code');
                            var form_bundle_id = $(this).attr('form_bundle_id');
                            var form_id = $(this).attr('form_id');
                            var user_id = $(this).attr('user_id');
                            var dic_name = $(this).attr('dic_name');
                            var add_word = 1;
                            
                            console.log("testando 0");

                            

                            $.ajax({
                                    url:'add_word_to_list.php',
                                    data:{user_id:user_id, dic_name:dic_name, form_bundle_id:form_bundle_id, form_id:form_id, lang_code:lang_code, add_word:add_word},
                                    type: 'POST',
                                    success: function(data){
                                        if(!data.error){
                                            //$('#entry_display').html(data);
                                        console.log("testando 1");
                                        console.log(form_bundle_id);
                                        
                                
                                        }
                                    }
                                })




                            })
                            
                                </script>


                        <?php

                        }






                        ?>

  

                                    <?php
                                
                                
                                /*
                                echo "<br>";
                                echo $lang_code;
                                echo "<br>";
                                echo $vernacular;
                                echo "<br>";
                                echo $entry_id;
                                echo "<br>";
                                //echo $entry_ref;
                                //echo "<br>";
                                echo $gloss;
                                echo "<br>";
                                echo $sense_bundle_id;
                                echo "<br>";            
                                echo $form_bundle_id;
                                echo "<br>";
                                */
                    
   
                                ?>

                                </tr>

                                <?php
                    }//foreach
                    }//if


                    ?>
        <script>
 
        $('.btnpron').click(function() {


                var pron_id = $(this).attr('id');

                audio_id = "#audio_"+pron_id;
                var audio_play = $(audio_id).get(0);
                audio_play.load();
                audio_play.play();
                

               });


        </script>
                    <?php



                } catch(PDOException $e){
                    echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                    } // try
            
    



                }//foreach
                }//if


            } catch(PDOException $e){
            echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
            } // try
    

                    


                }//foreach
                }//if


            } catch(PDOException $e){
            echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
            } // try
    


          }//foreach
        }//if
    




        ?>


        <?php

 
    ?>


    
    
    
                    <?php
        
                                }


         
    
    
    
    ?>




</tbody>
    </table>


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
