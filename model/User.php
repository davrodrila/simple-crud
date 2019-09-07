<?php

class User {
    private $id;
    private $name;
    private $lastName;
    private $surName;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $nombre
     * @param $lastName
     * @param $surName
     * @param $email
     * @param $password
     */
    public function __construct($id, $nombre, $lastName, $surName, $email, $password)
    {
        $this->id = $id;
        $this->name = $nombre;
        $this->lastName = $lastName;
        $this->surName = $surName;
        $this->email = $email;
        $this->password = $password;
    }



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($apellido1)
    {
        $this->lastName = $apellido1;
    }


    public function getSurName()
    {
        return $this->surName;
    }


    public function setSurName($surName)
    {
        $this->surName = $surName;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }




}
