<?php
include('update_record.php');

if(isset($_POST['no_reports']))
{
    $no_reports= $_POST['no_reports']+1;
    $key= $_POST['key'];
    $address= $_POST['address'];
    $image=  $_POST['image'];
    $latitude=  $_POST['latitude'];
    $longitude=  $_POST['longitude'];
    $parish=  $_POST['parish'];
    $severity= $_POST['severity'];
    $arterialpriority= $_POST['arterialPrio'];

     $Postdata=[
                    'no_of_reports' => $no_reports,
                    'address' => $address,
                    'image' => $image,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'parish' => $parish,
                    'severity' => $severity,
                    'priority'=> $no_reports+$arterialPrio,
                    'testing'=>"test"
                ];

    update_rec($Postdata,$key);
}


?>
