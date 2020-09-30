<?php
session_start();
require('../../php/connection.php');

$name = $_POST['name'];

$desc = $_POST['description'];
$price = $_POST['price'];