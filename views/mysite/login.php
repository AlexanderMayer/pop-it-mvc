<p class="title">Авторизация</p>
<h3><?= $message ?? ''; ?></h3>
<h3><?= app()->auth->user()->name ?? ''; ?></h3>

<?php if (!app()->auth::check()): ?>

   <form method="post">
       <label>Логин <input type="text" name="login"></label>
       <label>Пароль <input type="password" name="password"></label>
       <input type="submit" value="Войти">
   </form>

<?php endif;