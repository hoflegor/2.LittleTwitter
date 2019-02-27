<?php

abstract class User
{
    public $username;
    public $age;
    private $password;
    public $loginFails = 0;

    public function getUsername()
    {
        return $this->username;
    }

    abstract public function checkLogin(string $username, string $password): bool;

    public function setLogin(string $login)
    {
        $this->username = $login;
    }

    abstract public function setPassword(string $password): bool;

    abstract public function setAge(int $age): bool;

    final public function login(string $username, string $password): bool
    {
        return $this->checkLogin($username, $password);
    }
}