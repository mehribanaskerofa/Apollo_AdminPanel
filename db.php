<?php
session_start();
try {
    $db=new PDO('mysql:host=localhost;dbname=apollodb;','root');
}catch (Exception $e){
    die($e->getMessage());
}
