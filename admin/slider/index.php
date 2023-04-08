<?php
require_once '../header.php';
require_once '../functions/helper.php';
require_once '../../db.php';
require_once '../functions/middleware.php';

?>

<div class="container">
    <?php


    $query=$db->prepare('select * from slider');
    $query->execute();
    $sliders=$query->fetchAll(PDO::FETCH_ASSOC);



    require_once '../functions/error.php';

    ?>
</div>


<div class="container">
    <h2>Sliders</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sliders as $slider){
            ?>

            <tr>
            <td><?= $slider['id'] ?></td>
            <td>
                <img src="<?= getImage($slider['image']) ?>" width="100" height="100" style="object-fit: contain">
            </td>
            <td>slider <?= $slider['type'] ?></td>
            <td>
                <div class="mx-2">
                    <a href="update.php?id=<?= $slider['id'] ?>" class="btn btn-primary">Edit</a>
                </div>
            </td>
            <td>
                <form action="">
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
      <?php  } ?>

        </tbody>
    </table>
</div>

<?php require_once '../footer.php'?>

