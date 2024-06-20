<?php

namespace SQL;

use Models\Pet as Pet;
use Models\Owner as Owner;
use \Exception as Exception;
use SQL\Connection as Connection;

class PetSQL implements IPetSQL{
    private $connection;
    private $tableName = "pet";

    public function Add(Owner $owner,Pet $pet)
    {
        try {
            $query = "CALL Pet_Add(?,?,?,?,?,?,?,?)";

            $parameters["photo"]=$pet->getPhoto();
            $parameters["id_Pet"]=$pet->getId();
            $parameters["name"]=$pet->getName();
            $parameters["vaccinationSchedule"]=$pet->getVaccinationSchedule();
            $parameters["race"]=$pet->getRace();
            $parameters["video"]=$pet->getVideo();
            $parameters["sizePet"] = $pet->getSizePet();

            $parameters["id_Owner"]=$owner->getId();
            
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetAll()
    {
        try {
            $petList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row) {
                $pet=new Pet();

                $pet->setPhoto($row["photo"]);
                $pet->setId($row["id_Pet"]);
                $pet->setName($row["name"]);
                $pet->setVaccinationSchedule($row["vaccinationSchedule"]);
                $pet->setRace($row["race"]);
                $pet->setVideo($row["video"]);
                $pet->setSizePet($row["sizePet"]);
                $pet->setOwnerID($row["id_Owner"]);

                
                array_push($petList, $pet);
            }


            return $petList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetPetById($id_Pet)
    {
        try {
            $query = "SELECT * FROM " . $this->tableName
                . " WHERE id_Pet=" . "'" . $id_Pet . "'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row) {
                $pet = new Pet();

                $pet->setPhoto($row["photo"]);
                $pet->setId($row["id_Pet"]);
                $pet->setName($row["name"]);
                $pet->setVaccinationSchedule($row["vaccinationSchedule"]);
                $pet->setRace($row["race"]);
                $pet->setVideo($row["video"]);
                $pet->setSizePet($row["sizePet"]);
                $pet->setOwnerID($row["id_Owner"]);

            }


            return $pet;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetPetByOwnerId($idOwner)
    {
        try {
            $petList = array();

            $query = "SELECT * FROM " . $this->tableName
            . " WHERE id_Owner=" . "'" . $idOwner . "'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row) {
                $pet = new Pet();

                $pet->setPhoto($row["photo"]);
                $pet->setId($row["id_Pet"]);
                $pet->setName($row["name"]);
                $pet->setVaccinationSchedule($row["vaccinationSchedule"]);
                $pet->setRace($row["race"]);
                $pet->setVideo($row["video"]);
                $pet->setSizePet($row["sizePet"]);
                $pet->setOwnerID($row["id_Owner"]);


                array_push($petList, $pet);
            }


            return $petList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Verific(Pet $pet,$idOwner)
    {
        try {
            //$petList = array();
            $existe=0;
            $query = "SELECT * FROM " . $this->tableName
                . " WHERE id_Owner=" . "'" . $idOwner . "'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            if($resultSet != null){
                foreach ($resultSet as $row) {
                    if($row['photo']==$pet->getPhoto()){
                        if($row['name']==$pet->getName()){
                            if($row["id_Owner"]==$pet->getOwnerID()){
                                if ($row["race"] == $pet->getRace()) {
                                    if($row["vaccinationSchedule"]==$pet->getVaccinationSchedule()){
                                        if($row["sizePet"]==$pet->getSizePet()){
                                           $existe = 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                   
                }
            }
            return($existe);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}

?>