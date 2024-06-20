<?php

namespace SQL;

use SQL\IOwnerSQL as IOwnerSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\User as User;
use Models\Owner as Owner;


class OwnerSQL implements IOwnerSQL{
    private $connection;
    private $tableName = "owner";
    
    public function Add(User $user, Owner $owner)
    {
        try 
        {
            $query="CALL Owner_Add(?,?,?,?,?,?)";

            $parameters["email"]=$user->getEmail();
            $parameters["password"]=$user->getPassword();
            $parameters["id_Owner"]=$owner->getId();

            $parameters["name"]=$owner->getName();
            $parameters["surname"]=$owner->getSurName();
            $parameters["dni"]=$owner->getDni();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);

        }catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetByEmail($email)
    {
        try {
            $ownerList = array();

            $query = "SELECT * FROM " . $this->tableName . " WHERE email="."'".$email."'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);


            $user=new User();
            foreach ($resultSet as $row) {

                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id_Owner"]);

                $owner=new Owner();

                $owner->setName($row["name"]);
                $owner->setSurName($row["surname"]);
                $owner->setDni($row["dni"]);

                $user->setTypeUserOwner($owner);

                array_push($ownerList, $user);
            }
            
            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetById($id_Owner)
    {
        try {
            $ownerList = array();

            $query = "SELECT * FROM " . $this->tableName . " WHERE id_Owner =" . "'" . $id_Owner . "'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);


            $user = new User();
            foreach ($resultSet as $row) {

                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id_Owner"]);

                $owner = new Owner();

                $owner->setName($row["name"]);
                $owner->setSurName($row["surname"]);
                $owner->setDni($row["dni"]);

                $user->setTypeUserOwner($owner);

                array_push($ownerList, $user);
            }

            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>