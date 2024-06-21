<?php if (app()->auth::check()): ?>


<?php else: app()->route->redirect('/login');
endif;