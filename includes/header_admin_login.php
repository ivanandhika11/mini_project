<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap and CSS -->
 <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous"/> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../src/css/style.css" />

  <title>Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top">
    <button class="navbar-toggler sideMenuToggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Login</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <div class="wrapper d-flex">
    <div class="sideMenu bg-mattBlackLight">
      <div class="sidebar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../index.php" class="nav-link px-2">
              <i class="material-icons icon">home</i>
              <span class="text">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="../pengunjung/pengunjung_home.php" class="nav-link px-2">
              <i class="material-icons icon">person_pin</i>
              <span class="text">Pengunjung</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="../penulis/login.php" class="nav-link px-2">
              <i class="material-icons icon">person_outline</i>
              <span class="text">Penulis</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="login.php" class="nav-link px-2">
              <i class="material-icons icon">person</i>
              <span class="text">Admin</span>
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