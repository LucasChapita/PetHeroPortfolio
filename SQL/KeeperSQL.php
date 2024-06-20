<?php

namespace SQL;

use SQL\IKeeperSQL as IKeeperSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\User as User;
use Models\Keeper as Keeper;

class KeeperSQL implements IKeeperSQL{
    private $connection;
    private $tableName = "keeper";

    public function Add(User $user, Keeper $keeper)
    {
        
        try {
            $query = "CALL Keeper_Add(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $parameters["email"]=$user->getEmail();
            $parameters["password"]=$user->getPassword();

            $parameters["id_Keeper"]=$keeper->getId();

            $parameters["name"]=$keeper->getName();
            $parameters["lastname"] = $keeper->getLastname();
            $parameters["photo"] = $keeper->getPhoto();
            $parameters["dni"] = $keeper->getDNI();
            $parameters["tuition"] = $keeper->getTuition();
            $parameters["sizepet"] = $keeper->getSizePet();
            $parameters["price"] = $keeper->getPrice();
            $parameters["sex"] = $keeper->getSex();
            $parameters["age"] = $keeper->getAge();
            $parameters["dateStart"] = $keeper->getDateStart();
            $parameters["dateFinish"] = $keeper->getDateFinish();
            

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function AddStays($id,$dateStart,$dateFinish)
    {
        //var_dump($dateStart);
        
        try {
            $query = "CALL Stays_Add(?,?,?)";

            
            $parameters["id"] = $id;
            $parameters["dateStart"] = $dateStart;
            $parameters["dateFinish"] = $dateFinish;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetAll()
    {
        try {
            //$reservList = array();
            $keeperList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row) {

                $user = new User();

                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id_Keeper"]);

                $keeper = new Keeper();
                $keeper->setName($row["name"]);
                $keeper->setLastname($row["lastaname"]);
                $keeper->setPhoto($row["photo"]);
                $keeper->setDNI($row["DNI"]);
                $keeper->setTuition($row["tuition"]);
                $keeper->setSizePet($row["sizePet"]);
                $keeper->setPrice($row["price"]);
                $keeper->setSex($row["sex"]);
                $keeper->setAge($row["age"]);
                $keeper->setDateStart($row["dateStart"]);
                $keeper->setDateFinish($row["dateFinish"]);

                
                $user->setTypeUserKeeper($keeper);
                array_push($keeperList, $user);
            }
            return $keeperList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetByEmail($email)
    {
        try {
            $keeperList = array();

            $query = "SELECT * FROM " . $this->tableName
            . " WHERE email=" . "'" . $email . "'";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            $user = new User();
            foreach ($resultSet as $row) {


                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id_Keeper"]);

                $keeper = new Keeper();
                $keeper->setName($row["name"]);
                $keeper->setLastname($row["lastaname"]);
                $keeper->setPhoto($row["photo"]);
                $keeper->setDNI($row["DNI"]);
                $keeper->setTuition($row["tuition"]);
                $keeper->setSizePet($row["sizePet"]);
                $keeper->setPrice($row["price"]);
                $keeper->setSex($row["sex"]);
                $keeper->setAge($row["age"]);
                $keeper->setDateStart($row["dateStart"]);
                $keeper->setDateFinish($row["dateFinish"]);

                
                $keeper->setKeeper("Keeper");
                $keeper->setId($user->getId());
                $user->setTypeUserKeeper($keeper);

                array_push($keeperList, $user);
            }
            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetById($idKeeper)
    {
        try {
            $keeperList = array();

            $query = "SELECT * FROM " . $this->tableName
                . " WHERE id_Keeper=" . "'" . $idKeeper . "'";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            $user = new User();
            foreach ($resultSet as $row) {


                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id_Keeper"]);

                $keeper = new Keeper();
                $keeper->setName($row["name"]);
                $keeper->setLastname($row["lastaname"]);
                $keeper->setPhoto($row["photo"]);
                $keeper->setDNI($row["DNI"]);
                $keeper->setTuition($row["tuition"]);
                $keeper->setSizePet($row["sizePet"]);
                $keeper->setPrice($row["price"]);
                $keeper->setSex($row["sex"]);
                $keeper->setAge($row["age"]);
                $keeper->setDateStart($row["dateStart"]);
                $keeper->setDateFinish($row["dateFinish"]);


                $keeper->setKeeper("Keeper");
                $keeper->setId($user->getId());
                $user->setTypeUserKeeper($keeper);

                array_push($keeperList, $user);
            }
            //var_dump($user);
            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
?>