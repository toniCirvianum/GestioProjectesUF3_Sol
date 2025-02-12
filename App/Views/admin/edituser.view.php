<!-- Inici edituser.view.php vista
Vista per admin per editar usuaris -->
<div class="signin col-12 col-md-10 col-lg-8 col-xl-6 mx-auto border p-4 bg-light mt-4">
    <form action="/admin/storeuser" method="post">
        <h2 class="text-success">Edit User</h2>
        <?php
        if (isset($params['message'])) {
            echo "<div class='alert alert-danger mt-y' role='alert'>";
            echo $params['message'];
            echo "</div>";
            unset($params['message']);
            unset($_SESSION['message']);
        }
        if (isset($params['user'])) {
            $id = $params['user']['id'];
            $nom = $params['user']['nom'];
            $username = $params['user']['username'];
            $cognom = $params['user']['cognom'];
            $password = $params['user']['password'];
            unset($params['user']);
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
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