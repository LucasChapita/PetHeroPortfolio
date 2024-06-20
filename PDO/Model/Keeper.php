<?php
///dependiendo de si el usuario es owner y tambien keeper tengo hasta este momento 2 opciones
/// 1. reservar el ide de keeper para su posterior "uso"
/// 2. borrar todo a la mrd y hacer todo de nuevo 
namespace Models;

class Keeper{
    
    private $name;
	private $lastname;
	private $photo;
	private $DNI;
	private $tuition;
	private $sex;
	private $age;
    private $id;
    
    private $keeper;

    private $date;
    private $dateS;
    private $dateF;
    private $numbersofpets;
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }
    public function setTuition($tuition)
    {
        $this->tuition = $tuition;
    }
    public function setSex($sex)
    {
        $this->sex = $sex;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setKeeper($keeper){
        $this->keeper=$keeper;
    }
    
    

    public function setDate($date){
        $this->date=$date;
    }    
    public function setNumbersofpets($numbersofpets){
        $this->numbersofpets=$numbersofpets;
    }

    

    public function setDateStart($dateS)
    {
        $this->dateS = $dateS;
    }
    public function setDateFinish($dateF)
    {
        $this->dateF = $dateF;
    }    

    
    public function getName()
    {
        return $this->name;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getDNI()
    {
        return $this->DNI;
    }
    public function getTuition()
    {
        return $this->tuition;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getId(){
        return $this->id;
    }
    public function getKeeper(){
        return $this->keeper;
    }

    
    public function getDate()
    {
        return $this->date;
    }
    public function getNumbersofpets()
    {
        return $this->numbersofpets;
    }


    public function getDateStart()
    {
        return $this->dateS;
    }
    public function getDateFinish()
    {
        return $this->dateF;
    }

}

?>