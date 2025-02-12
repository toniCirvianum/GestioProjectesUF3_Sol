<!-- Inici show.view.php vista
Vista per mostrar info de un  projectes -->
<?php
$project = $params['project'];
$owner = $params['owner']; // Propietari del projecte
switch ($project['estat']) {
    case 0:
        $estat = 'Per començar';
        break;
    case 1:
        $estat = 'En procés';
        break;
    case 2:
        $estat = 'Completat';
        break;
}

?>
<div class="col-11 col-md-9 col-lg-7 col-xl-5 mx-auto border p-4 bg-light mt-4">
    <h2 class="text-success text-center">Informació del Projecte: <?php echo $project['nom']; ?></h2>
    <hr>
    <form action="/project/edit/<?php echo $project['id']; ?>" method="POST">

        <div class="mb-3">
            <label for="descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="descripcio" name="descripcio" rows="3" readonly><?php echo $project['descripcio']; ?></textarea>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $project['id']; ?>" >

        </div>
        <div class="mb-3">
            <label for="data_inici" class="form-label">Data Inici</label>
            <input type="date" class="form-control" id="data_inici" name="data_inici" value="<?php echo $project['data_inici']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="data_fi" class="form-label">Data Fi</label>
            <input type="date" class="form-control" id="data_fi" name="data_fi" value="<?php echo $project['data_fi']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="estat" class="form-label">Estat</label>
            <input type="text" class="form-control"value="<?php echo $estat; ?>" readonly>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Editar
            </button>
            <a href="/project/showProjects" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Tornar
            </a>
        </div>
    </form>
</div>