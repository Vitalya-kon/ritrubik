<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/sysLogin.php";

?>
<!DOCTYPE html>
<html lang="ru">
  <?php include_once "$path/private/head.php";?>
  <body>
    <div class="wrapper__autorization">
    <div class="background__entry"></div>
      <div class="_container">
        <?php include_once "$path/private/header.php";?>
        <main class="startPage">
          <div class="entry-window__inner">
            <div class="entry-window__item">
              <div class="entry-window__title">Вход</div>
                <span class="entry-window__err"><?php echo $errLogin ?? ''?></span>
              <div class="entry-window__form">
                <form action="" method="post" class="formSignup">
                  <span id="loginPlaceholder" hidden></span>
                  <input class="entry__login" type="text" name="login" id="login" placeholder="ЛОГИН" />
                  <input class="entry__password" type="password" name="password" id="password" placeholder="ПАРОЛЬ" />
                  <span id="memmorySpan"> <input type="checkbox" name="memory" id="memory"> <label for="memory">Запомнить меня </label></span>
                  <svg class="svg_autoriz" xmlns="http://www.w3.org/2000/svg" version="1.1">
                      <defs>
                          <filter id="gooey">
                              <!-- in="sourceGraphic" -->
                              <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                              <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="highContrastGraphic" />
                              <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop" />
                          </filter>
                      </defs>
                  </svg>

                  <button id="gooey-button" name="send">
                      Войти
                      <span class="bubbles">
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                          <span class="bubble"></span>
                      </span>
                  </button>
                  <div class="isThereAnAccount" style="text-align: center;margin-top: 30px">
                      <span>Нет аккаунта?</span><br>
                      <a href="/signup">Зарегистрироваться</a>
                  </div>
                </form>   
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script> 
    </script>
  </body>
</html>