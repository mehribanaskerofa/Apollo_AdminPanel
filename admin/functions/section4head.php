<?php
require_once 'helper.php';
require_once '../../db.php';

$urldr='../section4head.php';

if($_SERVER['REQUEST_METHOD']!="POST"){
    redirect("$urldr");
    return;
}


if(isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['text']) && !empty($_POST['text'])
){

    $title=cleandata($_POST['title']);
    $text=cleandata($_POST['text']);

    $section=getFirstData($db);


    if($section){
        updateData($db,$section['id'],$title,$text);
    }
    else{
        insertData($db,$title,$text);
    }

}
else{
    redirect("$urldr?error=data");
    return;
}



function getFirstData($db){
    $query=$db->prepare('select * from section4head limit 1');
    $query->execute();
    return $query->fetch();
}
function insertData($db,$title,$text){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('insert into section4head(title,text) values (?,?)');
    $query->execute([$title,$text]);
    redirect("$urldr?success=true");
    return;
}

function updateData($db,$id,$title,$text){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('update section4head set title=?, text=? where id=?');
    $query->execute([$title,$text,$id]);
    redirect("../section4head.php?success=true");
    return;
}
?>
