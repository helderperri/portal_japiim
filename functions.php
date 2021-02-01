<?php
function redirect($location){
    header("Location:{$location}");


}

function generate_token(){
    return md5(microtime().mt_rand());


}

function count_field_value($link, $table, $field, $value){

    try {

    $sql = "SELECT {$field} FROM {$table} WHERE {$field}=:value";
    $stmnt = $link->prepare($sql);
    $stmnt->execute([':value'=>$value]);
    return $stmnt->rowCount();
    


    } catch(PDOException $e){
        return $e->getMessage();
    }


}


?>