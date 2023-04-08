<?php

if(isset($_GET['error'])) {
    if ($_GET['error'] == 'data') {
        echo "<h2 style='color:red'>Add data </h2>";
    } else if ($_GET['error'] == 'length') {
        echo "<h2 style='color:yellow'>Wrong data </h2>";
    } else if ($_GET['error'] == 'file') {
        echo "<h2 style='color:brown'>File error </h2>";
    }

}
    else if(isset($_GET['success']) && $_GET['success']==true){
        echo "<h2 style='color:green'>Data added </h2>";
    }

    else if (isset($_GET['update']) && $_GET['update']==true) {
            echo "<h2 style='color:greenyellow'>Updated data </h2>";
    }

    else if (isset($_GET['delete']) && $_GET['delete']==true) {
        echo "<h2 style='color:yellow'>Deleted data </h2>";
    }



