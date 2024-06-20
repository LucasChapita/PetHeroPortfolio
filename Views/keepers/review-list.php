<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\userDAO;
use Models\User;
use Models\Keeper;
use Models\Owner;
use SQL\KeeperSQL;
use SQL\OwnerSQL;
use SQL\ReviewSQL;
require_once("nav-keeper.php");

$userK = $_SESSION;
$keeper = new Keeper();
foreach ($userK as $user) {
    $keeper->setId($user->getId());
}

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <section id="listado" class="bg-dark text-white">
                <center>
                    <h2 class="mb-4 text-white"> Review List</h2>
                    <h6 class="mb-4 text-white"> List of reviews made by Keeper </h6>
            </section id="listado" class="mb-5">
            </center>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Stars</th>
                    <th>Comment</th>
                    <th>Name Owner</th>
                </thead>
                <tbody>
                    <?php

                    //$keeperDAO=new KeeperDAO();
                    //$user = new User();
                    //$keeperList = $keeperDAO->GetAllKeepers();
                    $reviewSQL = new ReviewSQL();
                    $reviewList = $reviewSQL->GetAll();
                    $ownerSQL = new OwnerSQL();
                    $owner=new User();
                    foreach ($reviewList as $review) { //ensi es un user
                        $owner = $ownerSQL->GetById($review->getId_Owner());
                        if ($keeper->getId() == $review->getId_Keeper()) {
                    ?>
                            <tr>
                                <td><?php echo $review->getReview() ?></td>
                                <td><?php echo $review->getComment() ?></td>
                                <td><?php echo $owner->getTypeUserOwner()->getName() ?></td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>