<?php
require_once 'helper.php';


if(!isset($_SESSION['admin-user']) || $_SESSION['admin-user']!='admin'){
    redirect('http://localhost/apollo/admin/login.php');
    die();
}
?>
<div class="container">
    <h2>Admin name: <?= $_SESSION['admin-user']?></h2>
    <a href="http://localhost/apollo/admin/login.php">Logout</a>
</div>