<?php
include("update_record.php");

if(isset($_POST['key']))
{
    if($_POST['land_surveyor']=="Land Surveyor"){
        if($_POST['old_landsur']!==""){
            $land_sur=$_POST['old_landsur'];
        }else{
            $land_sur="";  
        }
    }else if($_POST['land_surveyor']!="Land Surveyor"){
        $land_sur=$_POST['land_surveyor'];
    }

    if($_POST['contractor']=="Contractor"){

        if($_POST['old_contractor']!==""){
            $contractor=$_POST['old_contractor'];
        }else{
            $contractor="";  
        }
        $contractor="";  
    }else if($_POST['contractor']!="Contractor"){
        $contractor=$_POST['contractor'];
    }


    $postdata=[
        'land_surveyor'=>$land_sur,
        'contractor'=>$contractor

    ];

    update_rec($postdata,$_POST['key']);


    $Postdata=[
        'here'=>'here'
    ];

    
    update_nwa_agent($Postdata,$_POST['land_surveyor'],$_POST['key'],"landsur");
    update_nwa_agent($Postdata,$_POST['contractor'],$_POST['key'],"contractor");
    
}


?>
