<?php
namespace Models;

class Review{
    private $id_Review;
    private $comment;
    private $review;
    private $id_Keeper;
    private $id_Owner;


    

    public function getId_Review()
    {
        return $this->id_Review;
    }

    public function setId_Review($id_Review)
    {
        $this->id_Review = $id_Review;
    }
    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;

    }
    public function getReview()
    {
        return $this->review;
    }
    public function setReview($review)
    {
        $this->review = $review;

    }

    public function getId_Keeper()
    {
        return $this->id_Keeper;
    }
    public function setId_Keeper($id_Keeper)
    {
        $this->id_Keeper = $id_Keeper;

    }
    public function getId_Owner()
    {
        return $this->id_Owner;
    }
    public function setId_Owner($id_Owner)
    {
        $this->id_Owner = $id_Owner;
    }
}

?>