<?php
// Evitar que se muestren las advertencias
error_reporting(E_ALL & ~E_NOTICE);

require_once(VIEWS_PATH . "nav.php");

use Models\Reserv as Reserv;
use DAO\ReservDAO as ReservDAO;
use Models\Owner as Owner;
use DAO\KeeperDAO as KeeperDAO;
use SQL\KeeperSQL as KeeperSQL;
use Models\Pet;
use SQL\PetSQL;
use SQL\ReservSQL;

// Obtener la sesión del usuario
$userArr = $_SESSION;

// Obtener el id del propietario de la sesión
foreach ($userArr as $user) {
    $owner = new Owner();
    $owner->setId($user->getId());
}

// Obtener la lista de mascotas del propietario
$petSQL = new PetSQL();
$petList = $petSQL->GetPetByOwnerId($owner->getId());

// Obtener el guardián por su id
$keeperSQL = new KeeperSQL();
$keeper = $keeperSQL->GetById($idKeeper);

?><center>
    <main>
        <section id="agregar" class="mb-7">
            <form action="<?php echo FRONT_ROOT . "Reserv/Add" ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
                <?php
                // Filtrar las mascotas del propietario según el tamaño del guardián
                $petsss = array();
                foreach ($petList as $pet) {
                    if ($pet->getSizePet() == $keeper->getTypeUserKeeper()->getSizePet()) {
                        array_push($petsss, $pet);
                    }
                }

                // Obtener las reservas del guardián
                $reservSQL = new ReservSQL();
                $reservList = $reservSQL->GetReservbyIdKeeper($idKeeper);

                // Verificar si el propietario tiene mascotas para este guardián
                if ($petsss == null) {
                    echo "<script> alert('You have no Pets for this Keeper'); </script>";
                    require_once(VIEWS_PATH . "owners/menu-owner.php");
                } else {
                ?>
                    <h4> Select your pet </h4>
                    <select name="idPet" class="form-control">
                        <?php
                        foreach ($petList as $pet) {
                            if ($pet->getSizePet() == $keeper->getTypeUserKeeper()->getSizePet()) {
                                echo "<option value=" . $pet->getId() . " required>" . $pet->getName() . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <label.colorNegro> Enter the dates between you want to make your reservation</label><br>
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date Started</th>
                                    <th>Date Finish</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    // Verificar si hay reservas para el guardián
                                    if ($reservList == null) {
                                    ?>
                                        <td>
                                            <input type="date" name="dateStart" min="<?php echo $keeper->getTypeUserKeeper()->getDateStart(); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="START" required>
                                        </td>
                                        <td>
                                            <input type="date" name="dateFinish" min="<?php echo date('Y-m-d', strtotime($keeper->getTypeUserKeeper()->getDateStart() . "+1 day")); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="FINISH" required>
                                        </td>
                                        <?php
                                    } else {
                                        // Calcular fechas disponibles para reservar
                                        $fechasKeeper = array();
                                        for (
                                            $i = $keeper->getTypeUserKeeper()->getDateStart();
                                            $i <= $keeper->getTypeUserKeeper()->getDateFinish();
                                            $i = date("Y-m-d", strtotime($i . "+ 1 days"))
                                        ) {
                                            array_push($fechasKeeper, $i);
                                        }

                                        $reservas = array();
                                        foreach ($reservList as $reserv) {
                                            for (
                                                $i = $reserv->getDateStart();
                                                $i <= $reserv->getDateFinish();
                                                $i = date("Y-m-d", strtotime($i . "+ 1 days"))
                                            ) {
                                                array_push($reservas, $i);
                                            }
                                        }

                                        $libres = array_diff($fechasKeeper, $reservas);
                                        $aceptados = array();
                                        $unaVez = 0;

                                        if ($libres != null) {
                                            foreach ($libres as $key => $ace) {
                                                if ($ace == $libres[$key] && $unaVez == 0) {
                                                    array_push($aceptados, $libres[$key]);
                                                } else {
                                                    $unaVez = 1;
                                                }
                                            }

                                            if ($aceptados != null) {
                                                $min = min($aceptados);
                                                $max = max($aceptados);
                                        ?>
                                                <td>
                                                    <input type="date" name="dateStart" min="<?php echo $min; ?>" max="<?php echo $max; ?>" placeholder="START" required>
                                                </td>
                                                <td>
                                                    <input type="date" name="dateFinish" min="<?php echo $min; ?>" max="<?php echo $max; ?>" placeholder="FINISH" required>
                                                </td>
                                            <?php
                                            }
                                        } else {
                                            // No hay fechas disponibles para reservar
                                            ?>
                                            <td colspan="2">No available dates</td>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <input type="hidden" name="idKeeper" value="<?php echo $idKeeper ?>">
                            <input type="hidden" name="idOwner" value="<?php echo $owner->getId() ?>">
                            
                            <input type="submit" class="btn" value="Add Stay" style="background-color:#DC8E47;color:white;" />
                        </div>
            </form>
        <?php
                }
        ?>
        </section>
    </main>
</center>
<?php
require_once(VIEWS_PATH . "footer.php");
?>