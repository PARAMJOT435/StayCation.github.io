  <?php
  session_start();
  include('header.php');
  ?>
  <?php  
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="signup";

  $con=mysqli_connect($servername,$username,$password,$dbname);


  ?>
  <link rel="stylesheet" href="hotel-list.css">
    <div class="container text-center d-flex justify-content-evenly p-2 pt-5 mt-5 ">
    <div class="row">
    <h2 class="text-center mb-5 ">Choose your next Travel Destination by Property</h2>
 
  <?php
// Fetch the data from the database
$stmt = "SELECT * FROM hotel";
$result = $con->query($stmt);

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each result
    while($row = $result->fetch_assoc()) {
        // Display the card
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <div class="col col-xs-12 mb-5">
            <a href="hotel-page.php?hotel_id=<?php echo $row['hid']; ?>" class="btn card border-0 mx-auto p-0 m-0" style="width:300px">
                <img src="<?php echo $row['hpic']; ?>" class="card-img-top rounded" height="300px" alt="Hotel Image">
                <div class="card-body">
                    <p class="m-0 p-0 text-start fw-bold lh-1"><?php echo $row['hname']; ?> in <?php echo $row['city']; ?></p>
                    <p class="m-0 p-0 text-start fw-light lh-small"><?php echo $row['pdetails']; ?></p>
                    <p class="m-0 p-0 lh-1 float-start mt-1">₹<?php echo $row['price']; ?> night</p>
                </div>
            </a>
        </div>
        <?php
    }
} else {
    echo "No hotels found";
}
?>
    </div>
  </div>
  <?php 
include "questions.php";
include 'footer.php';
?>