<?php

namespace SQL;

use SQL\IKeeperSQL as IKeeperSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\User as User;
use Models\Keeper as Keeper;
use Models\Review as Review;

class ReviewSQL implements IReviewSQL{
    private $connection;
    private $tableName = "review";

    public function Add(Review $review)
    {
        
        try {
            $query = "CALL Review_Add(?,?,?,?,?)";

            $parameters["id_Review"]=$review->getId_Review();
            $parameters["comment"] = $review->getComment();
            $parameters["review"] = $review->getReview();
            $parameters["id_Owner"] = $review->getId_Owner();
            $parameters["id_Keeper"] = $review->getId_Keeper();
            

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetAll()
    {
        try {
           
            $reviewList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row) {

                $reviewOwnerAtKeeper = new Review();
                $reviewOwnerAtKeeper->setId_Review($row["id_Review"]);
                $reviewOwnerAtKeeper->setComment($row["comment"]);
                $reviewOwnerAtKeeper->setReview($row["review"]);
                $reviewOwnerAtKeeper->setId_Owner($row["id_Owner"]);
                $reviewOwnerAtKeeper->setId_Keeper($row["id_Keeper"]);

                array_push($reviewList, $reviewOwnerAtKeeper);
            }
            return $reviewList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}
