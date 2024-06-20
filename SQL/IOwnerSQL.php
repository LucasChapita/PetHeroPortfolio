<?php

namespace SQL;
use Models\User as User;
use Models\Owner as Owner;
use SQL\Connection as Connection;

interface IOwnerSQL{
    function Add(User $user,Owner $owner);
    function GetByEmail($email);
}