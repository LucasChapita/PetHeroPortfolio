<?php
namespace Models;
use Models\Owner as Owner;

class Pet{

	private $photo;
	private $id;
	private $name;
	private $vaccinationSchedule;
	private $race;
	private $video;
	private $sizePet;

	private $ownerID;
	private $owner;

	
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





	public function getPhoto()
	{
		return $this->photo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getVaccinationSchedule()
	{
		return $this->vaccinationSchedule;
	}
	public function getRace()
	{
		return $this->race;
	}
	public function getVideo()
	{
		return $this->video;
    }
	public function getSizePet()
	{
		return $this->sizePet;
	}
	
	
	public function setPhoto($photo)
	{
		$this->photo = $photo;
	} 
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function setVaccinationSchedule($vaccinationSchedule)
	{
		$this->vaccinationSchedule = $vaccinationSchedule;
	}
	public function setRace($race)
	{
		$this->race = $race;
	}
	public function setVideo($video)
	{
		$this->video = $video;
	}
	public function setSizePet($sizePet)
	{
		$this->sizePet = $sizePet;
	}
}
?> 