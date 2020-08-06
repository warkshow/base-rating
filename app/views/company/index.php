<section class="container py-4">
    Реклама
</section>

<section class="container-fluid content-border-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <p>Реклама</p>
            </div>
            <div class="col-sm-3 col-md-3">

                <div class="accordion" id="accordionCategory">
                    <?php
                    if (isset($categories) && $categories):
                        foreach ($categories as $category):
                            $name = 'category_name_' . $code_lang;
                            $category_name = $category->$name;
                            ?>
                            <div class="card">
                                <div class="card-header" id="heading<?php echo $category->alias; ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse"
                                                data-target="#<?php echo $category_name; ?>" aria-expanded="false"
                                                aria-controls="<?php echo $category_name; ?>">
                                            <?php echo $category_name; ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="<?php echo $category_name; ?>" class="collapse"
                                     aria-labelledby="heading<?php echo $category_name; ?>"
                                     data-parent="#accordionCategory">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <?php $sub_categories =
                                                R::findAll("rating_sub_category", 'category_id = :id',
                                                    [':id' => $category->id]);
                                            $sub_name =
                                                "sub_category_name_" . $code_lang;
                                            foreach ($sub_categories as $sub_category): ?>
                                                <li class="list-group-item"><a href="/company/<?php echo
                                                    $sub_category->sub_alias;
                                                    ?>"><?php echo
                                                        $sub_category->$sub_name;
                                                        ?></a></li>
                                            <? endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        <?php
                        endforeach;
                    endif; ?>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <p>Реклама</p>
            </div>
        </div>
        <div class="text-center">
            <?php //echo  $pagination;
            ?>
        </div>
</section>


<section class="container py-4">

</section>