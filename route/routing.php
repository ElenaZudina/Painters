<?php
// вычислить маршрут из адресной строки
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if($path == '' OR $path == 'index' OR $path == 'index.php') {
    $response = Controller::StartSite();
}

elseif($path == 'all') {
    $response = Controller::AllPaintings();
}
elseif($path == 'style' and isset($_GET['id'])) {
    $response = Controller::PaintingsByStyleID($_GET['id']);
}
elseif($path == 'paintings' and isset($_GET['id'])) {
    $response = Controller::PaintingByID($_GET['id']);
}
elseif($path == 'insertcomment' and isset($_GET['comment'],$_GET['id'])) {
    $response = Controller::InsertComment($_GET['comment'],$_GET['id']);
}
//register user
elseif ($path == 'registerForm' ) {
    //form register
    $response = Controller::registerForm();
}
elseif ($path == 'registerAnswer') {
    //register user
    $response = Controller::registerUser();
}

//error page
else{
    $response = Controller::error404();
}

?>