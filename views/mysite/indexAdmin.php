<p class="title">Добавить нового сотрудника</p>
<?php
if (app()->auth::check()):
    ?>
    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form method="POST">
            <p>Имя <input type="text" name="name"></p>
            <p>Фамилия <input type="text" name="lastname"></p>
            <p>Отчество <input type="text" name="surname"></p>
            <p>Логин <input type="text" name="login"></p>
            <p>Пароль <input type="password" name="password"></p>
            <input type="submit" value="Добавить">
        </form>
    </div>

<?php else:  app()->route->redirect('/login');
endif;