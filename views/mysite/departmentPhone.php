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
        <form action="" method="POST">
            <select name="department">
                <?php foreach ($departments as $el): ?>
                    <option value="<?= $el->department_id; ?>"><?= $el->name ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Выбрать абонента">
        </form>
    </div>
    <div>
        <p>Номера:</p>
    </div>
    <?php foreach ($phones as $el) ?>
        <div>
        <p><?= $el->number; ?></p>
    </div>
    <?php ?>

<?php else: app()->route->redirect('/login');
endif;