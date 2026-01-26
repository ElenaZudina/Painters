<?php
ob_start();
?>

<div class="container" style="min-height:400px;">
    <div class="col-mid-11">
        <h2>Painting Add</h2>
        <?php
        if(isset($test)) {
            if($test==true)
            {
                ?>
                <div class="alert alert-ifo">
                    <strong>Record added successfully. </strong><a href="paintingsAdmin">Go to painting list</a>
                </div>
                <?php
            }
            else if($test==false)
            {
                ?>
                <div class="alert alert-warning">
                    <strong>Error adding record! </strong><a href="paitingsAdmin">Go to painting list</a>
                </div>
                <?php
            }
        }
        else {
            ?>
            <form method='POST' action="paintingAddResult" enctype="multipart/form-data">
                <table class='table table-bordered'>
                    <tr>
                        <td>Paiting title</td>
                        <td><input type='text' name='title' class='form-control' required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea rows="5" name="description" class="form-control" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td><textarea rows="5" name="year" class="form-control" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Style</td>
                        <td>
                            <select name="idStyle" class="form-control">
                                <?php
                                foreach($styles as $row) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Artist</td>
                        <td>
                            <select name="idArtist" class="form-control">
                                <?php
                                foreach($artists as $row) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <!-- image-->
                     <tr>
                        <td>Picture</td>
                        <td>
                            <div>
                                <input type=file name="picture" style="color:black;">
                            </div>
                        </td>
                     </tr>
                     <!-- end image-->

                     <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="save">
                        <span class="glyphicon glyphicon-plus"></span> Save
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

