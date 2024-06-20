<?php

namespace SQL;

use Models\Reserv as Reserv;
use SQL\Connection as Connection;

interface IReservSQL
{
    function Add(Reserv $reserv);
    function GetAll();
}
?>