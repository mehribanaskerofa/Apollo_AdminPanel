<?php
require_once 'helper.php';
require_once '../../db.php';

$urldr='../section3.php';

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
        $fileName=$section['image'];

        if(isset($_FILES['image']) && $_FILES['image']['error']==null){
            $fileName=$_FILES['image']['full_path'];
            $folder=realpath(__DIR__."/../../uploads")."/".$fileName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
                redirect("$urldr?error=file");
            }
        }


        //,twitter:$twitter,
        updateData($db,$section['id'],$title,$text,$fileName);
    }
    else{
        if(!isset($_FILES['image']) || $_FILES['image']['error']!=null){
            redirect("$urldr?error=file");
            return;
        }

        $fileName=$_FILES['image']['full_path'];
        $folder=realpath(__DIR__."/../../uploads")."/".$fileName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
            redirect("$urldr?error=file");
        }


        insertData($db,$title,$text,$fileName);
    }

}
else{
    redirect("$urldr?error=data");
    return;
}



function getFirstData($db){
    $query=$db->prepare('select * from section3 limit 1');
    $query->execute();
    return $query->fetch();
}
function insertData($db,$title,$text,$fileName){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('insert into section3(title,text,image) values (?,?,?)');
    $query->execute([$title,$text,$fileName]);
    redirect("$urldr?success=true");
    return;
}

function updateData($db,$id,$title,$text,$fileName){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('update section3 set title=?, text=?,image=?  where id=?');
    $query->execute([$title,$text,$fileName,$id]);
    redirect("../section3.php?update=true");
    return;
}
?>
