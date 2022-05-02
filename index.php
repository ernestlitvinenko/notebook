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

            <div class="row">
                <?php
                foreach (get_users('id', 'name', 'surname') as $person) {
                    $id = $person['id'];
                    $name = $person['name'];
                    $surname = $person['surname'];

                    echo "<a href='/person.php?id=$id'>$surname $name</a>";
                }
                ?>
            </div>
        </div>
    </section>
</main>
</body>
</html>