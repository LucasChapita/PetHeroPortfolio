<main class="d-flex align-items-center justify-content-center height-100">
     <center>
          <div class="content">
               <header class="text-center">
                    <a href="https://ibb.co/ZhRSMWv"><img src="https://i.ibb.co/THD1gmJ/Solo-Travel-Guide-1.png" alt="Solo-Travel-Guide-1" border="0"></a>
                    <section id="listado" class=" bg-dark text-white">
                         <h3 class="mb-3 text-dark"> . </h3>
                    </section id="listado" class="mb-5">

               </header>
               <form action="<?php echo FRONT_ROOT . "Home/EnterUser" ?>" method="POST" class="login-form bg-dark-alpha p-5 bg-light">
                    <div class="form-group">
                         <label for="">Email</label>
                         <input type="text" name="email" class="form-control form-control-lg" placeholder="Enter User" required>
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" required>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg bg-dark" type="submit">Iniciar Sesión</button>
               </form>
          </div>
     </center>
</main>