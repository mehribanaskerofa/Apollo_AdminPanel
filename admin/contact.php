<?php
require_once 'header.php';
require_once 'functions/helper.php';
require_once '../db.php' ?>

<div class="container">
    <?php


    $query=$db->prepare('select * from contact');
    $query->execute();
    $contactdatas=$query->fetchAll(PDO::FETCH_ASSOC);



    require_once 'functions/error.php';

    ?>
</div>


<div class="container">
    <h2>Contact data</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contactdatas as $contactdata){
            ?>

            <tr>
                <td><?= $contactdata['id'] ?></td>
                <td><?= $contactdata['email'] ?></td>
                <td><?= $contactdata['subject'] ?></td>
                <td><?= $contactdata['message'] ?></td>
                <td>
                    <div class="mx-2">
                        <a href="functions/section4.php?id=<?= $contactdata['id'] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
        <?php  } ?>

        </tbody>
    </table>
</div>

<?php require_once 'footer.php'?>

