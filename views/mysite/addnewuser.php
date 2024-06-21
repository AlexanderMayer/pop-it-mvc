<h2>Главная</h2>

<h3>Здравтвуйте <?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (app()->auth::check()):
   ?>
   <div>
        <p>Добавить абонента</p>
        <p>Добавить помещение</p>
        <p>Добавить подразделение</p>
        <p>Добавить телефон</p>
        <p>Привязать телефон к абоненту</p>
        <p>Посмотреть все номера абонента</p>
        <p>Посмотреть количество абонентов</p>
        <p>Выбрать номера по подразделению</p>
    </div>
    <div>
        <form action="" method="POST">
            <p>Имя <input type="text" name="name"></p>
            <p>Фамилия <input type="text" name="lastname"></p>
            <p>Отчество <input type="text" name="surname"></p>
            <p>Дата рождения <input type="data" name="birthday"></p>
            <select name="department">

            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>
<?php else:  app()->route->redirect('/login');
endif;