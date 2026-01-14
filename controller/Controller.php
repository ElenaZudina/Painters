<?php
class Controller {

    public static function StartSite() {
        $arr = Paintings::getLast10Paintings(); // News::getLast10News();
        include_once 'view/start.php';
    }

    //было
    // public static function  AllCategory() {
        //$arr = Category::getAllCategory();
        //include_once 'view/category.php';
    //}

    public static function  AllStyle() {
        $arr = Style::getAllStyle();
        include_once 'view/style.php';
    }

    /*было
    public static function AllNews() {
        $arr = News::getAllNews();
        include_once 'view/allnews.php';
    }*/

    public static function AllPaintings() {
        $arr = Paintings::getAllPaintings();
        include_once 'view/allpaintings.php';
    }

    /*public static function NewsByCatID($id) {
        $arr = News::getNewsByCategoryID($id);
        include_once 'view/catnews.php';
    }*/

     public static function PaintingsByStyleID($id) {
        $arr = Paintings::getPaintingsByStyleID($id);
        include_once 'view/paintings_by_style.php';
    }

    /*public static function NewsbyID($id) {
        $n = News::getNewsByID($id);
        include_once 'view/readnews.php';
    }*/

    public static function PaintingByID($id) {
        $n = Paintings::getPaintingByID($id);
        include_once 'view/viewpainting.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

    public static function InsertComment($c, $id) {
        Comments::InsertComment($c, $id);
        //self::NewsByID($id);
        header('Location:paintings?id='.$id.'#ctable');
    }
    // Список комментариев
    public static function Comments($paintingid) {
        $arr = Comments::getCommentByPaintingID($paintingid);
        ViewComments::CommentsByPainting($arr);
    }
    // количество комментариев к картине
    public static function CommentsCount($paintingid) {
        $arr = Comments::getCommentsCountByPaintingID($paintingid);
        ViewComments::CommentsCount($arr);
    }
    // Ссылка - переход к списку комментариев
    public static function CommentsCountWithAncor($paintingid) {
        $arr = Comments::getCommentsCountByPaintingID($paintingid);
        ViewComments::CommentsCountWithAncor($arr);
    }/*
    // Регистрация
    public static function registerForm() {
        include_once('view/formRegister.php');
    }
    public static function registerUser() {
        $result = Register::registerUser();
        include_once('view/answerRegister.php');
    }*/
} //end class