<div class="container">
    <?php if (isset($_SESSION['errors']) && !empty($_SESSION["errors"])): ?>
        <ul>
            <?php foreach ($_SESSION['errors'] as $key => $value): ?>
                <li><?= $value[$key]; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php unset($_SESSION['errors']);
    elseif (isset($_SESSION['message']) && $_SESSION['message']):?>

        <p><?= $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); endif; ?>

    <div class="row">
        <div class="col-md-3 pb-2">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                   href="#profile" role="tab" aria-controls="profile">Профиль</a>
                <a class="list-group-item list-group-item-action" id="list-security-list" data-toggle="list"
                   href="#security" role="tab" aria-controls="security">Безопасность</a>
                <?php if (isLogin() && $_SESSION['user']['role_id'] == 2): ?>
                    <a class="list-group-item list-group-item-action" id="list-addCompany-list" data-toggle="list"
                       href="#addCompany" role="tab" aria-controls="addCompany">Добавить компанию</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <?php new \warks\components\userInfo\UserInfo(); ?>
                <?php new \warks\components\changePassword\ChangePassword(); ?>
                <?php if (isLogin() && $_SESSION['user']['role_id'] == 2): ?>
                    <?php new \warks\components\addCompany\AddCompany(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>
</div>
