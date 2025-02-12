<!-- Inici create.view.php vista
Vista per crear projectes -->
<?php

$owner = $params['owner']; // Propietari del projecte
$estat_labels = [
    0 => 'Per començar',
    1 => 'En procés',
    2 => 'Completat'
];

?>
<div class="col-11 col-md-9 col-lg-7 col-xl-5 mx-auto border p-4 bg-light mt-4">
    <h2 class="text-success text-center">Edició del Projecte: <?php echo $owner ?></h2>
    <hr>
    <form action="/project/create" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input class="form-control" id="nom" name="nom" rows="3"  required>
        </div>
        <div class="mb-3">
            <label for="descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="descripcio" name="descripcio" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="data_inici" class="form-label">Data Inici</label>
            <input type="date" class="form-control" id="data_inici" name="data_inici"  required>
        </div>
        <div class="mb-3">
            <label for="data_fi" class="form-label">Data Fi</label>
            <input type="date" class="form-control" id="data_fi" name="data_fi"  required>
        </div>

        <div class="mb-3">
            <label for="estat" class="form-label">Estat</label>
            <select class="form-control" id="estat" name="estat">
            <?php foreach ($estat_labels as $key => $label): ?>
                <option value="<?php echo $key; ?>" >
                    <?php echo $label; ?>
                </option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Desar
            </button>
            <a href="/project/showProjects" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Tornar
            </a>
        </div>
    </form>
</div>