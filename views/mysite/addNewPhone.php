<?php if (app()->auth::check()): ?>

    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form action="" method="POST">
            <p>Введите номер телефона <input type="tel" name="number"></p>
            <p>Выберите комнату</p><select name="room">
                <?php foreach ($rooms as $el): ?>
                    <option value="<?= $el->room_id; ?>"><?= $el->number; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>

<?php else: app()->route->redirect('/login');
endif;