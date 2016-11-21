<?php

/**
 * Created by PhpStorm.
 * User: daniiltserin
 * Date: 21.11.2016
 * Time: 20:15
 */
abstract class C_Controller
{
    protected $params;

    public function Go($action, $params)
    {
        $this->params = $params;
        $this->$action();
    }

    /**
     * @return bool
     */
    protected function IsGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected function IsPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public function __call($name, $params)
    {
        $this->p404();
    }

    public function p404()
    {
        echo "404";
    }

    public function request($url)
    {
        ob_start();

        if (strpos($url, 'http://') === 0 || strpos($url, 'https://'))
            echo file_get_contents($url);
        else {
            $rout = new M_Rout($url);
            $rout->Request();
        }

        return ob_get_clean();
    }

    //
    protected function redirect($url)
    {

        if ($url[0] == '/')
            $url = "/" . substr($url, 1);

        header("location: $url");
        exit();
    }

}