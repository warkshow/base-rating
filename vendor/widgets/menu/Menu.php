<?php

namespace vendor\widgets\menu;

use vendor\libs\Cache;

class Menu
{
    /**
     * Данные
     *
     * @var array
     */
    protected $data;

    /**
     * Дерево
     *
     * @var [type]
     */
    protected $tree;
    /**
     * html код с деревом
     *
     * @var [type]
     */
    protected $menuHtml;
    protected $tpl;
    /**
     * Во что обертывать
     *
     * @var string
     */
    protected $container = 'ul';

    /**
     * Класс контейнера
     *
     * @var string
     */
    protected $class = 'menu';
    /**
     * @var string таблица из которой брать данные
     */
    protected $table = 'category';

    /**
     * Нужно ли кешировать
     *
     * @var int
     */
    protected $cache = 3600;
    protected $cacheKey = 'menu';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }


    protected function run()
    {
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml) {
            $this->data = [];
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
        }
        $this->output();
    }

    public function output()
    {
        echo "<{$this->container} class='{$this->class}'>";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    public function getOptions(array $options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parrent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parrent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $node) {
            $str .= $this->catToTemplate($node, $tab, $id);
        }
        return $str;
    }
    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}
