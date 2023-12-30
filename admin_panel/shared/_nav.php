<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assest/css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a href="index.html"><img src="assest/img/LABTEST_logo_2.png" width="170px" height="auto" alt=""></a>
      <ul class="nav_desktop">
       
        <li><a href="inventry.php" id="anav">INVENTRY</a></li>
        <li><a href="employee.php" id="anav">Employee</a></li>
      </ul>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Undefined'; ?>
  </button>
  <ul class="dropdown-menu dropdown-menu-dark">
    <li><a class="dropdown-item " href="logout.php">Logout</a></li>
  </ul>
</div>
      <div class="nav_mobile">
        <button class="btn-add me-2">
          <a href="inventry.php"><i class="bi bi bi-cart4 fw-bolder text-danger fs-5"></i></a>
        </button>
        <button class="btn-add">
          <a href="employee.php"><i class="bi bi-person-lines-fill text-danger fw-bolder fs-5"></i></a>
        </button>
      </div>
    </div>
  </nav>