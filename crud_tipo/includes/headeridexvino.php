<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de Vinos</title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<!-- Bootstrap nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index_vino.php">Gestion de Vinoteca</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="games.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vino/create_vino.php">Crear</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="vino/read_vino.php">Leer</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="vino/update_vino.php">Actualizar</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="vino/delete_vino.php">Eliminar</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="gestion.php">Gestion</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/final_lenguaje/gamepage/indexadm.php">Game Page</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar Sesión</a>
    </ul>                 
  </div>
</nav>