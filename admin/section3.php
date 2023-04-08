<?php
require_once 'header.php';
require_once '../db.php' ;
require_once 'functions/helper.php';
require_once 'functions/middleware.php';

?>

<div class="container">
    <?php

    $query=$db->prepare('select * from section3 limit 1');
    $query->execute();
    $section3=$query->fetch();

    require_once 'functions/error.php';
    ?>
</div>
<div class="container">
    <h2>Section 3</h2>
    <form action="functions/section3.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section3['title'])? $section3['title']: ""?>">
        <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section3['text'])? $section3['text']: ""?></textarea>

        <?php
        if(isset($section3['image'])){?>
            <img src="<?= getImage($section3['image'])?>" width="100px">
        <?php  } ?>
        <input type="file" class="form-control my-2" name="image">

            <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once 'footer.php'?>
