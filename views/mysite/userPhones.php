<?php if (app()->auth::check()):?>

    <div>
        <form action="" method="POST">
            <p>Выберите абонента</p><select name="employees">
                <?php foreach ($employees as $el): ?>
                    <option value="<?= $el->user_id; ?>"><?= $el->name . ' ' . $el->lastname . ' ' . $el->surname; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Посмотреть">
        </form>
    </div>
    <?php if ($phones): foreach ($phones as $el): ?>
        <div>
        <p><?= $el; ?></p>
    </div>
    <?php endforeach; endif;?>

<?php else:  app()->route->redirect('/login');
endif;