<?php 
require_once ("config.php");
?>
        <div class="container">
            <h1 class="text-center">Busque nos Dicionários</h1>


                <div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
   <button type="submit" class="input-group-text purple lighten-3" id="search_dic_btn"><i class="fas fa-search text-white"
        aria-hidden="true"></i></button>
  </div>
  <input class="form-control my-0 py-1" id="text_to_search" type="text" placeholder="Procurar" aria-label="Procurar">
</div>

<div class="d-flex flex-wrap pt-2">
                          <input class="form-check-input class_checkbox" type="checkbox" id="checkbox_dic_all" order="" value='dic_all' checked>
                            <label class="form-check-label" for="checkbox_dic_all"><b>Todos os dicionários</b></label><br>
                      </div>

            <div class="form-check d-flex flex-wrap pt-2 pt-2">
                          <input class="form-check-input class_checkbox" type="checkbox" id="checkbox_dic_all" order="" value='dic_all' checked>
                            <label class="form-check-label" for="checkbox_dic_all"><b>Todos os dicionários</b></label><br>
                      </div>

        <div class="d-flex flex-wrap pt-2">

        <?php


                try{

                    $result = $link->query("SELECT * FROM dics WHERE active = 1");

                    $dics_total = $result->rowCount();

                    ?>


                    <div id="total_checked_dics" dics_total =<?php echo $dics_total; ?>></div>
                    <div id="total_dics" dics_total =<?php echo $dics_total; ?>></div>
        

                    <?php
                    

                    if($result->rowCount()>0){


                    foreach ($result as $row){
                        $dic_name=$row['dic_name'];
                        $dic_name_display=$row['dic_name_display'];

                        ?>

                        <div class="form-check pr-2">
                          <input class="form-check-input class_checkbox" type="checkbox" id="checkbox_<?php echo $dic_name; ?>" order="" value='<?php echo $dic_name; ?>' checked>
                            <label class="form-check-label" for="checkbox_<?php echo $dic_name; ?>"><?php echo $dic_name_display; ?></label><br>
                      </div>


                    <?php

                    

                    }//foreach
                    }//if

                } catch(PDOException $e){
                    echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
                    } // try

            ?>
        </div>

                    <div id="search_dics_results_div" class="table-wrapper-scroll-y my-custom-scrollbar" style="background-color: #ffffff;">




                    </tbody>
                   







                            </table>
                    </div>


        </div> 

        
        <script>

$('#search_dic_btn').on('click', function(){

    var text_to_search = $("#text_to_search").val();
    var div = "#search_dics_results_div";
    var total_checked_dics = $("#total_checked_dics").attr("dics_total");
    var processed_dics = 1;
    var dic_names = [];
    var key = 0;
    $('#search_dics_results_div').empty();


  
    
    <?php


        try{

            $result2 = $link->query("SELECT * FROM dics WHERE active = 1");

            $dics_total = $result2->rowCount();
            
            if($dics_total>0){

            foreach ($result2 as $row){
                $dic_name=$row['dic_name'];
                $dic_name_display=$row['dic_name_display'];
                $checkbox_dic_name = "#checkbox_".$dic_name;

            

                    ?>



                    if($("<?php echo $checkbox_dic_name; ?>").is(':checked')){

                        dic_names[key] = "<?php echo $dic_name; ?>";
                        key = key +1;



                }



                    //processed_dics = parseInt(processed_dics) + 1;


            <?php



            }//foreach


            ?>

                $.ajax({
                    url:'search_dics_callback.php',
                    data:{text_to_search:text_to_search, dic_names:dic_names},
                    type: 'POST',
                    success: function(data){
                        if(!data.error){
                            $(div).html(data);
    
                        }
                    }
    
    
    
    
                    })





            <?php
            }//if

        } catch(PDOException $e){
            echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
            } // try

        ?>





})



</script>



<script>


<?php
    
try{

$result2 = $link->query("SELECT * FROM dics WHERE active = 1");

$dics_total = $result2->rowCount();

if($result2->rowCount()>0){

foreach ($result2 as $row){
    $dic_name=$row['dic_name'];
    $dic_name_display=$row['dic_name_display'];
    $checkbox_dic_name = "#checkbox_".$dic_name;



        ?>




        $("<?php echo $checkbox_dic_name; ?>").click(function() {
            
            var total_checked_dics = $("#total_checked_dics").attr("dics_total");
            var total_dics = $("#total_dics").attr("dics_total");
            

            if($(this).is(':checked') ) {
            
                var new_total_checked_dics = parseInt(total_checked_dics)+1;

                if(new_total_checked_dics == total_dics){

                    $("#checkbox_dic_all").prop( "checked", true );
 


                }

                $("#total_checked_dics").attr("dics_total", new_total_checked_dics);


            }else{

                var new_total_checked_dics = parseInt(total_checked_dics)-1;

                if($("#checkbox_dic_all").is(':checked') ) {

                    $("#checkbox_dic_all").prop( "checked", false);
 


                }

                $("#total_checked_dics").attr("dics_total", new_total_checked_dics);



            }

        })
        





    <?php

 


}//foreach
}//if

} catch(PDOException $e){
echo "Opps, houve um erro na busca1<br><br>".$e->getMessage();
} // try

?>


</script>
        
        
