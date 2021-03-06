<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 28.03.2016
 * Time: 10:02
 *
 * private $controler; - выходной параметр контролер
 * private $module; - выходной параметр модуль
 * private $param = array(); - выходной параметр в виде массива ключ = имя параметра, значение = значение ключа
 *
 * private static $CONTROLER_DEFAULT; - контролер по умолчанию
 * private static $MODULE_DEFAULT; - модуль по умолчанию
 * private static $WITHOUT_MODEL; - система без модулей только контролеры
 *
 * initRoute($cont='index', $mod='') метод установки значений $CONTROLER_DEFAULT; и $MODULE_DEFAULT;
 *
 * parseUrl() метод устанавливаюший значения $controler ,$module и $param
 *
 * Возврат значений методами getControler(),getModule(),getParam().
 *
 */
class Route
{
    private $controler;
    private $module;
    private $param = array();

    private static $CONTROLER_DEFAULT;
    private static $MODULE_DEFAULT;
    private static $WITHOUT_MODEL;


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
     * @param string $cont
     * @param string $mod
     * Установка значений контролера и модели по умолчанию
     * @param $statMod
     */
    public function initRoute($cont='index', $mod = '',$statMod = false )
    {
        self::$CONTROLER_DEFAULT = $cont;
        self::$MODULE_DEFAULT = $mod;
        self::$WITHOUT_MODEL = $statMod;
    }

    /**
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
            if (self::$WITHOUT_MODEL)
                $this->module = array_shift($URL_Parts);
            if (!empty(array_shift($URL_Parts))) {
                for ($i = 0; $i < count($URL_Parts); $i++) {
                    $this->param[$URL_Parts[$i]] = $URL_Parts[++$i];
                }
            }
        }
    }
}