<?php
require_once("nav-keeper.php");

use DAO\KeeperDAO;
use Models\User;
use Models\Keeper;
use SQL\KeeperSQL;

//$keeperDAO=new KeeperDAO();
$keeperSQL=new KeeperSQL();
$userMenu = new User();
$userArr = $_SESSION;

foreach ($userArr as $user) {
    $userMenu->setEmail($user->getEmail());
    $userMenu->setPassword($user->getPassword());
    $userMenu->setId($user->getId());
    
}
//$keeper=$keeperDAO->getByEmail($userMenu->getEmail());
$keeper=$keeperSQL->GetByEmail($userMenu->getEmail());

//var_dump($keeper);



?>
<main class="py-5">
<section id="listado" class="mb-5">
    <center> <a href="https://ibb.co/92W3M5w"><img src="https://i.ibb.co/L61hG7Q/Solo-Travel-Guide-2.png" alt="Solo-Travel-Guide-2" border="0"></a></center> 
        <div class="container">

            <section id="listado" class="bg-dark text-white"> <center> 
              </section id="listado" class="mb-5">
              <br>
</center>  
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Email</th>
                    <th>Password</th>
                    <th>ID</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $userMenu->getEmail() ?></td>
                        <td><?php echo $userMenu->getPassword() ?></td>
                        <td><?php echo $userMenu->getId() ?></td>
                </tbody>
                <thead class="bg-dark text-white">
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Photo</th>
                    <tbody>
                    <tr>
                        <td><?php echo $keeper->getTypeUserKeeper()->getName() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getLastname() ?></td>
                        <td><img src="<?php echo $keeper->getTypeUserKeeper()->getPhoto()?>" width="200" height="200"></td></tr>
                        </tbody> 
                    <thead class="bg-dark text-white">
                    <th>DNi</th>
                    <th>Tuition</th>
                    <th>Sex</th>
                    </thead>  <tr>
                        <tbody>
                        <td><?php echo $keeper->getTypeUserKeeper()->getDNI() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getTuition() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getSex() ?></td>
                        
                </tbody> 
                <thead class="bg-dark text-white">
                    <th>Age</th>
                    <th>Date Stays Started</th>
                    <th>Date Stays Finished</th>
                </thead>
                <tbody> <tr>
                    <td><?php echo $keeper->getTypeUserKeeper()->getAge() ?></td> 
                        <td><?php echo $keeper->getTypeUserKeeper()->getDateStart() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getDateFinish() ?></td>
               </tr> </tbody>
            </table>
        </div>
    </section>
</main>
<?php
    require_once(VIEWS_PATH."footer.php");
?>