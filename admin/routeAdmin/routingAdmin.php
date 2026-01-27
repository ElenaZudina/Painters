<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host, '/');
$path = explode('/',$host)[$num];

if ($path == '' OR $path == 'index.php' ) {
    // Главная страница -
    $response = controllerAdmin::formLoginSite();
}
// ------- ВХОД -----------------------
elseif ($path == 'login') {
    // Форма входа
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout') {
    // Выход
    $response = controllerAdmin::logoutAction();
}
//-------- listPaintings
elseif($path == 'paintingsAdmin') {
    $response = controllerAdminPaintings::PaintingsList();
}
//-------- add painting
elseif ($path == 'paintingAdd') {
    $response = controllerAdminPaintings::paintingAddForm();
}
elseif ($path == 'paintingAddResult') {
    $response = controllerAdminPaintings::paintingAddResult();
}
//========= edit painting
elseif ($path =='paintingEdit' && isset($_GET['id'])) {
    $response = controllerAdminPaintings::paintingEditForm($_GET['id']);
}
elseif ($path == 'paintingEditResult' && isset($_GET['id'])) {
    $response = controllerAdminPaintings::paintingEditResult($_GET['id']);
}
//==========delete painting
elseif ($path=='paintingDel' && isset($_GET['id'])) {
    $response=controllerAdminPaintings::paintingDeleteForm($_GET['id']);
}
elseif ($path == 'paintingDelResult' && isset($_GET['id'])) {
    $response = controllerAdminPaintings::paintingDeleteResult($_GET['id']);
}
else 
{
    // Страница не существует
$response = controllerAdmin::error404();
}