<?php
ob_start();
?>

<h2>Paintings List</h2>

<div class="container" style="min-height:400px;">
    <div style="margin:20px;">
        <a class="btn btn-primary" href="paintingAdd" role="button">Add painting</a>
    </div>
    <div class="col-md-11">
        <table class='table table-bordered table-responsive'>
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Header Painting</th>
                <th width="20%"></th>
            </tr>
            <?php
            foreach($arr as $row) {
                $currentLang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
                
                $titleKey = 'title_' . $currentLang;
                $displayTitle = isset($row[$titleKey]) ? $row[$titleKey] : (isset($row['title_en']) ? $row['title_en'] : 'No Title');

                $descriptionKey = 'description_' . $currentLang;
                $displayDescription = isset($row[$descriptionKey]) ? $row[$descriptionKey] : (isset($row['description_en']) ? $row['description_en'] : 'No Description');
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <b>Title:</b> <?php echo $displayTitle; ?><br>
                        <b>Description:</b> <?php echo $displayDescription; ?><br>
                        <b>Стиль: </b><i><?php echo $row['style_name']; ?></i><br>
                        <b>Художник: </b><i><?php echo $row['artist_name']; ?></i>
                    </td>
                    <td>
                        <a href="paintingEdit?id=<?php echo $row['id']; ?>">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="paintingDel?id=<?php echo $row['id']; ?>">Delete <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php"; ?>