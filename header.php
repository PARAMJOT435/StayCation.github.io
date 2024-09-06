<style>
  .profile{
    width: 100px;
    border: 1px solid grey;
    border-radius: 40px;
  }
</style>
 <nav class="navbar navbar-expand-lg ms-xs-0 ps-xs-0 ps-sm-2 ps-md-5 pe-lg-5 pe-sm-1 fw-semibold p-0">
      <div class="container-fluid me-lg-5 me-sm-1 me-xs-0 ms-2">
        <a class="navbar-brand" href="index.php">
          <img src="images/download.svg" height="65" width="300" alt="">
        </a>
        <button
          class="navbar-toggler me-5"
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
          <ul class="navbar-nav ms-auto">
          <?php if(!isset($_SESSION['user'])):?>  
          <li class="nav-item ms-auto">
              <a
                class="nav-link active"
                aria-current="page"
                href="signup.php"
                >Sign In / Sign up</a
              >
            </li>
            <?php else:?>
              <!-- <li class="nav-item ms-auto my-auto">
              <a
                class="nav-link active"
                aria-current="page"
                href="logout.php"
                >Logout</a
              >
            </li> -->
              <li class="nav-item ms-auto my-auto">
              <a
                class="nav-link active"
                aria-current="page"
                href="add-property.php"
                >Add your property</a
              >
            </li>

            <li class="nav-item dropdown ms-5 my-auto profile">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg" class="mx-2" style="border-radius: 20px;" height="30" width="30">
          </a>
          <ul class="dropdown-menu mt-3">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="list-all.php">Cancel Booking</a></li>
          </ul>
        </li>

            <li class="nav-item  ">
            <a
                class="nav-link active"
                aria-current="page"
                href="logout.php">
              
            </a>
            </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
    <hr />
  