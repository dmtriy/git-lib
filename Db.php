<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 05.04.2016
 * Time: 23:40
 */
class Db
{
    private static $nameDb = 'information_schema';
    private static $hostDb = 'localhost';
    private static $userDb = 'root';
    private static $passDb = '';
    private static $instance;
    /**
     * Создание автоматического
     * подключения к базе данных
     * через метод getInstance()
     */
    protected function __construct(){
        try{
            $this->db = new PDO("mysql:dbname=".self::$nameDb.";host=".self::$hostDb,self::$userDb,self::$passDb);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Ошибка подключения ". $e->getMessage();
        }
    }

    /**
     * Запрет клонирования
     */
    private function __clone(){}

    /**
     * Статический метод
     * подключения к базе данных
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $arrayConfig
     */
    public static function setConfig($arrayConfig){
        foreach ($arrayConfig as $key => $data){
            $property = $key . 'Db';
            self::$$property = $data;
        }
    }
}