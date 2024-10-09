
    <div>
        <form action="" method="POST">
            <p>Имя <input type="text" name="name"></p>
            <p>Фамилия <input type="text" name="lastname"></p>
            <p>Отчество <input type="text" name="surname"></p>
            <p>Дата рождения <input type="date" name="birthday"></p>
            <select name="room_id">
                <?php foreach ($rooms as $el): ?>
                    <option value="<?= $el->room_id; ?>"><?= $el->number ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>
