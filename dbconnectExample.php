<?php

//kohne
//try {
//    $db=new mysqli('localhost','root','','course');
//}catch (Exception $e){
//    echo 'sef';
//}
//
//
//$query=$db->query('select * from books');
//$data=$query->fetch_all(MYSQLI_ASSOC);
//print_r($data);

try {
    $dbe=new PDO('mysql:host=localhost;dbname=course','root');
}catch (Exception $e){
    die($e->getMessage());
}

$user_id=null;
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

$query=$dbe->prepare("select * from books where id=?");
$query->execute([$user_id]);

print_r($query->fetchAll(PDO::fetch_assoc));