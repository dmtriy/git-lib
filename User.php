<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.04.2016
 * Time: 7:02
 */
class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $role;
    public $cookie = 'user';

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }

    /**
     * User constructor.
     * @param Form $f
     */
    public function __construct(Form $f){
        session_start();
        if ($this->checkUserCookie()){
            $this->autoAuthUser();
        }
        elseif ($f->form = "user" and $f->code = "reg"){
            $this->regUser();
        }
        elseif ($f->form = "user" and $f->code = "auth"){
            $this->authUser();
        }

    }

    private function checkUserSession(){
        if ($_SESSION[$this->cookie] != ''){
            return $_SESSION[$this->cookie];
        }
        else return false;
    }

    private function checkUserCookie(){
        if ($_COOKIE[$this->cookie] != ''){
            return true;
        }
        else return false;
    }
    private function autoAuthUser(){


    }
    private function authUser(){

    }
    private function regUser(){

    }
}