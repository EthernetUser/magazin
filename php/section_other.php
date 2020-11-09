<?php
if(!$query = mysqli_query($connection, "SELECT `text` FROM sections_other_$lang")){
    echo 'server error';
    die(mysqli_error($connection));
}

$section_other = mysqli_fetch_all($query);