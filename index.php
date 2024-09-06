<?php
session_start(); // Start the PHP session

// Include header.php to maintain consistency across pages
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>StayCation</title>
    <link rel="stylesheet" href="index.css" /> <!-- Custom CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> <!-- Bootstrap CSS -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> <!-- Bootstrap JS -->
</head>
<body>
    
    <div class="main">
        <div class="left ms-lg-1 mx-auto ">
            <div class="card ms-md-5 ms-lg-5 ms-sm-5 p-3 border-0" style="height: 430px; width: 420px">
                <div class="card-body">
                    <h2 class="card-title fw-bold">Find Places To Stay On StayCation</h2>
                    <p class="card-text fs-6 fw-light">Discover entire homes and rooms perfect for any trip.</p>
                    <form class="form-floating" action="handle-form.php" method="post">
                        <select class="form-control" id="citySelect" name="city" required>
                            <option value="">Select a city</option>
                            <option value="Ludhiana">Ludhiana</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Bangalore">Bangalore</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Manali">Manali</option> <!-- Fixed typo: Changed 'Hyderabad' to 'Manali' -->
                        </select>
                        <label for="citySelect" class="fw-semibold" style="font-size: 14px; transition: all 0.3s ease-in-out;">LOCATION</label>

                        <div class="row">
                            <div class="col">
                                <input type="date" class="form-control mt-2 btn-height" name="checkin" placeholder="Checkin" aria-label="Checkin" required>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control mt-2 btn-height" name="checkout" placeholder="Checkout" aria-label="Checkout" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mt-2 btn-height" name="adults" aria-label="Adults" required>
                                    <option selected>Adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mt-2 btn-height" name="children" aria-label="Children" required>
                                    <option selected>Children</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-height btn-primary bg-danger border-white w-100 mt-2" name="btn-go" type="submit" value="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="right me-5 ms-lg-3 ms-md-3 ms-sm- mt-4">
            <img src="https://a0.muscache.com/im/pictures/9caaca2d-6892-4638-b675-6a879974f5ed.jpg?im_w=1440" class="rounded" height="500px" width="1000px" />
        </div>
    </div>

    <!-- Display hotels in Ludhiana -->
    <link rel="stylesheet" href="hotel-list.css">
    <div class="container text-center d-flex justify-content-evenly p-2 pt-5 mt-5">
        <div class="row">
            <h2 class="text-center mb-5">Hotels in Ludhiana</h2>
            <?php  
            include 'connection.php'; // Include database connection script

            // Query hotels in Ludhiana
            $lud="SELECT * FROM hotel WHERE city='Ludhiana' LIMIT 4";
            $result=$con->query($lud);
            
            if($result->num_rows > 0) {
                // Loop through results and display each hotel
                while($row = $result->fetch_assoc()) {
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

    <!-- Display hotels in Delhi -->
    <link rel="stylesheet" href="hotel-list.css">
    <div class="container text-center d-flex justify-content-evenly p-2 pt-5 mt-5">
        <div class="row">
            <h2 class="text-center mb-5">Hotels in Delhi</h2>
            <?php  
            include 'connection.php'; // Include database connection script

            // Query hotels in Delhi
            $Del="SELECT * FROM hotel WHERE city='Delhi'";
            $result=$con->query($Del);
            
            if($result->num_rows > 0) {
                // Loop through results and display each hotel
                while($row = $result->fetch_assoc()) {
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
    <div class="container w-100 mx-auto">
    <h2 class="text-center mt-5 col-6 mx-auto fs-1">
        Or Choose your next Travel Destination by Property
       <a href="hotel-list.php" style="text-decoration: none;">Let's Go</a>
    </h2>
</div>

    <?php
    // include('list-all.php'); 
    include('questions.php'); // Include questions.php
    include('footer.php'); // Include footer.php
    ?>

</body>
</html>
