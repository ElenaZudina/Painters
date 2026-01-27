
<?php
// Файл для запуска проекта
session_start(); // Эта строка у вас уже есть

// --- Начало кода для выбора языка ---
$available_langs = ['en', 'et']; // Доступные языки: английский и эстонский
$default_lang = 'en'; // Язык по умолчанию, если не выбран другой

// Проверяем, передан ли язык через параметр GET (например, index.php?lang=et)
if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs)) {
    $_SESSION['lang'] = $_GET['lang']; // Сохраняем выбранный язык в сессии
    $current_lang = $_GET['lang'];
} elseif (isset($_SESSION['lang']) && in_array($_SESSION['lang'], $available_langs)) {
    $current_lang = $_SESSION['lang']; // Если язык уже есть в сессии, используем его
} else {
    $current_lang = $default_lang; // Иначе используем язык по умолчанию
}

// --- Конец кода для выбора языка ---

// --- Начало кода для загрузки переводов ---
// Загружаем файл с переводами для текущего языка
// Файлы будут лежать в папке `lang/`
$translations = include 'lang/' . $current_lang . '.php';

// Функция-помощник для получения перевода по ключу
// Например: echo t('author'); будет выводить 'Автор' или 'Autor'
function t($key) {
    global $translations; // Получаем доступ к глобальной переменной с переводами
    return $translations[$key] ?? $key; // Если перевод не найден, возвращаем сам ключ
}
// --- Конец кода для загрузки переводов ---

include_once 'inc/Database.php';
require 'model/Style.php';
require 'model/Paintings.php';
require 'model/Comments.php';
require 'model/Register.php';

include_once 'view/paintings.php';
include_once 'view/comments.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>