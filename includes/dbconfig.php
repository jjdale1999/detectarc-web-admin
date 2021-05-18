<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = (new Factory)->withServiceAccount(__DIR__ . '/potholedetection-f30ba-firebase-adminsdk-nbjdg-8036b1c834.json');


$firebase = (new Factory())
    ->withDatabaseUri('https://potholedetection-f30ba-default-rtdb.firebaseio.com');
   

    
$database = $firebase->createDatabase();
