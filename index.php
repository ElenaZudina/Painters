
<?php
// Файл для запуска проекта
session_start();
include_once 'inc/Database.php';
require 'model/Style.php';
require 'model/Paintings.php';
require 'model/Comments.php';
//require 'model/Register.php';

include_once 'view/paintings.php';
include_once 'view/comments.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>