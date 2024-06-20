<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\userDAO;
use Models\User;
use Models\Keeper;
use Models\Owner;
use Models\Reserv as Reserv;
use DAO\ReservDAO;
use SQL\ReservSQL;

require_once(VIEWS_PATH . "nav.php");
$userArr = $_SESSION;
foreach ($userArr as $user) {
    $owner = new Owner();
    $owner->setId($user->getId());
}
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <section id="listado" class="bg-dark text-white">
                <center>
                    <h2 class="mb-4 text-white"> Reserv List</h2>
                    <h6 class="mb-4 text-white"> If your reservation does not appear, it still requires confirmation from the keeper </h6>
            </section id="listado" class="mb-5">
            </center>
            <table class="table bg-light text-center">

                <table class="table bg-light text-center">
                    <thead class="bg-dark text-white">
                        <th>Id Reserva</th>
                        <th>Id Pet</th>
                        <th>Id Keeper</th>
                        <th>Date Start</th>
                        <th>Date Finish</th>
                        <th>Cupon</th>

                    </thead>
                    <tbody>
                        <?php

                        //$ReservDAO=new ReservDAO();
                        //$reserv = new Reserv();
                        //$reservList = $ReservDAO->GetAll();
                        $reservSQL = new ReservSQL();
                        $reserv = new Reserv();
                        $reservList = $reservSQL->GetPetByOwnerId($owner->getId());
                        //var_dump($reservList);
                        foreach ($reservList as $reserv) {
                            //var_dump($reserv);
                            if (($reserv->getConfirm() && $reserv->getPaid()) == 1) {

                        ?>
                                <tr>
                                    <td><?php echo $reserv->getIdReserv(); ?></td>
                                    <td><?php echo $reserv->getIdPet(); ?></td>
                                    <td><?php echo $reserv->getIdKeeper(); ?></td>
                                    <td><?php echo $reserv->getDateStart(); ?></td>
                                    <td><?php echo $reserv->getDateFinish(); ?></td>
                                    <td><?php echo "PAID"; ?></td>


                                </tr>

                            <?php
                            } elseif ($reserv->getConfirm()==1 && $reserv->getPaid()==0) {
                            ?>
                                <tr>
                                    <td><?php echo $reserv->getIdReserv(); ?></td>
                                    <td><?php echo $reserv->getIdPet(); ?></td>
                                    <td><?php echo $reserv->getIdKeeper(); ?></td>
                                    <td><?php echo $reserv->getDateStart(); ?></td>
                                    <td><?php echo $reserv->getDateFinish(); ?></td>
                                    <form action="<?php echo FRONT_ROOT . "Reserv/GenerateCoupon" ?>" method="POST">
                                        <!-- datos del cupon -->
                                        <input type="hidden" name="id_Reserv" value="<?php echo $reserv->getIdReserv(); ?>">
                                        <td> <button type="submit" name="reservar" value="reservar">Generate Coupon</button></td>
                                    </form>
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