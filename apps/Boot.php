<?php

require "Config.php";
require "Controller.php";
require "Database.php";
require "Model.php";
// require "Database";
class Boot
{

    protected $controllers = 'index';
    protected $action = 'index';
    protected $params = [];


    public function __construct()
    {
        $url = $_GET['r'];
        $url = $this->parseUrl($url);

        if (file_exists('apps/controllers/' . $url[0] . '.php')) {
            $this->controllers = $url[0];
            unset($url[0]);
        }

        require('apps/controllers/' . $this->controllers . '.php');
        $this->controllers = new $this->controllers;

        if (isset($url[1])) {
            if (method_exists($this->controllers, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controllers,$this->action], $this->params);
        // var_dump($url);
    }

    // routing aplikasi mvc --> memilihkan controler, models, dan views yang diperlukan
    public function parseUrl($url)
    {
        if (isset($_GET['r'])) {
            $url = rtrim($_GET['r'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
        }
        return $url;
    }
}
