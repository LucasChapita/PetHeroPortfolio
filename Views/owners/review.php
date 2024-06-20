
<main class="d-flex align-items-center justify-content-center height-100">
    <center>
        <div class="content">
            <header class="text-center">
                <a href="https://ibb.co/SstNKWf"><img src="https://i.ibb.co/M2cnRWB/pet-png.png" alt="pet-png" border="0"></a>
                <section id="listado" class=" bg-dark text-white">
                    <h2 class="mb-3 text-dark">.</h1>
                </section id="listado" class="mb-5">
            </header>
            <form action="<?php echo FRONT_ROOT . "Keeper/Reviews" ?>" class="login-form bg-dark-alpha p-5 bg-light">
                <input type="hidden" name="id_Keeper" value="<?php echo $id_Keeper ?>">
                <input type="hidden" name="id_Owner " value="<?php echo $id_Owner ?>">
                
                <input type="radio" name="review" value="Terrible">Terrible
                <input type="radio" name="review" value="Bad">Bad
                <input type="radio" name="review" value="Regular" checked>Regular
                <input type="radio" name="review" value="Good">Good
                <input type="radio" name="review" value="Excelent">Excelent<br>

                <textarea name="comments" cols="30" rows="3">Comment</textarea>
                <button type="submit" name="create" class="btn btn-dark btn-block btn-lg">
                    Create Review
                </button>
            </form>
        </div>
    </center>
</main>