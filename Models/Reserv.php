<?php

namespace Models;

class Reserv{

    private $idReserv;
    private $idPet;
    private $idKeeper;

    private $dateStart;
    private $dateFinish;

    private $confirm=null;
    private $paid=null;
    
    
    public function getIdReserv()
    {
        return $this->idReserv;
    }
    public function setIdReserv($idReserv)
    {
        $this->idReserv = $idReserv;
    }
    
    public function getIdPet()
    {
        return $this->idPet;
    }
    public function setIdPet($idPet)
    {
        $this->idPet = $idPet;
    }

    public function getIdKeeper()
    {
        return $this->idKeeper;
    }
    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;
    }
    
    

    public function getDateStart()
    {
        return $this->dateStart;
    }
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    public function getDateFinish()
    {
        return $this->dateFinish;
    }
    public function setDateFinish($dateFinish)
    {
        $this->dateFinish = $dateFinish;
    }

    public function getConfirm()
    {
        return $this->confirm;
    }
    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;

    }
 
    public function getPaid()
    {
        return $this->paid;
    }
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }
}
?>