<?php

namespace SQL;

use Models\Pet as Pet;
use Models\User as User;
use Models\Owner as Owner;
use SQL\Connection as Connection;

interface IPetSQL{
    function Add(Owner $user,Pet $pet);
    function GetAll();
} 


?>