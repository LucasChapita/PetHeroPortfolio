<?php

namespace Models;

class Owner{

    private $petList=array();
    private $id;
    private $name;
    private $surName;
    private $dni;
    
    private $owner;

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

        return $this;
    }
    public function getSurName()
    {
        return $this->surName;
    }
    public function setSurName($surName)
    {
        $this->surName = $surName;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function getOwner()
    {
        return $this->owner;
    }
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }
}
?>