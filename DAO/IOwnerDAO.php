<?php

namespace DAO;
use Models\Owner as Owner;

interface IOwnerDAO{
    function Add($user,$owner);
    function GetAllOwner();
}

?>