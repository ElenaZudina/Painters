<?php
class modelAdminPaintings {
    public static function getPaintingsList() {
        $query = "SELECT paintings.*, styles.name AS style_name, artists.name AS artist_name from paintings,
        styles, artists WHERE paintings.style_id=styles.id AND
        paintings.artist_id=artists.id ORDER BY `paintings`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
    
    public static function getArtistList() {
        $query = "SELECT id, name FROM artists ORDER BY name ASC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    //----------------------------- Add
    public static function getPaintingAdd() {
        $test=false;
        if(isset ($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['year']) && isset($_POST['idArtist']) && isset($_POST['idStyle']) ) {
                $title=$_POST['title'];
                $description=$_POST['description'];
                $year = intval(trim($_POST['year']));
                $idArtist=$_POST['idArtist'];
                $idStyle=$_POST['idStyle'];
                //---------images type blob
                $image=addslashes (file_get_contents($_FILES['picture']['tmp_name']));
                //----------------------------
                $sql="INSERT INTO `paintings` (`id`, `title`, `description`, `year_created`, `picture`, `artist_id`, `style_id`, `date`, `user_id`) VALUES (NULL, '$title', '$description', '$year', '$image', '$idArtist', '$idStyle', CURRENT_TIMESTAMP, '1')";
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item==true) {
                    $test=true;
                }
            }
        }
        return $test;
    }

    //--------------painting detail id
    public static function getPaintingDetail($id) {
        $query = "SELECT paintings.*, styles.name, artists.name, users.username from paintings, styles, artists, users
        WHERE paintings.style_id=styles.id AND paintings.artist_id=artists.id AND paintings.user_id=users.id and paintings.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
    //----------------news edit
    public static function getPaintingEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['year']) && isset($_POST['idArtist']) && isset($_POST['idStyle'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $year = $_POST['year'];
                $idArtist = $_POST['idArtist'];
                $idStyle = $_POST['idStyle'];
                //---------------image type blob
                $image=$_FILES['picture']['name'];
                if($image!="") {
                    $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                    //---------------------images type text
                    //$uploaddir = '../images/';
                    //$uploadfiles = $uploaddir . basename($_FILES['picture']['name']);
                    //copy($_FILES['picture']['tmp_name'], $uploadfile);
                }
                //----------
                if($image==""){
                    $sql="UPDATE `paintings` SET `title` = '$title', `description` = '$description', `artist_id` = '$idArtist',  `year_created` = '$year', `style_id` = '$idStyle' 
                    WHERE `paintings`.`id` = ".$id;
                    } else {
                        $sql="UPDATE `paintings` SET `title` = '$title', `description` = '$description', `year_created` = '$year', `artist_id` = '$idArtist', `picture` = '$image',`style_id` = '$idStyle' 
                    WHERE `paintings`.`id` = ".$id;
                    }
                    $db = new Database();
                    $item = $db->executeRun($sql);
                    if($item == true) {
                        $test = true;
                    }
                }
            }
            return $test;
        }
        //----------------painting delete
        public static function getPaintingDelete($id) {
            $test=false;
            if(isset($_POST['save'])) {
                $sql="DELETE FROM `paintings` WHERE `paintings`.`id` = ".$id;
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item==true) {
                    $test=true;
                }
            }
            return $test;
        }

    
        }