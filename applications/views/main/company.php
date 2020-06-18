<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Компании</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Доска объявлений</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Выпадающее меню</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid pb-4">
        <form action="" method="post" class="needs-validation shadow-sm" novalidate>
            <div class="row justify-content-md-center text-center">
                <div class="content-border-white" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Поиск компании</h5>
                        <div class="form-row py-4 justify-content-md-center">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputCity" placeholder="Название компании" required>
                                <div class="valid-feedback">Ввод верен</div>
                                <div class="invalid-feedback">Введет не правильно название компании</div>
                            </div>
                            <div class="form-group col-md-3 ">
                                <select id="inputCategory" class="form-control">
                                    <optgroup label="Автомобили">
                                        <option>Автосервисы</option>
                                        <option>Автомойки</option>
                                        <option>Заправки</option>
                                    </optgroup>
                                    <optgroup label="Образовательные учереждения">
                                        <option>Проф. тех. училища</option>
                                        <option>Школы</option>
                                        <option>Институты</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select id="inputState" class="form-control">
                                    <option selected>Все</option>
                                    <option>Эстония</option>
                                    <option>Украина</option>
                                    <option>Латвия</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Поиск</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <section class="container py-4">
        <!-- Реклама -->
        <?php //echo file_get_contents("https://www.njk.ee"); 
        ?>
    </section>

    <section class="container-fluid content-border-white py-4">
        <div class="container">
            <div class="row text-center">

                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col col-lg-4 py-4">
                    <div class="card company-tile">
                        <a href="#">
                            <img src="https://otrude.net/public/images/company_img/f04a57ad2481a61fd2960ef32f78f44b.svg" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название компании</h5>
                                <p class="card-text">Какое-то небольшое описание компании хотябы для того чтобы небыло так пусто на странице</p>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="container py-4">

    </section>


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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>