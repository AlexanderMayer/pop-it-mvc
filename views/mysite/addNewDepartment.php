<?php if (app()->auth::check()): ?>
    <h3><?= $message ?? ''; ?></h3>
    <div>
        <form action="" method="POST" class="form">
            <p>Имя подразделения <input type="text" name="name"></p>
            <p>Тип подразделения <input type="text" name="type"></p>
            <input type="submit" value="Добавить">
        </form>
    </div>
<?php else: app()->route->redirect('/login');
endif;