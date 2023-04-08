<?php
require_once 'helper.php';
require_once '../../db.php';

$urldr='../section2.php';

if($_SERVER['REQUEST_METHOD']!="POST"){
    redirect("$urldr");
    return;
}


if(isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['text']) && !empty($_POST['text']) &&
    isset($_POST['facebook']) &&
    isset($_POST['instagram']) &&
    isset($_POST['twitter']) &&
    isset($_POST['pinterest'])
){




    $title=cleandata($_POST['title']);
    $text=cleandata($_POST['text']);
    $facebook=cleandata($_POST['facebook']);
    $instagram=cleandata($_POST['instagram']);
    $twitter=cleandata($_POST['twitter']);
    $pinterest=cleandata($_POST['pinterest']);



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
        updateData($db,$section['id'],$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest);
    }
    else{
        if(!isset($_POST['image']) || empty($_POST['image'])){
            redirect("$urldr?error=file");
            return;
        }

        $fileName=$_FILES['image']['full_path'];
        $folder=realpath(__DIR__."/../../uploads")."/".$fileName;



        if (!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
            redirect("$urldr?error=file");
        }


        insertData($db,$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest);
    }

}
else{
    redirect("$urldr?error=data");
    return;
}



function getFirstData($db){
    $query=$db->prepare('select * from section2 limit 1');
    $query->execute();
    return $query->fetch();
}
function insertData($db,$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('insert into section2(title,text,image,facebook,instagram,twitter,pinterest) values (?,?,?,?,?,?,?)');
    $query->execute([$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest]);
    redirect("$urldr?success=true");
    return;
}

function updateData($db,$id,$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest){
    if(strlen($title)>50 || strlen($text)>255){
        redirect("$urldr?error=length");
        return;
    }

    $query=$db->prepare('update section2 set title=?, text=?,image=? , facebook=?, instagram=?, twitter=?, pinterest=? where id=?');
    $query->execute([$title,$text,$fileName,$facebook,$instagram,$twitter,$pinterest,$id]);
    redirect("../section2.php?update=true");
    return;
}
?>
