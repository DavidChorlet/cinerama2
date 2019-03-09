<?php

// Base de données
define('HOST', 'localhost');
define('DBNAME', 'cinedavid');
define('LOGIN', 'chorlet');
define('PASSWORD', 'dddd');


include 'database.php';
include 'comments.php';
include 'medias.php';
include 'posts.php';
include 'users.php';
session_start();