<?php
require_once 'header.php';
require_once '../db.php' ;
require_once 'functions/helper.php';
require_once 'functions/middleware.php';

?>

<div class="container">
<?php

$query=$db->prepare('select * from section2 limit 1');
$query->execute();
$section2=$query->fetch();


require_once 'functions/error.php';
?>
</div>
<div class="container">
    <h2>Section 2</h2>
    <form action="functions/section2.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section2['title'])? $section2['title']: ""?>">
        <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section2['text'])? $section2['text']: ""?></textarea>

        <?php
        if(isset($section2['image'])){?>
    <img src="<?= getImage($section2['image'])?>" width="100px">
      <?php  } ?>
        <input type="file" class="form-control my-2" name="image">

        <input type="text" class="form-control my-2" name="facebook" placeholder="facebook" value="<?= isset($section2['facebook'])? $section2['facebook']: ""?>">
        <input type="text" class="form-control my-2" name="instagram" placeholder="instagram" value="<?php echo isset($section2['instagram'])? $section2['instagram']: ""?>">
        <input type="text" class="form-control my-2" name="twitter" placeholder="twitter" value="<?php echo isset($section2['twitter'])? $section2['twitter']: ""?>">
        <input type="text" class="form-control my-2" name="pinterest" placeholder="pinterest" value="<?php echo isset($section2['pinterest'])? $section2['pinterest']: ""?>">
        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once 'footer.php'?>
