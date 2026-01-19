<?php
class controllerAdminPaintings {
    //list Paintings
    public static function PaintingsList() {
        $arr=modelAdminPaintings::getPaintingsList();
        include_once 'viewAdmin/paintingsList.php';
    }/*
    //--------add
    public static function newsAddForm() {
        $arr = modelAdminCategory::getCategoryList();
        include_once('viewAdmin/newsAddForm.php');
    }

    public static function newsAddResult() {
        $test = modelAdminNews::getNewsAdd();
        include_once('viewAdmin/newsAddForm.php');
    }
    //------------edit
    public static function newsEditForm($id) {
        $arr = modelAdminCategory::getCategorylist();
        $detail = modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsEditform.php');
    }
    public static function newsEditResult($id) {
        $test = modelAdminNews::getNewsEdit($id);
        include_once('viewAdmin/newsEditForm.php');
    }
    //-------delete
    public static function newsDeleteForm($id) {
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }
    public static function newsDeleteResult($id) {
        $test = modelAdminNews::getNewsDelete($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }*/
}
