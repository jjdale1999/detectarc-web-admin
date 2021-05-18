<?php
include('update_record.php');

if(isset($_POST['no_reports']))
{
    $no_reports= $_POST['no_reports']+1;
    $priority= $_POST['no_reports']+$_POST['priority'];
    $key= $_POST['key'];
   
     $Postdata=[
                    'no_of_reports' => $no_reports,
                    'priority' => $priority
                    
                ];

    update_rec($Postdata,$key);
}


?>
