<?php 
session_start();
if(!isset($_SESSION['user'])){
    echo"<script>alert('Sign in First');</script>";
    header("Location: signup.php");
}
include 'header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
     <!-- Display hotels in Ludhiana -->
     <link rel="stylesheet" href="hotel-list.css">
    <div class="container text-center d-flex justify-content-evenly p-2 pt-5 mt-5">
        <div class="row">
            <!-- <h2 class="text-center mb-5">Hotels in Ludhiana</h2> -->
           <!-- ... (rest of the code remains the same) ... -->

<?php  
// session_start();
include 'connection.php'; // Include database connection script

$city=$_SESSION['city'];
// $_SESSION['checkin'];
// $_SESSION['checkout'];
// $_SESSION['adults'];
// $_SESSION['children'];
            
// Query hotels in Ludhiana
$lud="SELECT * FROM hotel WHERE city='$city'";
$result=$con->query($lud);
            
if($result->num_rows > 0) {
    // Loop through results and display each hotel
    while($row = $result->fetch_assoc()) {
        ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include "questions.php";
include 'footer.php';
?>
<?php
// session_start(); // Start the session

// if($_SERVER['REQUEST_METHOD']=='POST'){
//     if(isset($_POST['search']) && isset($_POST['hname'])){ // Check if 'hname' is set
//         $_SESSION['hotel-name']=$_POST['hname'];
//         header('location:hotel-page.php'); // Use an absolute URL or a URL relative to the root of your website
//         exit; // Stop executing the script after the redirect
//     }
// }
?>