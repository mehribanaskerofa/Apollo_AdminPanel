<?php
require_once 'helper.php';
require_once '../../db.php';

$urldr='../slider/create.php';
$urldr1='../slider/update.php';
$imageType=[1,2];

if($_SERVER['REQUEST_METHOD']!="POST"){
    redirect($urldr);
    return;
}


//insert
if(isset($_FILES['image']) && $_FILES['image']['error']==null &&
    isset($_POST['type']) && !empty($_POST['type']) &&
    $_POST['action']=="create"
){



    if(!isset($_FILES['image']) || empty($_FILES['image'])){
            redirect("$urldr?error=file");
            return;
    }
        $type=(int)cleandata($_POST['type']);

        if(!in_array($type,$imageType)){
        redirect("$urldr?error=file");
        return;
    }


        $fileName=cleandata($_FILES['image']['full_path']);
        $folder=realpath(__DIR__."/../../uploads")."/".$fileName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
            redirect("$urldr?error=file");
            return;
        }


    $query=$db->prepare('insert into slider (image,type) values (?,?)');
    $query->execute([$fileName,$type]);

    redirect("../slider/index.php?success=true");
    return;
}
else if(isset($_FILES['image']) && $_FILES['image']['error']==null &&
    isset($_POST['type']) && !empty($_POST['type']) &&
    isset($_POST['id']) && $_POST['action']=="update"
 ){


    if(!isset($_FILES['image']) || empty($_FILES['image'])){
        redirect("$urldr1?error=file");
        return;}

    $id=(int)cleandata($_POST['id']);
    $type=(int)cleandata($_POST['type']);



    if(!in_array($type,$imageType)){
        redirect("$urldr1?error=file");
        return;
    }


    $fileName=cleandata($_FILES['image']['full_path']);
    $folder=realpath(__DIR__."/../../uploads")."/".$fileName;



    if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
        redirect("$urldr1?error=file");
        return;
    }



    $query=$db->prepare('update slider set image=?, type=? where id=?');
    $query->execute([$fileName,$type,$id]);
    redirect("../slider/index.php?success=true");
    return;
}
else{
    redirect("../slider/index.php");
    return;
}


