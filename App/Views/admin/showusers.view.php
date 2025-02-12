<!-- Inici showusers.view.php vista
Vista per admin per mostrar  usuaris -->
<div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto border p-4 bg-light mt-4 text-center">
    <br>
    <h2 class="text-success">Usuaris de l'aplicació </h2>
    <hr>
    <br>
    <?php
    if (isset($params['message'])) {
        echo "<div class='alert alert-success mt-y' role='alert'>";
        echo $params['message'];
        echo "</div>";
        unset($params['message']);
        unset($_SESSION['message']);
    }
    ?>
    <br>
    <div class="container">
        <div class="row">
            <?php foreach ($params['users'] as $index => $user): ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-header bg-secondary text-white font-weight-bold">
                            <h5 class="card-title"><?php echo $user['nom'] . " " . $user['cognom']; ?></h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rol: <?php echo $user['admin'] ? 'admin' : 'usuari'; ?></li>
                        </ul>
                        <div class="d-flex justify-content-center gap-2 p-2">
                            <form action="/admin/promote" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" hidden>
                                <button class="btn btn-success" title="promoure a admin">
                                    <i class="bi bi-person-plus"></i>
                                </button>
                            </form>
                            <form action="/admin/showuser" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" hidden>
                                <button class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </form>
                            <form action="/admin/deleteuser" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" hidden>
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <img src="/app/Views/images/logo.png" alt="logo institut" class="mx-auto">
    <br><br>
    <hr>
    <p>@Toni Fernandez 2025</p>
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