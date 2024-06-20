<?php

namespace SQL;

use Models\Keeper as Keeper;
use Models\User as User;
use SQL\Connection as Connection;

interface IKeeperSQL
{
    function Add(User $user,Keeper $reserv);
    function GetAll();
}
