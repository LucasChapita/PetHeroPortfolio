<?php

namespace DAO;
use Models\User as User;
use Models\Owner as Owner;
use DAO\IOwnerDAO as IOwnerDAO;

class OwnerDAO implements IOwnerDAO
{
    private $fileName = ROOT . "Data/owners.json";
    private $ownerList = array();


    public function Add($user,$owner)
    {
        $this->RetrieveData();

        $user->setId($this->GetNextId());
        $owner->setId($user->getId());

        $user->setTypeUserOwner($owner);

        array_push($this->ownerList, $user);

        $this->SaveData();
        
    }
    
    private function RetrieveData()
    {
        $this->ownerList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {

                $user = new User();
                $user->setEmail($content["email"]);
                $user->setPassword($content["password"]);
                $user->setId($content["id"]);


                $owner = new Owner();
                $owner->setOwner($content["typeuser"]["type"]);
                $owner->setId($content["typeuser"]["id"]);
                $owner->setName($content["typeuser"]["name"]);
                $owner->setSurName($content["typeuser"]["surname"]);
                $owner->setDni($content["typeuser"]["dni"]);

                $user->setTypeUserOwner($owner);


                array_push($this->ownerList, $user);
            }
        }
    }

    
    private function SaveData()
    {
        $arrayToEncode = array();
        
        foreach($this->ownerList as $user){

            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(
                "type" => $user->getTypeUserOwner()->getOwner(),
                "id" => $user->getTypeUserOwner()->getId(),

                "name"=> $user->getTypeUserOwner()->getName(),
                "surname"=>$user->getTypeUserOwner()->getSurname(),
                "dni" => $user->getTypeUserOwner()->getDni(),
            );


            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    public function GetAllOwner()
    {
        $this->RetrieveData();
        return $this->ownerList;
    }

    
    public function GetById($id)
    {
        $this->RetrieveData();

        $aux = array_filter($this->ownerList, function ($owner) use ($id) {
            return $owner->getId() == $id;
        });

        $aux = array_values($aux);

        return (count($aux) > 0) ? $aux[0] : null;
    }

    private function GetNextId()
    {
        $id = 0;
        foreach ($this->ownerList as $owner) {
            $id = ($owner->getId() > $id) ? $owner->getId() : $id;
        }
        return $id + 1;
    }
    public function getByEmail($email) ///owner
    {
        $user = null;

        $this->RetrieveData();

        $users = array_filter(
            $this->ownerList,
            function ($owner) use ($email) {
                return $owner->getEmail() == $email;
            }
        );

        $users = array_values($users); //Reordering array indexes

        return (count($users) > 0) ? $users[0] : null;
    }
}

?>