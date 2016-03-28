<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 28.03.2016
 * Time: 10:02
 */
class Route
{
    private $controler;
    private $module;
    private $param = array();
    const HOME_DEFAULT = 'home';
    const MODULE_DEFAULT = 'home';

    /**
     * @return mixed
     */
    public function getControler()
    {
        return $this->controler;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return array
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * constructor.
     *
     *
     */
    public function __construct(){
        if ($_SERVER['REQUEST_URI'] == '/') {
            $this->page = HOME_DEFAULT;
            $this->module = MODULE_DEFAULT;
        }
        else {
            $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $URL_Parts = explode('/', trim($URL_Path, '/'));
            $this->controler = array_shift($URL_Parts);
            $this->module = array_shift($URL_Parts);
            if (!empty(array_shift($URL_Parts))) {
                for ($i = 0; $i < count($URL_Parts); $i++) {
                    $this->param[$URL_Parts[$i]] = $URL_Parts[++$i];
                }
            }
        }
    }
}