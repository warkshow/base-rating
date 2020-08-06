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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
    $(function ($) {
        $("#alertErrorHelp").alert('close');
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            login();
        });
        $("#registerForm").submit(function (e) {
            e.preventDefault();
            register();
        });

    })

    function login() {
        var data = $("#loginForm").serialize()
        $("#btnLogin").prop('disabled', true);
        $.ajax({
            type: "POST",
            url: "user/sign-in", //"register_user.php",
            data: data,
            dataType: 'json', //на всякий добавил тип ожидаемых данных
            success: function (res) {
                console.log(res);
                if (res["success"] === "login") {
                    location.reload(true);
                } else {
                    let tests = "";
                    for (let key in res) {
                        for (let error of res[key]) {
                            tests += "<li>" + error + "</li>";
                            $("#errorLogin").html(tests);
                            $("#errorLogin").show();
                            console.log(error);
                        }
                    }
                    $("#btnLogin").prop('disabled', false);
                }
            }
        });

    }

    function register() {
        var data = $("#registerForm").serialize()
        $("#btnRegister").prop('disabled', true);
        $.ajax({
            type: "POST",
            url: "user/sign-up", //"register_user.php",
            data: data,
            dataType: 'json', //на всякий добавил тип ожидаемых данных
            success: function (res) {
                if (res["success"] === "register") {
                    location.reload(true);
                } else {
                    console.log(res);
                    let tests = "";
                    for (let key in res) {
                        for (let error of res[key]) {
                            tests += "<li>" + error + "</li>";
                            $("#errorRegister").html(tests);
                            $("#errorRegister").show();
                            console.log(error);
                        }
                    }
                    $("#btnRegister").prop('disabled', false);
                }
            }
        });

    }
</script>
<script src="/public/scripts/app.js"></script>

<?php
foreach ($scripts as $script) {
    echo $script;
}
?>
</body>
</html>