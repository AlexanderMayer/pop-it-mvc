<?php if (app()->auth::check()):?>

    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form action="" method="POST">
            <p>Выберите абонента</p><select name="employees">
                <?php foreach ($employees as $el): ?>
                    <option value="<?= $el->user_id; ?>"><?= $el->name . ' ' . $el->lastname . ' ' . $el->surname; ?></option>
                <?php endforeach; ?>
            </select>
            <p>Выберите телефон</p><select name="phone">
                <?php foreach ($phones as $el): ?>
                    <option value="<?= $el->phone_id; ?>"><?= $el->number; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>

<?php else:  app()->route->redirect('/login');
endif;