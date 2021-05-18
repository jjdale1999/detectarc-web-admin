<?php
// if (isset($_POST)) { 
   
//     update_rec($_POST['postdata'],$_POST['key']); 
        
// } 
 
function update_rec($Postdata,$key){
    include("../includes/dbconfig.php");

$reference = $database->getReference("potholes")->getChild($key)->update($Postdata);

}


function update_nwa_agent($Postdata,$key,$potholekey,$usertype){
    include("../includes/dbconfig.php");

$reference = $database->getReference($usertype)->getChild($key)->getChild($potholekey)->update($Postdata);

}


// function insert_rec($postData){

//     database->getReference()->getChild(dbname)->getChild($key)->set($value);
// }


?>