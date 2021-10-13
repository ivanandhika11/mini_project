<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap and CSS -->
  <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../src/css/style.css" />

  <title>Postingan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top">
    <button class="navbar-toggler sideMenuToggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Postingan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0" role="search" method="POST">
        <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search here..." action="search.php">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="search">Search</button>
      </form>
    </div>
  </nav>

  <div class="wrapper d-flex">
    <div class="sideMenu bg-mattBlackLight">
      <div class="sidebar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../penulis/dashboard.php" class="nav-link px-2">
              <i class="material-icons icon">dashboard</i>
              <span class="text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="../penulis/edit_profil.php" class="nav-link px-2">
              <i class="material-icons icon">person</i>
              <span class="text">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link px-2">
              <i class="material-icons icon">border_color</i>
              <span class="text">CRUD Post</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="../penulis/postingan.php" class="nav-link px-2">
              <i class="material-icons icon">insert_chart</i>
              <span class="text">Postingan</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link px-2 sideMenuToggler">
              <i class="material-icons icon expandView">view_list</i>
              <span class="text">Resize</span>
            </a>
          </li>
        </ul>
      </div>
    </div>