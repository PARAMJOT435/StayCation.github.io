


  <?php
  session_start();


  include('header.php');
  include 'connection.php'; // Include database connection script


  if (isset($_SESSION['checkin']) && isset($_SESSION['checkout'])) {
      $checkin_date = $_SESSION['checkin'];
      $checkout_date = $_SESSION['checkout'];
      
      $checkin_date_obj = DateTime::createFromFormat('Y-m-d', $checkin_date);
      $checkout_date_obj = DateTime::createFromFormat('Y-m-d', $checkout_date);
      
      $interval = $checkin_date_obj->diff($checkout_date_obj);
      
      $number_of_days = $interval->days;
      $_SESSION['days']=$number_of_days;
      


  }
  else{
    $number_of_days=1;
  }

  if(!isset($_GET['hotel_id'])) {
      header("Location: all-hotels-ludhiana.php");
      exit;
  }

  $hotel_id = $_GET['hotel_id'];

  $query = "SELECT * FROM hotel WHERE hid='$hotel_id'";
  $result = $con->query($query);

  if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      ?>
      <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>StayCation</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="hotel-page.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <div class="container mx-auto fw-semibold px-5 mx-5">
    <span class="fs-2"><?php echo $row['hname'];?></span>
    <span class="float-end"><i class="fa fa-share-alt" style="font-size:14px"></i> &nbsp;
    <button type="button" class="btn btn-dark" id="liveToastBtn" onclick="copyUrl()">Share</button>

  <div class="toast-container position-fixed bottom-0 end-0 px-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg" height="30px" width="30px" class="rounded me-2" alt="...">
        <strong class="me-auto">StayCation</strong>
        <small id="time"></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div id="toast-body" class="toast-body">
      </div>
    </div>
  </div>
    </span>
    <div class="container text-center">
    <div class="row">

  <!-- left hand side -->

      <div class="col col-12 col-md-6 d-flex flex-column">
        <div class="container pe-md-5">
      <img src="<?php echo $row['hpic']; ?>"  class="image-fluid rounded w-100 float-start mt-5 col-12 col-md-6" height="300px" >
      </div>
      <div class="container d-flex flex-column">
      <h1 class="fs-4 me-auto" style="margin-top: 0.5em;"><?php echo $row['pdetails'];?></h1>
      <h1 class="fw-light fs-6 me-auto"><?php echo $row['mdetails'];?></h1>
      <h1 class="fs-4 me-auto" style="margin-top: 0.5em;">₹<?php echo $row['price']; ?> night </h1>
      
      <span class="d-flex mt-5 align-items-center"> <h1 class="fs-4 me-auto" style="margin-top: 0.5em;">Room and breakfast by <?php echo $row['fname'];?></h1>      <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg" height="40px" width="40px" style="border-radius: 100%; margin-right:auto" alt="..."></span>
  
  
      <!-- 3 small cards -->
      <div class="container d-flex justify-content-start gap-3 p-0 m-0 mt-3 ">
        
    <div class="card m-0 col-3">
    <div class="card-body">
    Cozy Stay
    </div>
  </div>
    <div class="card m-0 col-3">
    <div class="card-body">
    Cozy Stay
    </div>
  </div>
    <div class="card m-0 col-3">
    <div class="card-body">
    Cozy Stay
    </div>
  </div>
    </div>
    <hr>
    <div class="container">
      <span class="d-flex ">
      <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg" height="50px" width="50px" style="border-radius: 100%; " alt="...">
      <div class="section ms-4"> <h1 class="fs-6">Hosted By <?php echo $row['fname'];?></h1>
      <h1 class="fw-light fs-6 ">Member from 2 years</h1>
    </div>
      </span>
    </div>
    <hr>
    <h1 class="fs-4 me-auto" style="margin-top: 0.5em;">Common facilities on StayCation</h1>
    <div class="container text-start">
    <div class="row">
      <div class="col mt-4 ">
      <p class="col-12 m-0 p-0"><i class="fa fa-home fs-3 "></i>&nbsp; Home Like environment</p>
      <br>
      <p class=" col-12 m-0 p-0"><i class="bi-wifi fs-3"></i>&nbsp; Wifi</p>
      <br>
      <p class="m-0 p-0 col-12" ><i class="bi-car-front-fill fs-3"></i>&nbsp; Car Parking</p>
      <br>
      <p class="m-0 p-0 col-12"><i class="bi-fuel-pump fs-3"></i>&nbsp; Nearby Petrol Pump</p>
      <br>
      </div>
      <div class="col mt-4">
      <p class="col-12 m-0 p-0"><i class="bi bi-airplane fs-3 "></i>&nbsp; Nearby airport</p>
      <br>
      <p class="col-12 m-0 p-0"><i class="bi bi-chat-left-text fs-3"></i>&nbsp; W24X7 Helpdesk</p>
      <br>
      <p class="col-12 m-0 p-0" ><i class="bi bi-tv fs-3"></i>&nbsp; 4K TV</p>
      <br>
      <p class="col-12 m-0 p-0"><i class="bi bi-universal-access fs-3"></i>&nbsp; Universal access</p>
  <br>
      </div>
    </div>
  </div>
          </div>
    </div>

  <!-- right hand side -->

      <div class="col col-12 col-md-6 mt-5 ">
        <div class="container col-12">
      <iframe class="rounded-4" style="border:0; width: 100%;" src="<?php echo $row['link'];?>"  height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    <div class="container col-12 ">

    <!-- form -->
    <div class="left  mx-auto mt-5">
    <div class="card card-form ms-auto p-3 col-12 col-md-9" >
      <div class="card-body ">
        <h2 class="card-title fw-bold">Find Places To Stay On StayCation</h2>
        <p class="card-text fs-6 fw-light">Discover entire homes and rooms perfect for any trip.</p>
        <form class="form-floating"  method="post">
          <select class="form-control" id="citySelect" name="city" disabled>
            <option value="Ludhiana"><?php echo $row['city'];?></option>
            <option value="Ludhiana">Ludhiana</option>
            <option value="Delhi">Delhi</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Manali">Manali</option>
          </select>
          <label for="citySelect" class="fw-semibold" style="font-size: 14px; transition: all 0.3s ease-in-out;">LOCATION</label>

          <div class="row">
            <div class="col">
              <input type="date"  class="form-control mt-2 btn-height" name="checkin" value="<?php echo isset($_SESSION['checkin']) ? $_SESSION['checkin'] : ''; ?>" placeholder="Checkin" aria-label="Checkin">
            </div>
            <div class="col">
              <input type="date"  class="form-control mt-2 btn-height" name="checkout" value="<?php echo isset($_SESSION['checkout']) ? $_SESSION['checkout'] : ''; ?>" placeholder="Checkout" aria-label="Checkout">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <select class="form-select mt-2 btn-height"  name="adults" aria-label="Adults">
                <?php
                if (isset($_SESSION['adults'])) {
                  echo '<option value="' . $_SESSION['adults'] . '">' . $_SESSION['adults'] . '</option>';
                } else {
                  echo '<option selected>Adults</option>';
                }
                ?>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="col">
              <select class="form-select mt-2 btn-height"  name="children" aria-label="Children">
                <?php
                if (isset($_SESSION['children'])) {
                  echo '<option value="' . $_SESSION['children'] . '">' . $_SESSION['children'] . '</option>';
                } else {
                  echo '<option selected>Children</option>';
                }
                ?>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
  <button class="btn btn-height btn-primary bg-danger border-white w-100 mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    Checkout
  </button>
  <script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const checkinInput = document.querySelector('input[name="checkin"]');
    const checkoutInput = document.querySelector('input[name="checkout"]');

    const calculateDays = () => {
      const checkinDate = new Date(checkinInput.value);
      const checkoutDate = new Date(checkoutInput.value);
      if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
        const timeDifference = checkoutDate - checkinDate;
        const daysDifference = timeDifference / (1000 * 3600 * 24);
        const total_price = daysDifference * <?php echo $row['price'];?>;
        document.getElementById('daysCount').innerText = `Number of days: ${daysDifference.toFixed(0)}`;
        document.getElementById('total').innerText = `Total: ${total_price.toFixed(2)}`;
      } else {
        document.getElementById('daysCount').innerText = '';
        document.getElementById('total').innerText = '';
      }
    };

    // Call calculateDays() when the page loads
    calculateDays();

    checkinInput.addEventListener('change', calculateDays);
    checkoutInput.addEventListener('change', calculateDays);
  });
