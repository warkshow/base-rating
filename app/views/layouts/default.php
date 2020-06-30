<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <?php

    //use application\core\View;

    //View::getMeta(); 

    use vendor\core\DataBase;

    ?>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles/main.css">
    <style>
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        /*================================================*/
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        .carousel {
            width: 100%;
        }

        .carousel-item>div {
            float: left;
        }

        .carousel-by-item [class*="cloneditem-"] {
            display: none;
        }
    </style>
</head>

<body class="bg-main">
    <?php
    echo "Количество запросов: " . DataBase::$countSql;
    debug(DataBase::$queries);
    ?>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Base Rating</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Доска объявлений</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/company">Компании</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Авторизация</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Вход</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#registerModal">Регистрация</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Modal Login-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginlLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма входа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Форма входа -->
                    <form method="POST" action="/">
                        <div class="form-group">
                            <label for="signInLogin">Логин</label>
                            <input type="text" class="form-control" id="signInLogin" aria-describedby="signInLoginHelp" name="username">
                            <small id="signInLoginHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="signInPassword">Password</label>
                            <input type="password" class="form-control" id="signInPassword" name="userLogin">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-success" name="submit" value="submit">Вход</button>

                        </div>
                    </form>
                    <!-- Конец Форма входа -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Login -->
    <!-- Modal Register-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Форма Регистрации -->
                    <form method="post" action="/">
                        <div class="form-group">
                            <label for="singUpLogin">Логин</label>
                            <input type="text" class="form-control" id="singUpLogin" name="userLogin">
                        </div>
                        <div class="form-group">
                            <label for="singUpPassword">Пароль</label>
                            <input type="password" class="form-control" id="singUpPassword" name="userPassword">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-success" name="submit" value="register">Зарегистрироваться</button>
                        </div>
                    </form>
                    <!-- Конец Форма регистрации -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Register -->
    <div class="container">

    </div>
    <?php echo $content; ?>

    <footer>
        <div class="container-fluid content-border-white p-0">
            <div class="container py-4">
                <div class="row">
                    <div class="col col-lg-3">
                        <p class="h2">Base Rating</p>
                    </div>
                    <div class="col col-lg-3">
                        <p class="h4">О проекте</p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">О проекте</a>
                            </li>
                            <li>
                                <a href="#">Правила и принципы</a>
                            </li>
                            <li>
                                <a href="#">Контакты</a>
                            </li>
                            <li>
                                <a href="#">Компании по категориям</a>
                            </li>
                            <li>
                                <a href="#">Компании по городам</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-lg-3">
                        <p class="h4">Еще пункты или реклама</p>
                    </div>
                    <div class="col col-lg-3">
                        <p class="h4">Термины</p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">Пользовательское соглашение</a>
                            </li>
                            <li>
                                <a href="#">Политика в отношении обработки персональных данных</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright w-100 py-4">
                <p> &copy; <?php echo date("Y"); ?> Base-rating Все права защищены.</p>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
</body>

</html>