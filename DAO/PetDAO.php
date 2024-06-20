<?php

namespace DAO;
//use Models\User as User;
//use DAO\UserDAO as UserDAO;
use DAO\IPetDAO as IPetDAO;
use Models\Owner as Owner;
use Models\Pet as Pet;

class PetDAO implements IPetDAO
{
    private $fileName = ROOT . "Data/pets.json";
    private $petList = array();

    public function Add($pet)
    {
        //var_dump($pet);
        $this->RetrieveDataPet();

        $pet->setId($this->GetNextIdPet());

        array_push($this->petList,$pet);

        //var_dump($this->petList);

        $this->SaveDataPet();
        
    }
    public function GetAllPets()
    {
        $this->RetrieveDataPet();
        return $this->petList;
    
    }
    private function RetrieveDataPet()
    {
        $this->petList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {

                $pet = new Pet();

                $pet->setPhoto($content["photo"]);
                $pet->setName($content["name"]);
                $pet->setVaccinationSchedule($content["vaccinationSchedule"]);
                $pet->setRace($content["race"]);
                $pet->setVideo($content["video"]);
                $pet->setSizePet($content["sizePet"]);
                $pet->setId($content["id"]);
                $pet->setOwnerID($content["ownerID"]);
                
                $owner = new Owner();

                $owner->setOwner($content["owner"]["type"]);
                $owner->setId($content["owner"]["id"]);
                $owner->setName($content["owner"]["name"]);
                $owner->setSurName($content["owner"]["surName"]);
                $owner->setDni($content["owner"]["dni"]);
                
                $pet->setOwneR($owner);
                
                array_push($this->petList, $pet);
            }
        }
    }
    private function SaveDataPet()
    {
        $arrayToEncode = array();

        foreach ($this->petList as $pet) {
            $valuesArray = array();
            $valuesArray["photo"] = $pet->getPhoto();
            $valuesArray["name"] = $pet->getName();
            $valuesArray["vaccinationSchedule"] = $pet->getVaccinationSchedule();
            $valuesArray["race"] = $pet->getRace();
            $valuesArray["video"] = $pet->getVideo();
            $valuesArray["sizePet"]=$pet->getSizePet();
            $valuesArray["id"] = $pet->getId();
            $valuesArray["ownerID"]=$pet->getOwnerID();
            
            $valuesArray["owner"] = array(
                "type" => $pet->getOwneR()->getOwner(),
                "id" => $pet->getOwneR()->getId(),
                "name" => $pet->getOwneR()->getName(),
                "surName" => $pet->getOwneR()->getSurName(),
                "dni" => $pet->getOwneR()->getDni(),
            );
            

            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    public function GetById($id)
    {
        $this->RetrieveDataPet();

        $aux = array_filter($this->petList, function ($Pet) use ($id) {
            return $Pet->getId() == $id;
        });

        $aux = array_values($aux);

        return (count($aux) > 0) ? $aux[0] : null;
    }
    
    public function Remove($id)
    {
        $this->RetrieveDataPet();

        $this->petList = array_filter($this->petList, function ($Pet) use ($id) {
            return $Pet->getId() != $id;
        });

        $this->SaveDataPet();
    }
    
    private function GetNextIdPet()
    {
        $id = 0;
        foreach ($this->petList as $pet) {
            $id = ($pet->getId() > $id) ? $pet->getId() : $id;
        }
        return $id + 1;
    }
}

?>