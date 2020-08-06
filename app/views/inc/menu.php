<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Base Rating</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><?php echo __('home'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Доска объявлений</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/company">Компании</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if (!isLogin()): ?>
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Авторизация</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Вход</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#registerModal">Регистрация</a>
                            </div>
                        <?php else: ?>
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Мой аккаунт</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="/user/cabinet">Личный
                                кабинет</a>
                            <a class="dropdown-item" href="/user/logout">Выход</a>
                            <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php if (!isLogin()): ?>
    <!-- Modal Login-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalTitle">Форма входа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="errorLogin" class="errorForms"></div>
                <div class="modal-body">
                    <!-- Форма входа -->
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="signInLogin">Логин</label>
                            <input type="text" class="form-control" id="signInLogin" aria-describedby="signInLoginHelp"
                                   name="username">
                            <small id="signInLoginHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="signInPassword">Password</label>
                            <input type="password" class="form-control" id="signInPassword" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button id="btnLogin" class="btn btn-success">Вход</button>
                        </div>
                    </form>
                    <!-- Конец Форма входа -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Login -->
    <!-- Modal Register-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalTitle">Регистрация</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="errorRegister" class="errorForms"></div>
                <div class="modal-body">
                    <!-- Форма Регистрации -->
                    <form id="registerForm">
                        <div class="form-group">
                            <label for="singUpLogin">Логин</label>
                            <input type="text" class="form-control" id="singUpLogin" name="username">

                        </div>
                        <div class="form-group">
                            <label for="singUpPassword">Пароль</label>
                            <input type="password" class="form-control" id="singUpPassword" name="password">
                        </div>
                        <div class="form-group">
                            <label for="singUpEmail">Эл. почта</label>
                            <input type="email" class="form-control" id="singUpEmail" name="email">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-success" id="btnRegister">Зарегистрироваться</button>
                        </div>
                    </form>
                    <!-- Конец Форма регистрации -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Register -->

<?php endif; ?>

