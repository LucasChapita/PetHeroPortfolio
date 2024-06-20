<main class="d-flex align-items-center justify-content-center height-100">
    <center>
    <div class="content">
        <header class="text-center">
            <a href="https://ibb.co/SstNKWf"><img src="https://i.ibb.co/M2cnRWB/pet-png.png" alt="pet-png" border="0"></a>
            <section id="listado" class=" bg-dark text-white"> 
            <h2 class="mb-3 text-dark">.</h1>  </section id="listado" class="mb-5">
        </header>
        <form action="<?php echo FRONT_ROOT . "Home/itsOwner" ?>" method="POST" class="login-form bg-dark-alpha p-5 bg-light">
        <!-- pasa el owner -->
        
        <input type="hidden" name="email" value="<?php echo $this->isOwner->getEmail() ?>">
        <button name="owner" class="btn btn-dark btn-block btn-lg">
            Owner
        </button>
    </form>
    <form action="<?php echo FRONT_ROOT . "Home/itsKeeper" ?>" class="login-form bg-dark-alpha p-5 bg-light">
    
    <input type="hidden" name="email" value="<?php echo $this->isKeeper->getEmail() ?>">
    <button name="keeper" class="btn btn-dark btn-block btn-lg">
        Keeper
    </button>
</form>
</div>
</center> 
</main>