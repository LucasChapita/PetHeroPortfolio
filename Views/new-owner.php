<?php
require_once('nav-new-user.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
    <center>  <div class="container">
 <section id="listado" class=" bg-dark text-white"> 
            <h2 class="mb-3 text-white">  Complete your data!</h1>  </section id="listado" class="mb-5">
            
            <center>
            <form action="<?php echo FRONT_ROOT . "Owner/RegisterOwner"  ?>" method="POST" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group bg-dark text-white center">
                            <input type="hidden" name="email" value="<?php echo $this->aux->getEmail() ?>">
                            <input type="hidden" name="password" value="<?php echo $this->aux->getPassword() ?>">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" require>

                            <label for="">Last Name</label>
                            <input type="text" name="lastname" class="form-control" require>

                            <label for="">DNI</label>
                            <input type="number" name="dni" class="form-control" require>
                        </div>
                        <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
</main>
<?php
require_once(VIEWS_PATH."footer.php");
?>