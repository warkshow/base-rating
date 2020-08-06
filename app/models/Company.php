<?php


namespace app\models;


use warks\core\base\Model;

class Company extends Model
{
    public $category_table = 'rating_category';
    public $company_table = 'company';

    public $attributes = [
        'company_name' => '',
        'description_ru' => '',
        'description_en' => '',
        'description_et'=>'',
        'img'=>'',
        'category_id'=>'',
        'country_id'=>'',
        'city'=>''
    ];

    public $rules = [
        "required" => [
            ['company_name'],
            ['description_ru'],
            ['description_en'],
            ['description_et'],
            ['category_id'],
            ['country_id']

        ],
        'lengthMin' => [
            ['company_name', 2],
            ['description_ru', 10],
            ['description_en', 10],
            ['description_et', 10],
        ],
        'lengthMax'=>[
            ['company_name', 50],
        ]
    ];
}