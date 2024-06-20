<?php
namespace DAO;
use Models\Reserv as Reserv;


interface IReservDAO{
    function Add($reserv);
    function GetAllReserv();
}

?>