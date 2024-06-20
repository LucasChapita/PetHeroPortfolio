<?php

namespace Controllers;

use Models\Keeper as Keeper;
use Models\User as User;
use SQL\KeeperSQL as KeeperSQL;
use DAO\KeeperDAO as KeeperDAO;
use Models\Review;
use SQL\ReviewSQL as ReviewSQL;

class KeeperController{
    private $keeperSQL;
    private $keeperDAO;
    private $keeper;

    public function __construct()
    {
        $this->keeperDAO = new KeeperDAO();
        $this->keeperSQL=new KeeperSQL();
    }

    public function getKeeperC()
    {
        return $this->keeper;
    }
    public function setKeeperC($keeper)
    {
        $this->keeper = $keeper;
    }
    public function MenuKeeper()
    {
        //MENU DE KEEPER
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "keepers/menu-keeper.php");
    }

    public function RegisterKeeper($email, $password, $name, $lastname, $photo, $dni, $tuition,$sizePet ,$price,$sex, $age)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $keeper = new Keeper();

        $keeper->setKeeper("Keeper");

        $keeper->setName($name);
        $keeper->setLastname($lastname);
        $keeper->setPhoto($photo);
        $keeper->setDNI($dni);

        $keeper->setTuition($tuition);

        if ($_REQUEST["sizePet"] == "small") {
            $keeper->setSizePet($sizePet);
        } elseif ($_REQUEST["sizePet"] == "medium") {
            $keeper->setSizePet($sizePet);
        } else {
            $keeper->setSizePet($sizePet);
        }
        $keeper->setPrice($price);


        if ($_REQUEST["sex"] == "Female") {
            $keeper->setSex($sex);
        } elseif ($_REQUEST["sex"] == "Male") {
            $keeper->setSex($sex);
        } else {
            $keeper->setSex($sex);
        }

        if ($_REQUEST["age"] > 17) {
            $keeper->setAge($age);
        } else {
            $keeper->setAge($age);
        }

        //$this->keeperDAO->Add($user, $keeper);
        $this->keeperSQL->Add($user, $keeper);
        
        $this->GoHome();
    }

    public function ShowAllKeepers()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "keeper-list.php");
    }
    
    
    public function ShowAddStays(){
        require_once(VIEWS_PATH . "validate-session.php");
        
        require_once(VIEWS_PATH . "keepers/stays.php");
    }
    
    public function WelcomeKeeper(){
        require_once(VIEWS_PATH . "validate-session.php");
        $this->ShowAddStays();
    }

    public function RegisterStays($dateS,$dateF)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $userIn=new User();
        
        $userArr = $_SESSION;
        foreach ($userArr as $user) {
            $userIn->setEmail($user->getEmail());
            $userIn->setPassword($user->getPassword());
            $userIn->setId($user->getId());
            /*
            $keeper = new Keeper();
            $keeper->setName($user->getTypeUserKeeper()->getName());
            $keeper->setLastname($user->getTypeUserKeeper()->getLastname());
            $keeper->setPhoto($user->getTypeUserKeeper()->getPhoto());
            $keeper->setDNI($user->getTypeUserKeeper()->getDNI());
            $keeper->setTuition($user->getTypeUserKeeper()->getTuition());
            $keeper->setSex($user->getTypeUserKeeper()->getSex());
            $keeper->setAge($user->getTypeUserKeeper()->getAge());
            $keeper->setId($user->getTypeUserKeeper()->getId());
            $keeper->setKeeper($user->getTypeUserKeeper()->getId());
            */
        }
        
        //$keeper->setDateStart($dateS);
        //$keeper->setDateFinish($dateF);
        

        //$this->keeperDAO->AddStays($userIn,$keeper);
        


        //var_dump($dateS);
        $this->keeperSQL->AddStays($userIn->getId(),$dateS,$dateF);
        $this->MenuKeeper();

    }
    public function CreateReview($id_Keeper,$id_Owner)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        
        require_once(VIEWS_PATH. "owners/review.php");
    }

    public function Reviews($id_Keeper,$id_Owner, $review, $comments)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $reviewOwnerAtKeeper=new Review();
        
        if ($review== 'Terrible') {
            $reviewOwnerAtKeeper->setReview(1);
        } elseif($review == 'Bad'){
            $reviewOwnerAtKeeper->setReview(2);
        }elseif($review == 'Regular'){
            $reviewOwnerAtKeeper->setReview(3);
        }elseif($review == 'Good'){
            $reviewOwnerAtKeeper->setReview(4);
        }elseif($review == 'Excelent'){
            $reviewOwnerAtKeeper->setReview(5);
        }
        
        $reviewOwnerAtKeeper->setComment($comments);

        $reviewOwnerAtKeeper->setId_Keeper($id_Keeper);
        $reviewOwnerAtKeeper->setId_Owner($id_Owner);
        
        $reviewSQL=new ReviewSQL();
        
        $reviewSQL->Add($reviewOwnerAtKeeper);
        echo "<script> alert('Your Review has been Published'); </script>";
        require_once(VIEWS_PATH . "owners/keeper-list.php");
    }


    public function ShowReviews(){
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "keepers/review-list.php");
    }

    public function GoHome()
    {
        header('Location:' . FRONT_ROOT . 'Home/GoFirstPage');
    }

    public function getKeeper()
    {
        return $this->keeper;
    }
    public function setKeeper($keeper)
    {
        $this->keeper = $keeper;
    }
}
