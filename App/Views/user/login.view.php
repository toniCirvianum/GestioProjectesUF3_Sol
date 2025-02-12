<!-- Inici login.view.php vista
Vista per fer login -->
<div class="signin col-11 col-md-9 col-lg-7 col-xl-5 mx-auto border p-4 bg-light mt-4">
    <form action="/user/login/" method="post">
        <h2 class="text-success">Login</h2>

        <div class="mb-3">
            <label for="username" class="form-label">Nom Usuari</label><br>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Nomes lletres,en minuscules i un mínim de 4">
            
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="text" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="Ha de contenir majuscules, minuscules i un mínim de 8 caracters">
            
        </div>
        <?php

        if (isset($params['message'])) {
            echo "<div class='alert alert-danger mt-y' role='alert'>";
            echo $params['message'];
            echo "</div>";
            unset($params);
        }

        ?>
        <button type="submit" class="btn btn-primary">Login</button>
        


    </form>
</div>
<script>
    setTimeout(function() {
        let alertBox = document.querySelector('.alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
</script>
