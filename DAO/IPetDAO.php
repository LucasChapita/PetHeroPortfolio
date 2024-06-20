<?php

namespace DAO;
use Models\User as User;

interface IPetDAO{
    function Add($pet);
    function GetAllPets();
}

?>