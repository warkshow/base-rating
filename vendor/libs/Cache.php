<?php

namespace vendor\libs;

class Cache
{

    /**
     * Устанавливает кеш по ключу
     *
     * @param string $key ключ кеша по которому сохранять
     * @param string $data данные которые нужно закешировать
     * @param integer $seconds на сколько времени нужно закешировать
     * @return boolean 
     */
    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = $seconds;
        $fileCache = $this->getFile($key);
        if (file_put_contents($fileCache, serialize($content))) {
            return true;
        }
        return false;
    }

    /**
     * Получение кеша по ключу
     *
     * @param string $key ключ кеша
     * @return array Возвращает кеш
     */
    public function get($key)
    {
        $fileCache = $this->getFile($key);
        if (file_exists($fileCache)) {
            $content = unserialize($fileCache);
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            $this->delete($key);
        }
        return false;
    }

    /**
     * Удаляет файл кеша по ключу
     *
     * @param string $key ключ кеша
     * @return void
     */
    public function delete($key)
    {
        $fileCache = $this->getFile($key);
        if (file_exists($fileCache)) {
            unlink($fileCache);
        }
    }

    /**
     * Возвращает файл если есть или создает его если нету
     *
     * @param string $key ключ файла
     * @return string Возвращает имя файла
     */
    protected function getFile($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        return $file;
    }
}
