<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">ERP система</h5>
  <nav class="my-2 my-md-0 mr-md-3">
  <!--  <a class="p-2 text-dark" href="/">Главная</a>-->
  </nav>
  <?php
    switch($_COOKIE['log']){
    case 'egor':  ?>
    <a class="btn btn btn btn-outline-danger mr-2 mb-2" href="/users/view.php">Админ панель</a>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Кабинет пользователя</a>
    <a class="btn btn-outline-primary mb-2 mr-2" href="/accouting/view.php">Учет спецодежды</a>
    <a class="btn btn-outline-primary mb-2 mr-2" href="/tab.php">Табель</a>
    <a class="btn btn-outline-primary mb-2 mr-2" href="/staff.php">Сотрудники</a>
    <a class="btn btn-outline-primary mb-2 mr-2" href="/load.php">Загрузить документ</a>
    <?php
      break;
      case 'user':
    ?>


  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Кабинет пользователя</a>
  <a class="btn btn-outline-primary mb-2 mr-2" href="/roba.php">Учет спецодежды</a>
  <a class="btn btn-outline-primary mb-2 mr-2" href="/tab.php">Табель</a>
  <a class="btn btn-outline-primary mb-2 mr-2" href="/load.php">Загрузить документ</a>
  <?php
    break;
    default :
  ?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Войти</a>
  <?php
    break;
  }
  ?>
</div>
