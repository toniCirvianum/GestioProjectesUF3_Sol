<!doctype html>
<html lang="en">

<head>
  <title><?php echo $params['title'] ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CDN CSS v5.3.2 -->
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
  <header>
    <!-- Inici navbar de presentació per usuaris no logejats -->
    <nav class="navbar navbar-expand-lg border bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <a class="btn btn-primary mx.-auto" href="/">Home</a>
        <div>
          <a class="btn btn-success me-2" href="/default/login">Login</a>
          <a class="btn btn-warning" href="/default/register">Register</a>
        </div>
      </div>
    </nav>
    </nav>
  </header>
  <main>
    <?php echo $params['content'] ?>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>