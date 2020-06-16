<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Title</title>
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
                <a class="navbar-brand" href="#">Base Rating</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
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

    <div class="container py-5">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Пишите отзывы о компании</h5>
                    <p class="card-text">Поделитесь своими впечатлениями о компании, в которой работаете или работали</p>
                </div>
            </div>
            <div class="col col-lg-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Читайте отзывы сотрудников</h5>
                    <p class="card-text">Узнайте, что говорят реальные сотрудники об условиях работы в компаниях</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="content-border-white py-5">
            <div class="container">
                <h5 class="card-title">Популярные компании</h5>
                <div class="row m-0 justify-content-center">
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-4">
        Реклама
    </div>

    <div class="container-fluid p-0 py-5">
        <div class="content-border-white py-5">
            <div class="container">
                <h5 class="card-title">Новые компании</h5>
                <div class="card-body row justify-content-center">
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile py-2">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile py-2">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile py-2">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile py-2">
                            <img src="https://otrude.net/public/images/company_img/deecf50b764912539e2823c3b14c4652.png" class="img-fluid p-4" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Название компании, Категория
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </>
            </div>
        </div>


        <div class="container py-5">
            <div class="row">
                <div class="col col-lg-6">
                    <p class="h2">Отзывы о работе и работодателях</p>
                    <p>К поиску работы каждый человек подходит с полной ответственностью, возлагая на нового работодателя большие надежды, в том числе и материальные.</p>
                    <p>Имея диплом об образовании и оперируя внушительным стажем на аналогичной или схожей должности, всем хочется устроиться на достойное место с приличным окладом.</p>
                    <p>Среди аргументированно выдвигаемых требований, соответствующих уровню профессиональной подготовки кадра, их интересует оптимальный соцпакет, комфортные условия труда, приятный коллектив, возможность карьерного роста, соблюдение норм трудового кодекса и, конечно же, достойная зарплата.</p>
                    <p>Хорошие отзывы о работе сразу же привлекают внимание соискателя. Слишком положительная информация часто воспринимается с недоверием, особенно, когда на предприятии постоянная текучка кадров и открыто несколько престижных вакансий. Не подвох ли?</p>
                </div>
                <div class="col col-lg-6 d-none d-lg-block">
                    <img src="https://otrude.net/public/img/mainpage_img_1.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row">

                <div class="col col-lg-6">
                    Реклама
                </div>
                <div class="col col-lg-6">
                    <p class="h2">Необходимость отзывов о работе</p>
                    <p>Объективные отзывы о работодателях помогают соискателю составить собирательный портрет о компании, в которой ему придется трудиться.</p>
                    <p>Как правило, не все руководители, принимающие на работу сотрудника, сразу раскрывают перед ним свои карты. Нередко за красивой картинкой корпоративного «Эльдорадо» кроется масса факторов, искажающих идеальный образ «работы мечты».</p>
                    <p>К сожалению, зачастую правда открывается уже после того, как человек оформил трудовую книжку. Оказывается, что уровень заработка далек от обещанного, трудиться приходится сверхурочно и без дополнительной оплаты, вызывают вопросы другие условия труда, отсутствие элементарных норм санитарии.</p>
                    <p>Маска доброго отзывчивого начальника постепенно сменяется на лицо сурового руководителя, не упускающего возможности «наказать рублем», даже там, где вина подчиненного явно отсутствует. Жаль, что об этом не было сказано на собеседовании.</p>
                    <p>Прочитав отзывы о работе, соискатель вооружается важной, объективной информацией, помогающей ему принять правильное решение — устраиваться на работу или найти другую вакансию.</p>
                    <p>Ознакомиться заранее с отзывами сотрудников о работодателях никогда не лишне. Кроме откликов, подтверждающих негативные стороны работы в той или иной фирме, довольно распространены и положительные характеристики, благодаря которым рушатся сомнения: да, это компания, в которой я хочу работать!</p>
                </div>
            </div>
            <div class="row">

                <div class="col col-lg-6">
                    <p class="h2">Отзывы о работодателях — черный список компаний</p>
                    <p>Интернет-портал «О труде» разработан для тех, кто находится на стадии поиска работы и желает обойти возможные «подводные камни», чтобы не угодить в заранее подготовленные нечестным работодателем ловушки.</p>
                    <p>Сайт также актуален для сотрудников, желающих оставить отзывы о работе в компании, чтобы на личном опыте помочь другим или, наоборот, развеять тень сомнений, аргументированно подчеркнув достоинства предприятия, на котором он трудится.</p>
                    <p>На ресурсе собраны личные истории действующих и бывших сотрудников компаний России. Достаточно ввести в поисковик страну, город, название фирмы — и перед вами откроется информация о корпоративном климате того или иного предприятия с указанием должностей, фамилий, фактов нарушения закона.</p>
                    <p>Данные на ресурсе постоянно дополняются. Вы также можете внести свою лепту в черный список работодателей и компаний или же помочь нам составить рейтинг фирм, достойных подражанию, предлагающих идеальные условия для труда и карьерного роста.</p>
                    <p>Оставляя свои отзывы о работе, руководствуйтесь объективностью: стремления «свести счеты» с бывшим боссом или, наоборот, обелить явно проигрышную вакансию, будут раскрыты.</p>
                </div>
                <div class="col col-lg-6">
                    Реклама
                </div>
            </div>
        </div>
    </div>


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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>