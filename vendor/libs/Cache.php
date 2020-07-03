<?php

namespace vendor\libs;

class Cache
{
    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = $seconds;
        $fileCache = CACHE . '/' . md5($key) . '.txt';
        if (file_put_contents($fileCache, serialize($content))) {
            return true;
        }
        return false;
    }
    public function get($key)
    {
        $fileCache = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($fileCache)) {
            $content = unserialize($fileCache);
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($fileCache);
        }
        return false;
    }

    public function delete($key)
    {
        $fileCache = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($fileCache)) {
            unlink($fileCache);
        }
    }
}
