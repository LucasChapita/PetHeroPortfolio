<?php
namespace Models;
use Models\Owner as Owner;

class Pet{

	private $foto;
	private $id;
	private $name;
	private $vaccinationSchedule;
	private $raza;
	private $video;

	private $ownerID;

	private $owner;

	public function setFoto($foto){
		$this->foto=$foto;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function setName($name){
		$this->name=$name;
	}
	public function setVaccinationSchedule($vaccinationSchedule){
		$this->vaccinationSchedule= $vaccinationSchedule;
	}
	public function setRaza($raza){
		$this->raza=$raza;
	}
	public function setVideo($video){
		$this->video=$video;
	}

	public function getFoto(){
		return $this->foto;
	}
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getVaccinationSchedule(){
		return $this->vaccinationSchedule;
	}
	public function getRaza(){
		return $this->raza;
	}
	public function getVideo(){
		return $this->video;
	}

	/* setear dueño */
	public function getOwneR(){
		return $this->owner;
	}
	public function setOwneR(Owner $owner){
		$this->owner=$owner;
	}
	/*set id del dueño en pet */
	public function getOwnerID()
	{
		return $this->ownerID;
	}
	public function setOwnerID($ownerID)
	{
		$this->ownerID = $ownerID;
	}
}
?> 