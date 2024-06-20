<?php

namespace DAO;
use \Exception as Exception;
use Models\Reserv as Reserv;
use DAO\IReservDAO as IReservDAO;

class ReservDAO implements IReservDAO{

    private $fileName = ROOT . "Data/reservs.json";
    private $reservList = array();

    public function Add($reserv){
        $this->RetrieveDataReserv();
        
        $reserv->setIdReserv($this->GetNextIdReserv());
        
        array_push($this->reservList,$reserv);

        $this->SaveDataReserv();

    }
    public function GetAllReserv()
    {
        $this->RetrieveDataReserv();
        return $this->reservList;
    }
    private function RetrieveDataReserv(){
        $this->reservList= array();
        if(file_exists($this->fileName)){
            $jsonToDecode=file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {
                $reserv=new Reserv();

                $reserv->setIdReserv($content["id"]);
                $reserv->setIdPet($content["idpet"]);
                $reserv->setIdKeeper($content["idkeeper"]);

                $reserv->setDateStart($content["dateStart"]);
                $reserv->setDateFinish($content["dateFinish"]);
                
                $reserv->setConfirm($content["confirm"]);
                $reserv->setPaid($content["paid"]);


                array_push($this->reservList,$reserv);
            }
        }
    }
    private function SaveDataReserv(){
        $arrayToEncode = array();
        foreach($this->reservList as $reserv){
            $valuesArray=array();
            $valuesArray["id"]=$reserv->getIdReserv();
            $valuesArray["idpet"]=$reserv->getIdPet();
            $valuesArray["idkeeper"] = $reserv->getIdKeeper();

            $valuesArray["dateStart"] = $reserv->getDateStart();
            $valuesArray["dateFinish"] = $reserv->getDateFinish();

            $valuesArray["confirm"] = $reserv->getConfirm();
            $valuesArray["paid"] = $reserv->getPaid();

            array_push($arrayToEncode, $valuesArray);
        }
        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }
    public function GetById($id){
        $this->RetrieveDataReserv();

        $aux = array_filter($this->reservList, function ($Reserv) use ($id) {
            return $Reserv->getIdReserv() == $id;
        });
    }
    private function GetNextIdReserv(){
        $id = 0;
        foreach ($this->reservList as $reserv) {
            $id = ($reserv->getIdReserv() > $id) ? $reserv->getIdReserv() : $id;
        }
        return $id + 1;
    }
}
?>