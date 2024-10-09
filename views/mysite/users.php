<?php if (app()->auth::check()): ?>

    <div>
        <form action="" method="POST">
            <select name="department_id">
                <?php foreach ($departments as $el): ?>
                    <option value="<?= $el->department_id; ?>"><?= $el->name?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Посмотреть">
        </form>
    </div>
    <p class="count">Количество сотрудников: <?= $employees_count ?></p>

<?php else: app()->route->redirect('/login');
endif;