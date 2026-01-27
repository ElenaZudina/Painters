<?php
ob_start();
?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Painting Edit</h2>
        <?php
        if(isset($test)) {
            if($test==true)
            {
                ?>
                <div class="alert alert-info">
                    <strong>Record added successfully.</strong><a href="paintingsAdmin"> Go to painting list</a>
                </div>
                <?php
            }
            else if($test==false)
            {
                ?>
                <div class="alert alert-warning">
                    <strong>Error editing record! </strong><a href="paintingsAdmin"> Go to painting list</a>
                </div>
                <?php
            }
        }
        else {
            ?>
            <form method='POST' action="paintingEditResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <table class='table table-bordered'>
                    <tr>
                        <td>Painting title</td>
                        <td><input type='text' name='title' class='form-control' required value=<?php echo $detail['title']; ?>> </td>
                    </tr>
                    <tr>
                        <td>Painting description</td>
                        <td><textarea rows="5" name="description" class='form-control' required ><?php echo $detail['description']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td><input type="number" name="year" class="form-control" required value="<?php echo $detail['year_created']; ?>" min="1901" max="2155"> </td>
                    </tr>
                     <tr>
                        <td>Artist</td>
                        <td>
                            <select name="idArtist" class="form-control" >
                                <?php
                                foreach($artists as $row) {
                                    echo '<option value="'.$row['id'].'"';
                                    if($row['id']==$detail['artist_id']) echo 'selected';
                                    echo '>'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Style</td>
                        <td>
                            <select name="idStyle" class="form-control" >
                                <?php
                                foreach($styles as $row) {
                                    echo '<option value="'.$row['id'].'"';
                                    if($row['id']==$detail['style_id']) echo 'selected';
                                    echo '>'.$row['name'].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!-- image-->
                     <tr>
                        <td>OldPicture</td>
                        <td><div>
                            <!--<img src="../image/<?php //echo $detail['picture']; ?>" width=150>-->
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $detail['picture'] ).'" width=150 />';?>
                        </div></td>
                     </tr>
                     <tr>
                        <td>Picture</td>
                        <td><div>
                            <input type=file name="picture" style="color:black;">
                        </div></td>
                     </tr>
                     <!-- end image-->
                      <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="save">
                                <span class="glyphicon glyphicon-plus"></span> Change
                            </button>
                            <a href="paintingsAdmin" class="btn btn-large btn-success">
                                <i class="glyphicon glyphicon-backward"></i> &nbsp;Back to list
                            </a>
                        </td>
                      </tr>
                </table>
                            </form>
                            <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>