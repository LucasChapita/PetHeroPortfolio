<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\userDAO;
use Models\User;
use Models\Keeper;
use Models\Owner;
use Models\Reserv as Reserv;
use DAO\ReservDAO;
use SQL\ReservSQL as ReservSQL;

require_once(VIEWS_PATH . "nav.php");

?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <section id="listado" class="bg-dark text-white">
                <center>
                    <h2 class="mb-4 text-white"> List of own reservations:</h2>
                    <h6 class="mb-4 text-white">
                        Here you can see your list of reservations that has been paid and confirmed</h6>
            </section id="listado" class="mb-5">
            </center>


            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Id Reserva</th>
                    <th>Id Pet</th>
                    <th>Id Keeper</th>
                    <th>Date Start</th>
                    <th>Date Finish</th>
                    <th>Confirm</th>
                    <th>Paid</th>
                </thead>
                <tbody>
                    <?php

                    $userMenu = new User();
                    $userArr = $_SESSION;
                    foreach ($userArr as $user) {
                        $userMenu->setEmail($user->getEmail());
                        $userMenu->setPassword($user->getPassword());
                        $userMenu->setId($user->getId());
                    }
                    //echo $userMenu->getId();
                    //$ReservDAO = new ReservDAO();
                    //$reserv = new Reserv();
                    //$reservList = $ReservDAO->GetAll();


                    $reservSQL = new ReservSQL();
                    $reserv = new Reserv();
                    $reservList = $reservSQL->GetPetByOwnerId($user->getId());

                    //var_dump($reservList);

                    foreach ($reservList as $reserv) {
                        if(($reserv->getConfirm() && $reserv->getPaid())==1){
                           
                                    ?>
                                <tr>
                                    <td><?php echo $reserv->getIdReserv(); ?></td>
                                    <td><?php echo $reserv->getIdPet(); ?></td>
                                    <td><?php echo $reserv->getIdKeeper(); ?></td>
                                    <td><?php echo $reserv->getDateStart(); ?></td>
                                    <td><?php echo $reserv->getDateFinish(); ?></td>
                                    <td>
                                        <?php
                                        if ($reserv->getConfirm() == 1) {
                                            echo "Confirmed";
                                        } else {
                                            echo "UnConfirmed";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($reserv->getPaid() == 1) {
                                            echo "Paid";
                                        } else {
                                            echo "Not Paid";
                                        }
                                        ?>
                                    </td>
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