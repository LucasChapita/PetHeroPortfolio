<?php

namespace Models;

class User{
    private $email;
    private $password;
    private $id;
    private $typeUser;
    
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
     
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

    }
    public function getTypeUserOwner()
    {
        return $this->typeUser;
    }
    public function getTypeUserKeeper()
    {
        return $this->typeUser;
    }

    public function setTypeUserOwner(Owner $typeUser)
    {
        $this->typeUser = $typeUser;
    }
    public function setTypeUserKeeper(Keeper $typeUser)
    {
        $this->typeUser = $typeUser;
    }

}
?>