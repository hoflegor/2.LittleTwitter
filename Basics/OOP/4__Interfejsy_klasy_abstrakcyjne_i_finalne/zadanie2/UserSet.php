<?php

include_once '../zadanie1/Client.php';

class UserSet implements Iterator
{
    public $clientTable = [];

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->clientTable[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;

        return $this->clientTable[$this->position];
    }

    public function valid()
    {
        return isset($this->clientTable[$this->position]);
    }

    public function add(Client $client)
    {
        $this->clientTable[] = $client;
    }

    public function showUserByPassword(string $pass)
    {
        $userTable = [];
        foreach ($this->clientTable as $key => $value) {
            if ($value->getPassword() == $pass) {
                $userTable[$value->getUsername()] = $value;
            }
        }

        return $userTable;
    }
}