<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use Controllers\OwnerController as OwnerController;

    use DAO\OwnerDAO as OwnerDAO;
    use DAO\KeeperDAO as KeeperDAO;

    use SQL\OwnerSQL as OwnerSQL;
    use SQL\KeeperSQL as KeeperSQL;
    
    use Models\User as User;
    use Models\Owner as Owner;
    use Models\Keeper as Keeper;
    
    class HomeController
    {
        private $ownerDAO;
        private $keeperDAO;
        
        private $ownerSQL;
        private $keeperSQL;

        private $isOwner;
        private $isKeeper;

        public function __construct()
        {
            //$this->ownerDAO= new OwnerDAO();
            //$this->keeperDAO= new KeeperDAO();

            $this->ownerSQL= new OwnerSQL();
            $this->keeperSQL= new KeeperSQL();

            $this->isOwner=new User();
            $this->isKeeper=new User();
        }

        public function Index()
        {
            require_once(VIEWS_PATH."home.php");
        }
        
        //validacion
        public function EnterUser($email,$password){
            //$owner =$this->ownerDAO->getByEmail($email);
            //$keeper=$this->keeperDAO->getByEmail($email);

            $owner=$this->ownerSQL->GetByEmail($email);
            $keeper= $this->keeperSQL->GetByEmail($email);     

            if((($owner != null)&&($owner->getPassword()==$password)) && (($keeper != null) && ($keeper->getPassword() == $password)))
            {
            ///validar si es keeper o owner
                $this->isOwner= $owner;
                $this->isKeeper=$keeper;
                $this->OwnerOrKeeper();
            } 
            else{
                if(($owner != null) && ($owner->getPassword() == $password)){
                    //$user = $this->ownerDAO->Get($email);
                    $user = $this->ownerSQL->GetByEmail($email);
                    $_SESSION["loggedUser"] = $user;

                    $owner = new Owner();
                    $owner->setOwner($user->getTypeUserOwner()->getOwner());
                    $owner->setId($user->getTypeUserOwner()->getId());
                    $owner->setName($user->getTypeUserOwner()->getName());
                    $owner->setSurName($user->getTypeUserOwner()->getSurName());
                    $owner->setDni($user->getTypeUserOwner()->getDni());
                    $this->InLogin("Welcome", $owner);
                }
                else
                {
                    if(($keeper!=null)&&($keeper->getPassword()==$password)){
                        //$keeper = $this->keeperDAO->getByEmail($email);
                        $keeper = $this->keeperSQL->GetByEmail($email);
                        $_SESSION["loggedUser"] = $keeper;
                        $this->InKeeper("Welcome", $keeper);
                    }else
                    {
                        echo "<script> alert('Invalid Username or Passwords'); </script>";
                        $this->Index();
                    }
                }
            }
        }
        
        public function OwnerOrKeeper(){
            require_once(VIEWS_PATH."orsetuser.php");
        }
        ///es Owner
        public function itsOwner($email){
            //$user = $this->ownerDAO->getByEmail($email);
            $user = $this->ownerSQL->GetByEmail($email);
            
            $_SESSION["loggedUser"] = $user;
            //$user=$_SESSION["loggedUser"];
            
            $owner= new Owner();
            $owner->setOwner($user->getTypeUserOwner()->getOwner());
            $owner->setId($user->getTypeUserOwner()->getId());
            $owner->setName($user->getTypeUserOwner()->getName());
            $owner->setSurName($user->getTypeUserOwner()->getSurName());
            $owner->setDni($user->getTypeUserOwner()->getDni());


            $this->InLogin("Welcome",$owner);
        }
        ///logueado y menu owner
        public function InLogin($owner) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $dueño=new OwnerController();
            $dueño->setDueñoOwner($owner);
            $dueño->MenuOwner();
        }
        ///es Keeper
        public function itsKeeper($email){
            //$user = $this->keeperDAO->getByEmail($email);
            $user = $this->keeperSQL->GetByEmail($email);
            $_SESSION["loggedUser"] = $user;

            $keeper= new Keeper();
            $keeper->setKeeper($user->getTypeUserOwner()->getKeeper());
            $keeper->setId($user->getTypeUserOwner()->getId());
            $keeper->setName($user->getTypeUserOwner()->getName());
            $keeper->setLastname($user->getTypeUserOwner()->getLastName());
            $keeper->setDni($user->getTypeUserOwner()->getDni());
            $keeper->setTuition($user->getTypeUserOwner()->getTuition());
            $keeper->setSex($user->getTypeUserOwner()->getSex());
            $keeper->setAge($user->getTypeUserOwner()->getAge());

            $keeper->setDateStart($user->getTypeUserOwner()->getDateStart());
            $keeper->setDateFinish($user->getTypeUserOwner()->getDateFinish());


            $this->InKeeper("Welcome", $keeper);
        }

        /// login de keeper
        public function InKeeper($keeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeperM=new KeeperController();
            $keeperM->setKeeperC($keeper);
            $keeperM->MenuKeeper();
        }


        //botones de registro o login
        public function LogIn(){
            require_once(VIEWS_PATH."index.php");
        }
        
        public function SignIn(){
            require_once(VIEWS_PATH."user-add.php");
        }
        
        public function GoFirstPage(){
            header('Location:../index.php');
        }
        public function Logout()
        {
            require_once(VIEWS_PATH."logout.php");
        } 
    }
?>