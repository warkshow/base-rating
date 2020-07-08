<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <?php

    use warks\core\base\View;
    use warks\core\DataBase;

    View::getMeta();


    ?>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles/main.css">
</head>

<body class="bg-main">
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
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Профиль</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Личный кабинет</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#registerModal">Выйти</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid p-0" data-spy='scroll' data-offset='50'>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center"><?= "Количество запросов: " . DataBase::$countSql; ?></h5>
                <p class="card-text"><?= debug(DataBase::$queries); ?></p>
            </div>
            <div class="card-footer text-muted">
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <?php echo $user['username'] . "<br>"; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
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