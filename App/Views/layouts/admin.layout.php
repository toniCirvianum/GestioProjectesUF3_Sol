<!doctype html>
<html lang="en">

<head>
    <title><?php echo $params['title'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CDN CSS v5.2.1 -->
    <!-- <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> -->

    <!-- Bootstrap files v5.3.2 -->
    <link rel="stylesheet" href="../../../Public/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../Public/Assets/css/font/bootstrap-icons.css">

</head>

<body>
    <!-- Inici navbar de admin -->
    <header>
        <nav class="navbar navbar-expand-lg border bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <a class="btn btn-primary mx.-auto" href="/project/showProjects">Els meus Projectes</a>
                <div>
                    <a class="btn btn-success me-2" href="/admin/showUsers">Gestió usuaris</a>
                    <a class="btn btn-success me-2" href="/project/new">Nou Projecte</a>
                    <a class="btn btn-secondary me-2" href="/user/profile">Profile</a>
                    <a class="btn btn-warning" href="/user/logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php echo $params['content'] ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>