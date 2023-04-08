<?php
require_once 'header.php';
require_once '../db.php' ;
require_once 'functions/helper.php';
require_once 'functions/middleware.php';

?>

<div class="container">
    <?php

    $query=$db->prepare('select * from section4head limit 1');
    $query->execute();
    $section4=$query->fetch();

    require_once 'functions/error.php';
    ?>
</div>
<div class="container">
    <h2>Section 4 head</h2>
    <form action="functions/section4head.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section4['title'])? $section4['title']: ""?>">
        <textarea class="form-control my-2" name="text" placeholder="text"><?php echo isset($section4['text'])? $section4['text']: ""?></textarea>

        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once 'footer.php'?>
