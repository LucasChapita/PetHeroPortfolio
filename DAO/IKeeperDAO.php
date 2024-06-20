<?php

namespace DAO;
use Models\Keeper as Keeper;

interface IKeeperDAO{
    function Add($user,$keeper);
    function GetAllKeepers();
}

?>