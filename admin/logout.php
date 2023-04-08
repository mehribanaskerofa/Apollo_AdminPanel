<?php

require_once '../db.php';
require_once 'functions/helper.php';

unset($_SESSION['admin-user']);
redirect('login.php');

