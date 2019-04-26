

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


  <link rel="stylesheet" href="css/style.css">

  <!--fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <style>
    .demo-long {
      margin-top: 100px;
      margin-bottom: 200px;
    }
  </style>
</head>

<body>

<div class="navbar navbar-expand-lg fixed-top navbar-custom">
  <div class="container">
    <a href="index.php" class="navbar-brand text-white">ERSBS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <form class="form-inline ml-auto search-custom">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search an event" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-light" type="button">
              <i class="fa fa-search"></i>
            </button>
        </div>
        </div>
      </form>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link m-1 menu-item nav-active text-white" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-1 menu-item nav-active text-white" href="#aboutSection">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-1 menu-item nav-active text-white" href="#aboutSection">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-1 menu-item nav-active text-white" href="#eventSection">Browse Events</a>
        </li>
      </ul>

      <button type="button" class="btn btn-outline-light m-1 inline" data-toggle="modal" data-target="#exampleModalCenter">Sign In</button>

    </div>
  </div>
</div>


<!--script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<script src="../src/jquery.bootstrap-autohidingnavbar.js"></script>

<script>
  $("div.navbar.fixed-top").autoHidingNavbar();
</script>
