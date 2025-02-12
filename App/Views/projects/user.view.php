<!-- Inici user.view.php vista
Vista per usuaris logejats,es veuen tots els projectes -->
<?php
$nom = $params['user_logged']['nom'];
$cognom = $params['user_logged']['cognom'];

?>
<div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto border p-4 bg-light mt-4 text-center">
    <br>
    <h2 class="text-success">Projectes de l'usuari: <?php echo $nom . " " . $cognom ?> </h2>
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
            <?php foreach ($params['projects'] as $index => $project): ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-header bg-secondary text-white font-weight-bold">
                            <h5 class="card-title" style="min-height: 3em; line-height: 1.5em; overflow: hidden;"><?php echo $project['nom']; ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-title font-bold"><b>Descripció:</b></p>
                            <p class="card-text" style="min-height: 4.5em; line-height: 1.5em; overflow: hidden;"> <?php echo $project["descripcio"]; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Data inici: <?php echo $project["data_inici"]; ?></li>
                            <li class="list-group-item">Data fi: <?php echo $project["data_fi"]; ?></li>
                        </ul>
                        <div class="d-flex justify-content-center gap-2 p-2">
                            <a href="/project/show/<?php echo $project['id']; ?>" class="btn btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="/project/edit/<?php echo $project['id']; ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="/project/delete/" method="POST">
                                <input type="hidden" name="id" value="<?php echo $project['id']; ?>" hidden>
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