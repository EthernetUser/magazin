<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['role']);
session_destroy();
mysqli_close($connection);
header('Location: ../index.php');