<div class="container-fluid pb-4">
    <form action="/company/search" method="POST" class="needs-validation shadow-sm" novalidate>
        <div class="row justify-content-md-center text-center">
            <div class="content-border-white" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Поиск компании</h5>
                    <div class="form-row py-4 justify-content-md-center">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputCity" placeholder="Название компании"
                                   name="companyName"
                                   required>
                            <div class="valid-feedback">Ввод верен</div>
                            <div class="invalid-feedback">Поле с названием компании не может быть пустым</div>
                        </div>
                        <div class="form-group col-md-3 ">
                            <select id="inputCategory" class="form-control" name="companyCategory">
                                <option selected='selected' class='op-def' value="all">Все</option>
                                <?php
                                if (isset($categories) && isset($sub_categories)):
                                    if (isset($code_lang)) {
                                        $category_name = "category_name_$code_lang";
                                        $sub_category_name = "sub_$category_name";
                                    }
                                    foreach ($categories as $category): ?>
                                        <optgroup label="<?= $category->$category_name; ?>">
                                            <?php foreach ($sub_categories as $sub_category): ?>
                                                <?php if ($sub_category->id == $category->id): ?>
                                                    <option value="<?= $sub_category->sub_alias; ?>"><?=
                                                        $sub_category->$sub_category_name; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select id="inputState" class="form-control" name="companyCountry">
                                <option selected='selected' disabled="" value="all">Все</option>
                                <?php if (isset($countries)): ?>
                                    <?php $country_name = "title_$code_lang";
                                    foreach ($countries as $country): ?>
                                        <option value="<?= $country->id; ?>"><?= $country->$country_name;
                                            ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="search">Поиск</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<section class="container py-5">
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
</section>

<section class="container-fluid p-0">
    <div class="content-border-white py-5">
        <div class="container">
            <?php if (isset($popular_company)): ?>
            <h5 class="card-title">Популярные компании</h5>
            <div class="row m-0 justify-content-center">
                <?php foreach ($popular_company as $company): ?>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <a href="#">
                                <img src="<?php
                                if ($company->img != null) echo "{$company->img}";
                                else echo "/images//noimg.jpg"; ?>"
                                     class="img-fluid p-4" alt="...">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?= $company->company_name; ?>
                                        <?php $category = R::findOne('rating_sub_category', "id = :category_id",
                                                                     [":category_id" => $company->category_id]);
                                        $category_name = "sub_category_name_$code_lang";
                                        echo ", {$category->$category_name}"; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>


<div class="container py-4">
    Реклама
</div>

<section class="container-fluid p-0 py-5">
    <div class="content-border-white py-5">
        <div class="container">
            <?php if (isset($new_company)): ?>
            <h5 class="card-title">Новые компании</h5>
            <div class="row m-0 justify-content-center">
                <?php foreach ($new_company as $company): ?>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile">
                            <a href="#">
                                <img src="<?php
                                if ($company->img != null) echo "{$company->img}";
                                else echo "/images//noimg.jpg"; ?>"
                                     class="img-fluid p-4" alt="...">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?= $company->company_name; ?>
                                        <?php $category = R::findOne('rating_sub_category', "id = :category_id",
                                                                     [":category_id" => $company->category_id]);
                                        $category_name = "sub_category_name_$code_lang";
                                        echo ", {$category->$category_name}"; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>
<section class="container py-5">
    <div class="row">
        <div class="col col-lg-6">
            <h2>Отзывы о работе и работодателях</h2>
            <p>К поиску работы каждый человек подходит с полной ответственностью, возлагая на нового
                работодателя большие надежды, в том числе и материальные.</p>
            <p>Имея диплом об образовании и оперируя внушительным стажем на аналогичной или схожей должности,
                всем хочется устроиться на достойное место с приличным окладом.</p>
            <p>Среди аргументированно выдвигаемых требований, соответствующих уровню профессиональной подготовки
                кадра, их интересует оптимальный соцпакет, комфортные условия труда, приятный коллектив,
                возможность карьерного роста, соблюдение норм трудового кодекса и, конечно же, достойная
                зарплата.</p>
            <p>Хорошие отзывы о работе сразу же привлекают внимание соискателя. Слишком положительная информация
                часто воспринимается с недоверием, особенно, когда на предприятии постоянная текучка кадров и
                открыто несколько престижных вакансий. Не подвох ли?</p>
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
            <h2>Необходимость отзывов о работе</h2>
            <p>Объективные отзывы о работодателях помогают соискателю составить собирательный портрет о
                компании, в которой ему придется трудиться.</p>
            <p>Как правило, не все руководители, принимающие на работу сотрудника, сразу раскрывают перед ним
                свои карты. Нередко за красивой картинкой корпоративного «Эльдорадо» кроется масса факторов,
                искажающих идеальный образ «работы мечты».</p>
            <p>К сожалению, зачастую правда открывается уже после того, как человек оформил трудовую книжку.
                Оказывается, что уровень заработка далек от обещанного, трудиться приходится сверхурочно и без
                дополнительной оплаты, вызывают вопросы другие условия труда, отсутствие элементарных норм
                санитарии.</p>
            <p>Маска доброго отзывчивого начальника постепенно сменяется на лицо сурового руководителя, не
                упускающего возможности «наказать рублем», даже там, где вина подчиненного явно отсутствует.
                Жаль, что об этом не было сказано на собеседовании.</p>
            <p>Прочитав отзывы о работе, соискатель вооружается важной, объективной информацией, помогающей ему
                принять правильное решение — устраиваться на работу или найти другую вакансию.</p>
            <p>Ознакомиться заранее с отзывами сотрудников о работодателях никогда не лишне. Кроме откликов,
                подтверждающих негативные стороны работы в той или иной фирме, довольно распространены и
                положительные характеристики, благодаря которым рушатся сомнения: да, это компания, в которой я
                хочу работать!</p>
        </div>
    </div>
    <div class="row">

        <div class="col col-lg-6">
            <h2>Отзывы о работодателях — черный список компаний</h2>
            <p>Интернет-портал «О труде» разработан для тех, кто находится на стадии поиска работы и желает
                обойти возможные «подводные камни», чтобы не угодить в заранее подготовленные нечестным
                работодателем
                ловушки.</p>
            <p>Сайт также актуален для сотрудников, желающих оставить отзывы о работе в компании, чтобы на
                личном опыте помочь другим или, наоборот, развеять тень сомнений, аргументированно подчеркнув
                достоинства предприятия, на котором он трудится.</p>
            <p>На ресурсе собраны личные истории действующих и бывших сотрудников компаний России. Достаточно
                ввести в поисковик страну, город, название фирмы — и перед вами откроется информация о
                корпоративном
                климате того или иного предприятия с указанием должностей, фамилий, фактов нарушения закона.</p>
            <p>Данные на ресурсе постоянно дополняются. Вы также можете внести свою лепту в черный список
                работодателей и компаний или же помочь нам составить рейтинг фирм, достойных подражанию,
                предлагающих идеальные условия для труда и карьерного роста.</p>
            <p>Оставляя свои отзывы о работе, руководствуйтесь объективностью: стремления «свести счеты» с
                бывшим боссом или, наоборот, обелить явно проигрышную вакансию, будут раскрыты.</p>
        </div>
        <div class="col col-lg-6">
            Реклама
        </div>
    </div>
</section>
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>