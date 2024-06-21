<?php if (app()->auth::check()): ?>
    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form action="" method="POST">
            <p>Введите номер комнаты <input type="number" name="number"></p>
            <p>Введите тип комнаты <input type="text" name="type"></p>
            <p>Выберите подразделение</p><select name="department">
                <?php foreach ($departments as $el): ?>
                    <option value="<?= $el->department_id; ?>"><?= $el->name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>
<?php else: app()->route->redirect('/login');
endif;