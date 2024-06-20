<?php
require_once('nav-new-user.php');
?>
 <main class="py-5">
 <section id="listado" class="mb-5">
 <center>  <div class="container">
 <section id="listado" class=" bg-dark text-white"> 
      <h2 class="mb-3 text-white">  Complete your data!</h1>  </section id="listado" class="mb-5">
       <center><form action="<?php echo FRONT_ROOT . "User/NewUser" ?>" method="POST" class="bg-light-alpha p-5">
 <div class="row">
                  <div class="col-lg-5 center">
                       <div class="form-group bg-dark text-white center" >
                  <label for="" >Email</label> 
                            <input type="text" name="email" class="form-control" required>

                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>

                            <label>Select User Type</label>
                            <select name="typeuser" class="form-control">
                                <option value="Owner" required>Owner</option>
                                <option value="Keeper" required>Keeper</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button> 
                    </div>   
                    
            </form> </center> 
        </div>
    </section> 
     </div>      </center>    
</main> 
<?php
require_once(VIEWS_PATH . "footer.php");
?>