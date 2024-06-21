<h2>Главная</h2>

<h3>Здравтвуйте <?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (app()->auth::check()):
   ?>
   <div>
       <form method="POST">
           <p>Имя <input type="text" name="name"></p>
           <p>Фамилия <input type="text" name="lastname"></p>
           <p>Отчество <input type="text" name="surname"></p>
           <p>Логин <input type="text" name="login"></p>
           <p>Пароль <input type="password" name="password"></p>
           <input type="submit" value="Добавить">
       </form>
   </div>

<?php else:  app()->route->redirect('/login');
endif;