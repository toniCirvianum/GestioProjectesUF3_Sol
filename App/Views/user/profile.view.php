<!-- Inici profile.view.php vista
Vista per veure el perfil -->
<div class="signin col-11 col-md-9 col-lg-7 col-xl-5 mx-auto border p-4 bg-light mt-4">
    <form action="/user/editProfile/" method="post">
        <h2 class="text-success">Profile</h2>
        <?php
        if (isset($params['message'])) {
            echo "<div class='alert alert-danger mt-y' role='alert'>";
            echo $params['message'];
            echo "</div>";
            unset($params['message']);
        }
        if (isset($params['user_logged'])) {
            $nom = $params['user_logged']['nom'];
            $username = $params['user_logged']['username'];
            $cognom = $params['user_logged']['cognom'];
            $password = $params['user_logged']['password'];
        }
        ?>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom </label><br>
            <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" placeholder=""
            value="<?php echo isset($nom) ? $nom : "";?>">
        </div>
        <div class="mb-3">
            <label for="cognom" class="form-label">Cognom </label><br>
            <input type="text" class="form-control" name="cognom" id="cognom" aria-describedby="helpId" placeholder=""
            value="<?php echo isset($cognom) ? $cognom : "";?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nom usuari </label><br>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder=""
            value="<?php echo isset($username) ? $username : "";?>">
            <small id="helpId" class="form-text text-muted">Només minuscules i ha de tenir un mínim de 4 caraters</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password </label><br>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder=""
            value="<?php echo isset($password) ? $password : "";?>">
            <small id="helpId" class="form-text text-muted">Majuscules i minuscules i un mínim de 8 caracters</small>
        </div>

        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" aria-describedby="helpId" placeholder=""
            value="<?php echo isset($password) ? $password : "";?>">
            <small id="helpId" class="form-text text-muted">Majuscules i minuscules i un mínim de 8 caracters</small>
            
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
       


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