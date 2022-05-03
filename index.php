<?php require 'components/head.php'; ?>
<body>
<header class="header">
    <div class="container p-2">
        <?= menu('header__menu d-inline-flex', 'header__menu-item me-4');
        ?>
    </div>
</header>

<main>
    <section class="content">
        <div class="container">
            <h1 class="content__title"><?= get_page_title() ?></h1>
            <?php
            if ($GLOBALS['curr_mode'] == 0) {
                require 'viewer.php';
            }
            if ($GLOBALS['curr_mode'] == 4) {
                require 'person.php';
            }
            if ($GLOBALS['curr_mode'] == 1) {
                require 'edit.php';
            }
            if ($GLOBALS['curr_mode'] == 2) {
                require 'person_id.php';
                if (array_key_exists('person_id', $_GET)) {
                    require 'edit.php';
                }
            }
            if ($GLOBALS['curr_mode'] == 3) {
                require 'person_id.php';
                if (array_key_exists('person_id', $_GET)) {
                    require 'edit.php';
                }
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>