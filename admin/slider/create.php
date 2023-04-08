<?php
require_once '../header.php';
require_once '../../db.php' ;
require_once '../functions/helper.php';
require_once '../functions/middleware.php';

?>

<div class="container">
    <?php
    require_once '../functions/error.php';
    ?>
</div>
<div class="container">
    <h2>Create Slider</h2>
    <form action="../functions/slider.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <?php
                if(isset($slider['image'])){?>
                    <img src="<?= getImage($slider['image'])?>" width="100px">
                <?php  } ?>
                <input type="file" class="form-control my-2" name="image">
                <input type="hidden" class="form-control my-2" name="action" value="create">
            </div>
            <div class="col-6">
                <select name="type" id="" class="form-control">
                    <option value="1">Slider 1</option>
                    <option value="2">Slider 2</option>
                </select>
            </div>
        </div>


        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once '../footer.php'?>

