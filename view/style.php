<?php
echo "<li class='submenuunit'><a href='all'>ALL</a></li><br>";
foreach($arr as $value) {
    echo "<li calss='submenuunit'>
    <a href='style?id=".$value['id']."'>".$value['name'].'</a></li><br>';
}

?>