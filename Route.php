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

    private static $CONTROLER_DEFAULT;
    private static $MODULE_DEFAULT;


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
     * @param $cont
     * @param $mod
     * Установка значений контролера и модели
     */
    public function initRoute($cont='index', $mod='')
    {
        self::$CONTROLER_DEFAULT = $cont;
        self::$MODULE_DEFAULT = $mod;
    }

    /**
     * constructor.
     *
     *
     */
    public function parseUrl(){
        if ($_SERVER['REQUEST_URI'] == '/') {
            $this->controler = self::$CONTROLER_DEFAULT;
            $this->module = self::$MODULE_DEFAULT;
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