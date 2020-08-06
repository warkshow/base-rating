<section class="container-fluid content-border-white py-4">
    <div class="container">
        <div class="row m-0 justify-content-center">
            <?php if (isset($companies) && $companies && $categories): $desc = "description_$code_lang"; ?>
                <?php foreach ($companies as $company): ?>
                    <div class="col col-lg-3 py-2">
                        <div class="card company-tile overflow-hidden" style="min-height: 300px;max-height: 300px;">
                            <a href="<?php echo "{$categories[1]->sub_alias}/$company->id"; ?>">
                                <img src="<?php
                                if ($company->img != null) echo "{$company->img}";
                                else echo "/images//noimg.jpg"; ?>"
                                     class="img-fluid p-4" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $company->company_name; ?></h5>
                                    <p class="card-text">
                                        <?php echo $company->$desc; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: echo "Выбрана не правильная категория или в категории нету фирм."; ?>
            <?php endif; ?>
        </div>
        <?php if($pagination->countPages > 1): ?>
            <?= $pagination;?>
        <?php endif; ?>
    </div>
</section>