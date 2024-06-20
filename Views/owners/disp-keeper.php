<?php
///esto lo hace el owner
require_once(VIEWS_PATH . "validate-session.php");

use DAO\ReservDAO;
use DAO\KeeperDAO;
use SQL\KeeperSQL;
use DAO\UserDAO;

use Models\User;
use Models\Keeper;
use Models\Reserv;

require_once(VIEWS_PATH . "nav.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <section id="listado" class="bg-dark text-white">
                    <center>
                         <h2 class="mb-4 text-white"> Keepers available between 2 dates</h2>
                         <h6 class="mb-4 text-white"> Keepers appear in them availability date range </h6>
               </section id="listado" class="mb-5">
               </center>
               <table class="table bg-light text-center">
                    <thead class="bg-dark text-white">
                         <th>Name</th>
                         <th>Lastname</th>
                         <th>Photo</th>
                         <th>DNI</th>
                         <th>Tuition</th>
                         <th>Sex</th>
                         <th>Age</th>
                         <th>Size Pet</th>
                         <th>Date Start</th>
                         <th>Date Finish</th>


                    <tbody>
                         <form method="post">
                              <center>
                                   <label>
                                        <h5 class="mb-4 text-dark">Add first Date: </5>
                                   </label>
                                   <input type="date" name=start required>
                                   <label>
                                        <h5 class="mb-4 text-dark">Add finish Date: </5>
                                   </label>
                                   <input type="date" name="finish" required>
                                   <button type="submit" >Consultar</button>
                              </center>
                         </form>
                         <?php

                         error_reporting(E_ALL ^ E_NOTICE);
                         $start = isset($_POST['start']) ? $_POST['start'] : '';
                         $finish = isset($_POST['finish']) ? $_POST['finish'] : '';





                         $keeperSQL = new KeeperSQL();
                         //$keeper = new Keeper();
                         $keeperList = $keeperSQL->GetAll();
                         //
                         //private $start; /* Se ingresa primer fecha por teclado*/
                         //private $finish;  /* Se ingresa segunda  fecha por teclado*/
                         //
                         ///owner,keeper,idReserva idPerroAsociadoAlKeeper
                         if ($start != null) {
                              if ($start < $finish) {
                                   foreach ($keeperList as $keeper) {
                                        //var_dump($keeper);
                                        if ((($keeper->getTypeUserKeeper()->getDateStart()) &&  ($keeper->getTypeUserKeeper()->getDateFinish())) != null) {
                                             if ((($start >=  $keeper->getTypeUserKeeper()->getDateStart() && $finish <= $keeper->getTypeUserKeeper()->getDateFinish())) ||
                                                  (($start <= $keeper->getTypeUserKeeper()->getDateStart() && $finish >= $keeper->getTypeUserKeeper()->getDateFinish()))
                                             ) {

                         ?>
                                                  <tr>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getName() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getLastname() ?></td>
                                                       <td><img src="<?php echo $keeper->getTypeUserKeeper()->getPhoto() ?>" width="70" height="70"></td>

                                                       <td><?php echo $keeper->getTypeUserKeeper()->getDNI() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getTuition() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getSex() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getAge() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getSizePet() ?></td>

                                                       <td><?php echo $keeper->getTypeUserKeeper()->getDateStart() ?></td>
                                                       <td><?php echo $keeper->getTypeUserKeeper()->getDateFinish() ?></td>



                                                  </tr>
                         <?php
                                             }
                                        }
                                   }
                              } else {
                                   echo "<script> alert('Enter the date correctly. The START date must be less than the FINISH date'); </script>";
                              }
                         }
                         unset($start);
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>