<?php
// if (isset($_POST)) { 
   
//     update_rec($_POST['postdata'],$_POST['key']); 
        
// } 
 
function update_rec($Postdata,$key){
    include("../includes/dbconfig.php");


//     $uid = 'some-user-id';
//     $postData = [
//     'title' => 'My awesome post title',
//     'body' => 'This text should be longer',
//     ];

// // Create a key for a new post
// $newPostKey = $database->getReference('posts')->push()->getKey();

// $updates = [
//     'posts/'.$newPostKey => $postData,
//     'user-posts/'.$uid.'/'.$newPostKey => $postData,
// ];

// $database->getReference() // this is the root reference
//    ->update($updates);


$reference = $database->getReference("potholes")->getChild($key)->update($Postdata);

}


// function insert_rec($postData){

//     database->getReference()->getChild(dbname)->getChild($key)->set($value);
// }


?>