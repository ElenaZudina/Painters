<?php
class controllerAdminPaintings {
    //list Paintings
    public static function PaintingsList() {
        $arr=modelAdminPaintings::getPaintingsList();
        include_once 'viewAdmin/paintingsList.php';
    }
    //--------add
    public static function paintingAddForm() {
        $styles = modelAdminStyle::getStyleList();
        $artists = modelAdminPaintings::getArtistList();
        include_once('viewAdmin/paintingAddForm.php');
    }

    public static function paintingAddResult() {
        $test = modelAdminPaintings::getPaintingAdd();
        include_once('viewAdmin/paintingAddForm.php');
    }/*
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
