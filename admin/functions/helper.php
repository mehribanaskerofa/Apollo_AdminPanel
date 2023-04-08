<?php

function redirect($url){
    header("location:$url");
}

function getImage($imageName){
    return "http://localhost/apollo/uploads/$imageName";
}

function cleandata($data){
    return trim(strip_tags($data));
}
