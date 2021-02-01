<?php

// USEFUL QUERIES //



// 1 //
// CHECK THE NAME OF ALL COLUMNS OF A TABLE AND ALSO GET THE INDEX NUMBER OF THE COLUMN//
$result = $link->query("SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='mydatabasename' 
    AND `TABLE_NAME`='mytablename'");
        
        if($result->rowCount()>0){
            foreach ($result as $key=>$val){
                $array = implode($val);
               echo $key." - ". $array."<br>";
            }

        }

// 2 //
//  IMPLODE ALL THE VALUES OF THE ROW [ALSO EACH SPECIFIC VALUE: $row["first_name"] OR $row[1]//
$result = $link->query("SELECT * FROM users");

if($result->rowCount()>0){
     foreach ($result as $key=>$row){
         $array = implode($row);
        echo $key." - ". $array."<br>";
        echo $row["first_name"]."<br>";
     }


 }
            ?>