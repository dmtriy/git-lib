Описание класса Route

    private $controler; - выходной параметр контролер
    private $module; - выходной параметр модуль
    private $param = array(); - выходной параметр в виде массива ключ = имя параметра, значение = значение ключа



    private static $CONTROLER_DEFAULT; - контролер по умолчанию
    private static $MODULE_DEFAULT; - модуль по умолчанию

    initRoute($cont='index', $mod='') метод установки значений $CONTROLER_DEFAULT; и $MODULE_DEFAULT;

    parseUrl() метод устанавливаюший значения $controler ,$module и $param

    Возврат значений методами getControler(),getModule(),getParam().