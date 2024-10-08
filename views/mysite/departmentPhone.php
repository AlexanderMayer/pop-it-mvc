<?php if (app()->auth::check()): ?>

    <div>
        <form action="" method="POST">
            <select name="department">
                <?php foreach ($departments as $el): ?>
                    <option value="<?= $el->department_id; ?>"><?= $el->name ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Выбрать подразделение">
        </form>
    </div>
    <div>
        <form action="" method="GET">
            <select name="employee">
                <?php foreach ($employees as $el): ?>
                    <option value="<?= $el->user_id; ?>"><?= $el->name . ' ' . $el->lastname . ' ' . $el->surname; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Выбрать абонента">
        </form>
    </div>
    <div>
        <p>Номера:</p>
    </div>
        <?php foreach ($phones as $el): ?>
            <div>
                <p><?= $el; ?></p>
            </div>
        <?php endforeach; ?>

<?php else: app()->route->redirect('/login');
endif;