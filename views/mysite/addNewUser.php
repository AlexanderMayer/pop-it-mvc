<?php if (app()->auth::check()): ?>
    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form action="" method="POST">
            <p>Имя <input type="text" name="name"></p>
            <p>Фамилия <input type="text" name="lastname"></p>
            <p>Отчество <input type="text" name="surname"></p>
            <p>Дата рождения <input type="date" name="birthday"></p>
            <p>Выберите подразделение</p><select name="department">
                <?php foreach ($departments as $el): ?>
                    <option value="<?= $el->department_id; ?>"><?= $el->name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>
<?php else:  app()->route->redirect('/login');
endif;