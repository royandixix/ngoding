<?php
class controller
{
    // handle model
    // 1. cek apaka file modeal apa?
    // 2. jika ada,  maka equire kelas model
    // 3. instiansi pada kelas model 

    public function loadmodel($model)
    {
        if (file_exists('apps/models/' . $model . '.php')) {
            require_once('apps/models/' . $model . '.php');
            $model = new $model;
        }
        return $model;
    }
    public function loadview($view,$data=null)
    {
        if(file_exists('apps/views/' . $view . '.php')) {
            require_once 'apps/views/' . $view . '.php';
        }
    }
}
