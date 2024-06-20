<?php

namespace SQL;

use Models\Pet as Pet;
use Models\User as User;
use Models\Owner as Owner;
use Models\Review;
use SQL\Connection as Connection;

interface IReviewSQL{
    function Add(Review $review);
    function GetAll();
}
?>