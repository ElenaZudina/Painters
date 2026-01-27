<!DOCTYPE html>
<html>
    <head>
        <title>Painters Online</title>
            <link rel="stylesheet" href="
             https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
             /*integrity=
             "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2M2w1T"*/
             crossorigin="anonymous">
             <link rel= "stylesheet" type ="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
        <meta charset="utf-8">

    </head>
    <body>
        <nav class="one">
            <ul class="topmenu">
                <li><a href="#"><?php echo t('styles_menu'); ?><i class="fa fa-angle-down"></i></a>
                    <ul class="submenu">
                        <?php
                        Controller::AllStyle();
                        ?>
                    </ul>
                </li>
                <li><a href="testError"><?php echo t('info_menu'); ?></a></li>
                <li><a href="./"><?php echo t('homepage_menu'); ?></a></li>
                <li><a href="registerForm"><?php echo t('register_menu'); ?></a></li>
            </ul>
        </nav>
        <?php global $current_lang; ?>
        <div class="language-switcher">
            <a href="?lang=en" class="<?php echo ($current_lang == 'en') ? 'active-lang' : ''; ?>">EN</a> |
            <a href="?lang=et" class="<?php echo ($current_lang == 'et') ? 'active-lang' : ''; ?>">ET</a>
        </div>
        <section>
            <div class = 'divBox'>
                <?php
                if (isset($content)) {
                    echo $content;
                }
                else {
                    echo '<h1>Content is gone</h1>';
                }
                ?>
            </div>
        </section>
        <hr>
        <p style="display:block; text-align:center;">JKTV24 2026a. &copy</p>
    </body>
</html>