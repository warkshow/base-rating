<?php


namespace app\controllers;


use app\models\Company;
use R;
use warks\core\base\App;
use warks\core\base\View;
use warks\libs\Pagination;

class CompanyController extends AppController
{

    public function indexAction()
    {
        //company - категории выводит
        //company/add - добавляет компанию
        //company/category - компании по категории
        //company/category/id - вывод компании по id

        $model = new Company();
        $code_lang = App::$app->getProperty('lang')['code'];
        $categories = \R::findAll($model->category_table);
        View::setMeta('Категории компанийq', "Категории компаний", "Категории рейтинга компаний");
        $this->set(compact('categories', 'code_lang'));
    }

    /**
     * Поиск компаний по категории определенной
     */
    public function categoryAction()
    {
        $model = new Company();
        $code_lang = App::$app->getProperty('lang')['code'];
        View::setMeta($this->route['category'], "Категории компаний", "Категории рейтинга компаний");

        // имя категории
        /**
         * SELECT *
         * FROM company, rating_sub_category
         * WHERE company.category_id = rating_sub_category.id AND rating_sub_category.sub_alias = "carservs"

         * $total = \R::count('users');
         * $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
         * $perpage = 2;
         * $pagination = new Pagination($page, $perpage, $total);
         * $start = $pagination->getStart();
         * $users = \R::findAll('users', "LIMIT $start, $perpage");

         */
        $category = \R::findLike('rating_sub_category',["sub_alias" => [$this->route['category']]]);
        $category_id = $category[key($category)]->id;
        $total = R::count('company', "category_id = ?", [$category_id]);
        $perpage = 8;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();


        $companies = \R::findMulti(
            "company, rating_sub_category",
            "SELECT company.*, rating_sub_category.* FROM company, rating_sub_category WHERE company.category_id = rating_sub_category.id AND rating_sub_category.sub_alias = '{$this->route['category']}' LIMIT $start, $perpage");
        $categories = $companies['rating_sub_category'];
        $companies = $companies['company'];
        $this->set(compact('companies', 'code_lang', 'categories','pagination'));
    }

    public function showAction()
    {
        $model = new Company();
        $code_lang = App::$app->getProperty('lang')['code'];
        $company = \R::findOne($model->company_table, "id = :id", [':id' => $this->route['company_id']]);
        View::setMeta("Рейтинг {$company->company_name}", "Категории компаний", "Категории рейтинга компаний");
        $this->set(compact('company', "code_lang"));
    }


    public function addCompanyAction()
    {
        if (isLogin()) {
            if ($_POST) {
                $this->layout = false;
                if(isset($_FILES) && $_FILES['img']['error'] == 0){
                    $file = $_FILES['img'];
                }else{
                    $file = '';
                }
                debug($file);
                $this->addCompany($_POST, $file);
            }else{
                redirect();
            }

        }else{
            redirect();
        }
    }


    protected function addCompany($data = [], $image = [])
    {
        debug($image);
        if($image != '') {
            $imageName = "/uploads/" . uploadImage($image) ?? '';
            $data['img'] = $imageName;
        }
        $model = new Company();
        $model->load($data);
        if (!$model->validate($data)) {
            $_SESSION['errors'] = $model->getErrors();
        }else{
            $model->save('company');
            $_SESSION['message'] = "Компания успешон добавлена!";
        }
        redirect();
    }

    public function searchAction()
    {
        $this->layout = false;
        debug($_POST);
    }

}
