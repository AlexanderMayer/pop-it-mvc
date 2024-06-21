<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <link rel="stylesheet" href="public/style/style.css" type="text/css">
</head>
<body>

<header>
    <a class="header_a" href="<?= app()->route->getUrl('/index') ?>">Главная</a>
    <?php if (!app()->auth::check()): ?>
        <a class="header_a"  href="<?= app()->route->getUrl('/login') ?>">Вход</a>
    <?php else: ?>
        <a class="header_a"  href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
    <?php endif; ?>

</header>
<div class="content">
    <nav>
        <?php if (app()->auth::checkRoleSisAdmin()): ?>
            <div class="nav">
                <a href="<?= app()->route->getUrl('/addNewUser') ?>"><p class="menu">Добавить абонента</p></a>
                <a href="<?= app()->route->getUrl('/addNewRoom') ?>"><p class="menu">Добавить помещение</p></a>
                <a href="<?= app()->route->getUrl('/addNewDepartment') ?>"><p class="menu">Добавить подразделение</p></a>
                <a href="<?= app()->route->getUrl('/addNewPhone') ?>"><p class="menu">Добавить телефон</p></a>
                <a href="<?= app()->route->getUrl('/addUserPhone') ?>"><p class="menu">Привязать телефон к абоненту</p></a>
                <a href="<?= app()->route->getUrl('/userPhones') ?>"><p class="menu">Посмотреть все номера абонента</p></a>
                <a href="<?= app()->route->getUrl('/users') ?>"><p class="menu">Посмотреть количество абонентов в подразделении</p></a>
                <a href="<?= app()->route->getUrl('/departmentPhone') ?>"><p class="menu">Выбрать номера абонента по подразделению</p></a>
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <?= $content ?? '' ?>
    </main>
</div>
</body>
</html>