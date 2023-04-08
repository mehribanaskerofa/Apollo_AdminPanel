<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apollo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .gradient-custom {
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>

<?php
require_once '../db.php';
require_once 'functions/helper.php';



if($_SERVER['REQUEST_METHOD']=="POST"){
    if(
            !isset($_POST['name']) || empty($_POST['name']) &&
            !isset($_POST['password']) || empty($_POST['password'])
    ){
                echo "<h2 class='text-danger z-3'>Enter right username or password</h2>";
                return;
    }

    $username=cleandata($_POST['name']);
    $password=cleandata($_POST['password']);
////
//    print_r(md5('123'));
//    die();

    $query=$db->prepare('select * from admin where name=? and password=? limit 1');
    $query->execute([$username,md5($password)]);
    $admin=$query->fetch();


    if(!$admin){
        echo "<h2 class='text-danger'>Wrong username or password</h2>";
        return;
    }


    $_SESSION['admin-user']='admin';
    redirect('http://localhost/apollo/admin');
}
?>



<section class="vh-70 gradient-custom">
    <div class="container py-5 h-70">
        <div class="row d-flex justify-content-center align-items-center h-70">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <form action="" method="post">
                            <div class="form-outline form-white mb-4">
                                <input name="name" type="email" id="typeEmailX"  class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Password</label>
                            </div>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                <?php

                                ?>
                            </form>

                        </div>

<!--                        <div>-->
<!--                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>-->
<!--                            </p>-->
<!--                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
