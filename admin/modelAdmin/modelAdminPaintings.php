<?php
class modelAdminPaintings {
    public static function getPaintingsList() {
        $query = "SELECT paintings.id, paintings.description_en, paintings.description_et, paintings.year_created, paintings.picture, paintings.artist_id, paintings.style_id, paintings.user_id, paintings.title_en, paintings.title_et, styles.name AS style_name, artists.name AS artist_name from paintings,
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
            if(isset($_POST['title_en']) && isset($_POST['title_et']) && isset($_POST['description_en']) && isset($_POST['description_et']) && isset($_POST['year']) && isset($_POST['idArtist']) && isset($_POST['idStyle']) ) {
                $title_en=$_POST['title_en'];
                $title_et=$_POST['title_et'];
                $description_en=$_POST['description_en'];
                $description_et=$_POST['description_et'];
                $year = intval(trim($_POST['year']));
                $idArtist=$_POST['idArtist'];
                $idStyle=$_POST['idStyle'];
                //---------images type blob
                $image = null; // Initialize image data to null
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK && !empty($_FILES['picture']['tmp_name'])) {
                    $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                } else {
                    // No image uploaded or an error occurred.
                    // We need to signal this error to the user.
                    // For now, let's just set $test to false indicating failure
                    // and rely on the view to show the generic error.
                    // A more sophisticated solution would pass a specific error message.
                    return false; // Prevent insertion if no valid image is provided
                }
                //----------------------------
                $sql="INSERT INTO `paintings` (`id`, `title_en`, `title_et`, `description_en`, `description_et`, `year_created`, `picture`, `artist_id`, `style_id`, `user_id`) VALUES (NULL, '$title_en', '$title_et', '$description_en', '$description_et', '$year', '$image', '$idArtist', '$idStyle', '1')";
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
        $query = "SELECT paintings.id, paintings.title_en, paintings.title_et, paintings.description_en, paintings.description_et, paintings.year_created, paintings.picture, paintings.artist_id, paintings.style_id, paintings.user_id, styles.name AS style_name, artists.name AS artist_name, users.username from paintings, styles, artists, users
        WHERE paintings.style_id=styles.id AND paintings.artist_id=artists.id AND paintings.user_id=users.id and paintings.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
    //----------------news edit
    public static function getPaintingEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title_en']) && isset($_POST['title_et']) && isset($_POST['description_en']) && isset($_POST['description_et']) && isset($_POST['year']) && isset($_POST['idArtist']) && isset($_POST['idStyle'])) {
                $title_en = $_POST['title_en'];
                $title_et = $_POST['title_et'];
                $description_en = $_POST['description_en'];
                $description_et = $_POST['description_et'];
                $year = $_POST['year'];
                $idArtist = $_POST['idArtist'];
                $idStyle = $_POST['idStyle'];
                //---------------image type blob
                $image=$_FILES['picture']['name'];
                if($image!="") {
                    $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                    //---------------------images type text
                    //$uploaddir = '../images/';
                    //$uploadfiles = $uploaddir . basename($_FILES['picture']['tmp_name']);
                    //copy($_FILES['picture']['tmp_name'], $uploadfile);
                }
                //----------
                if($image==""){
                    $sql="UPDATE `paintings` SET `title_en` = '$title_en', `title_et` = '$title_et', `description_en` = '$description_en', `description_et` = '$description_et', `artist_id` = '$idArtist',  `year_created` = '$year', `style_id` = '$idStyle' 
                    WHERE `paintings`.`id` = ".$id;
                    } else {
                        $sql="UPDATE `paintings` SET `title_en` = '$title_en', `title_et` = '$title_et', `description_en` = '$description_en', `description_et` = '$description_et', `year_created` = '$year', `artist_id` = '$idArtist', `picture` = '$image',`style_id` = '$idStyle' 
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