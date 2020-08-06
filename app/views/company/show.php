<?php if (isset($company) && $company) : $desc = "description_$code_lang"; ?>
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h1 class="text-center"><?= $company->company_name; ?></h1>
                    </div>
                    <div class="pull-left col-md-4 col-xs-12 thumb-contenido">
                        <img class="rounded float-left img-fluid p-4" src='<?php
                        if ($company->img != null) echo "{$company->img}";
                        else echo "/images//noimg.jpg"; ?>'/></div>
                    <div class="card mt-3 tab-card">
                        <div class="card-header tab-card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-description" data-toggle="tab" href="#description"
                                       role="tab" aria-controls="description" aria-selected="true">Описание</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contacts" role="tab"
                                       aria-controls="Three" aria-selected="false">Контакты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                       aria-controls="Two" aria-selected="false">Отзывы</a>
                                </li>

                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-3" id="description" role="tabpanel"
                                 aria-labelledby="tab-description">
                                <p class="card-text"><?= $company->$desc; ?></p>
                            </div>
                            <div class="tab-pane fade p-3" id="contacts" role="tabpanel" aria-labelledby="contact-tab">
                                <p class="card-text">номер телефона <br>почта</p>
                            </div>
                            <div class="tab-pane fade p-3" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <p class="card-text">Отзывы</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>