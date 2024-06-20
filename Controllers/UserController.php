<?php
    namespace Controllers;
    use Models\User as User;
    class UserController
    {
        private $aux;
        
        public function __construct()
        {
            $this->aux= new User();
            
        }
        
        public function NewUser($email,$password,$typeuser){
            if($typeuser=="Owner"){
                $this->aux->setEmail($email);
                $this->aux->setPassword($password);
                $this->NewUserOwner();
                
            }else{
                $this->aux->setEmail($email);
                $this->aux->setPassword($password);
                $this->NewUserKeeper();
            }
        }

        //Owners
        public function NewUserOwner()
        {
            require_once(VIEWS_PATH."new-owner.php");
            
        }
        ///Keepers
        public function NewUserKeeper()
        {
            require_once(VIEWS_PATH . "new-keeper.php");
        }

        private function GoHome()
        {
            header('Location:'.FRONT_ROOT. 'Home/GoFirstPage');
        }

        public function ConsultKeeper()
        {
            require_once(VIEWS_PATH . "owners\disp-keeper.php");
        }
        public function ReservtKeeper()
        {
            require_once(VIEWS_PATH . "owners\Reserv.php");
        }
    }
?>