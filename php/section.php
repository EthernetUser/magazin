<?php
$query = mysqli_query($connection, "SELECT * FROM sections_$lang");
$sections = mysqli_fetch_all($query);