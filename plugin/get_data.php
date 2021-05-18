<?php

    include('../includes/dbconfig.php');
    $ref = "potholes";
    $fetchdata = $database->getreference($ref)->getValue();
    $getallinfo_array=array();
    $get_keys=array(); //array to store all keys of the potholes 
    $in_progress_count=0;
    $completed_count=0;
    $pending_count=0;
    foreach ($fetchdata as $index => $row) {
         $data=  $fetchdata[$index]['image'].",".$fetchdata[$index]['address'].",".$fetchdata[$index]['arterialPrio'].",".$fetchdata[$index]['latitude'].",".$fetchdata[$index]['longitude'].",".$fetchdata[$index]['no_of_reports'].",".$fetchdata[$index]['parish'].",".$fetchdata[$index]['priority'].",".$fetchdata[$index]['severity'];
         array_push($getallinfo_array,$data);
         array_push($get_keys,$index);

         if($fetchdata[$index]['status']==="in progress" || $fetchdata[$index]['status']==="verified"  ){
            $in_progress_count+=1;
         }else if($fetchdata[$index]['status']==="accepted"){
            
            $pending_count+=1;
        }else if($fetchdata[$index]['status']==="completed"){
            $completed_count+=1;
        }
    }
     $total_numreports=count($fetchdata);


     $reflandsur = "landsur";
     $landsur_fetchdata = $database->getreference($reflandsur)->getValue();
    


     $refcontractor = "contractor";
     $contractor_fetchdata = $database->getreference($refcontractor)->getValue();


     $refusers = "users";
     $users_fetchdata = $database->getreference($refusers)->getValue();
   





?>