</script>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Summary</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="">
        <img src="<?php echo $row['hpic']; ?>"  class="image-fluid rounded w-100 float-start my-5 col-12 col-md-6" height="200px" >
        <div class="container ">
    <div class="row">
      <div class="col col-12">
      <span class="fs-4"><?php echo $row['hname'];?></span>  
      </div>
      <div class="col col-12">
      <span class="fs-6 fw-normal">Per night price: ₹<?php echo $row['price'];?> /-</span>
      </div>
      <div class="col col-12">

      <span class="fs-6 fw-normal"><div id="daysCount" class="mt-2"></div></span>
      </div>
      
  <?php $total=$number_of_days* $row['price']; ?>
      <div class="col col-12">
      <span class="fs-6 fw-normal"><div id="total" class="mt-2"></div></span>
      </div>
    </div>
  </div>   
      
      </div>
      <div class="dropdown mt-3">
        <!-- Button trigger modal -->

  <input class="btn btn-height btn-primary bg-danger border-white w-50 mt-2" name="btn-confirm" type="submit" value="Confirm Booking  ">   
  </div>
    </div>
  </div>
  
        </form>
      </div>
    </div>
  </div>
    </div>
    </div>
    </div>
  </div>

  </div>

  <script>

    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    toastTrigger.addEventListener('click', copyUrl);

    function copyUrl() {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        console.log("URL copied to clipboard!");
        // Show toast message
        const toastBody = document.getElementById("toast-body");
        toastBody.innerText = "URL copied to clipboard!";
        const timeElement = document.getElementById("time");
        const currentTime = new Date().toLocaleTimeString();
        timeElement.innerText = currentTime;
        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
      }).catch((error) => {
        console.error("Error copying URL to clipboard:", error);
        // Show error toast message
        const toastBody = document.getElementById("toast-body");
        toastBody.innerText = "Error copying URL to clipboard!";
        const timeElement = document.getElementById("time");
        const currentTime = new Date().toLocaleTimeString();
        timeElement.innerText = currentTime;
        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
      });
      
    }
  </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
  </html>
      <?php
  } else {
      echo "Hotel not found";
  }
  // include('list-all.php'); 
  include('questions.php'); // Include questions.php
  include('footer.php'); // Include footer.php

  ?>
  <?php
  ob_start();
    
      
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if (isset($_POST['btn-confirm'])) {
          $username = $_SESSION['user'];
          $adults = $_POST['adults'];
          $children = $_POST['children'];
          $checkin_date1 = $_POST['checkin']; // Assuming you get these from your form
          $checkout_date1 = $_POST['checkout'];
         
          $checkin_date_obj1 = DateTime::createFromFormat('Y-m-d', $checkin_date1);
      $checkout_date_obj1 = DateTime::createFromFormat('Y-m-d', $checkout_date1);
      
      $interval = $checkin_date_obj1->diff($checkout_date_obj1);
      
      $number_of_days1 = $interval->days;
      $total1=$number_of_days1*$row['price'];
          // Assuming you get these from your form
          // $total=$number_of_days* $row['price'];
          // Check if the booking already exists
          $check_existing_booking = "SELECT * FROM booking WHERE hotelid = '$hotel_id' AND username = '$username' AND checkin = '$checkin_date1' AND chechout = '$checkout_date1'";
          $result_existing = $con->query($check_existing_booking);
          
          if ($result_existing->num_rows > 0) {
              echo "<script>alert('You have already booked this hotel for these dates.')</script>";
          }
           else {
            if(isset($_SESSION['user'])){
              $find = "SELECT * FROM login WHERE username = '$username'";
              $result2 = $con->query($find);
              $row2 = $result2->fetch_assoc();
              $email = $row2['email'];
             
              $cfm = "INSERT INTO booking (hotelid, username, email, checkin, chechout, adults, children,price) VALUES ('$hotel_id', '$username', '$email', '$checkin_date1', '$checkout_date1', '$adults', '$children','$total1')";
      
              if ($con->query($cfm) === TRUE) {
                echo "<script>alert('Booking Done')</script>";}
                else{
                  
                  echo "<script>alert('Booking Failed')</script>";
    
                  } 
              } else {
                 
                  echo"<script>alert('Login First');</script>";
                echo"<script>window.location.href='signup.php';</script>";
              }
          }}
      }
  $con->close();
  ob_end_flush();

    ?>
