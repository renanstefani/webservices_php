<?php

//HOST - localhost
define('HOST', 'localhost');

//USER - root
define('USER', 'root');

//PASS - senha
define('PASS', '');

//DB - db_curso_udemy
define('DB', 'db_curso_udemy');


$charset = 'utf8';
//conn = mysqli_connect($host, $user, $password, $database)
$conn = mysqli_connect(HOST, USER, PASS, DB)
    or die('Falhou...');

?>