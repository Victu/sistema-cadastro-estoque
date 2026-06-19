<?php 

$connect = mysqli_connect(
    'db', 
    'root', 
    $_ENV['MYSQL_ROOT_PASSWORD'], 
    'estoque'
);
