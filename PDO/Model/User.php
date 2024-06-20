<?php

namespace Models;

class User{
    private $email;
    private $password;
    private $id;
    private $typeUser;
    //private $user;

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
   
    /*
    deveria de quedar asi en un .json
    [
    {
        "email": "macaco@gmail.com",
        "password":"123",
        "id":1,
        "typeUser":{
                    "idOwner":1,
                    "name":"manito",
                    "surname":"lixo",
                    "dni":12345,
                    "petList":[{
                                "foto":"img.png",
                                "id":1,
                                "name":"perro1",
                                "vaccinationSchedule":"ponele",
                                "raza":"calle",
                                "video":"video.mp4",
                                "dueño":{
                                        "idOwner": 1,
                                        "name": "manito",
                                        "surname": "lixo",
                                        "dni": 12345
                                        }
                                }]
                    }

    }

]
    */
}
?>