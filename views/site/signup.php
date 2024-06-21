<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <label>Имя <input type="text" name="name"></label>
   <label>Логин <input type="text" name="login"></label>
   <label>Пароль <input type="password" name="password"></label>
   <label>Фамилия <input type="text" name="lastname"></label>
   <label>Отчество <input type="text" name="surname"></label>
   <button>Зарегистрироваться</button>
</form>
