<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg ms-xs-0 ps-xs-0 ps-sm-2 ps-md-5 pe-lg-5 pe-sm-1 fw-semibold p-0">
      <div class="container-fluid me-lg-5 me-sm-1 me-xs-0 ms-2">
        <a class="navbar-brand" href="#">
          <img src="images/download.svg" height="65" width="300" alt="">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto ">
          <?php if(!isset($_SESSION['user'])):?>  
          <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="signup.php"
                >Sign In / Sign up</a
              >
            </li>
            <?php else:?>
              <li class="nav-item ms-auto my-auto">
              <a
                class="nav-link active"
                aria-current="page"
                href="logout.php"
                >Logout</a
              >
            </li>
            <li class="nav-item ms-5 my-auto">
            <a
                class="nav-link active"
                aria-current="page"
                href="logout.php">
              <img src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg" style="border-radius: 20px;" height="40" width="40">
            </a>
            </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>