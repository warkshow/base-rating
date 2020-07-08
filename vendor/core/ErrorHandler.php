<?php

namespace vendor\core;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * Обработчик не критических ошибок
     *
     * @return true
     */
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->errorLog($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    /**
     * Обработчик фатальных ошибок
     *
     * @return void
     */
    public function fatalErrorHandler()
    {
        // if ($error = error_get_last() AND $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR))
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->errorLog($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    /**
     * Обработчик исключений
     *
     * @param $e
     * @return void
     */
    public function exceptionHandler($e)
    {
        $this->errorLog($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $reposnse = 500)
    {
        http_response_code($reposnse);
        if ($reposnse == 404 && !DEBUG) {
            require APP . '/views/errors/404.php';
            die;
        }
        if (DEBUG) {
            require APP . '/views/errors/dev.php';
        } else {
            require APP . '/views/errors/prod.php';
        }
        die;
    }
    protected function errorLog($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | файл: {$file} на строке {$line}\n=========================================\n", 3, TEMP . '\errors\errors.log');
    }
}
