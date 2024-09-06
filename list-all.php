<?php
session_start();
include 'header.php';
include 'connection.php';
$username = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php

    $list = "SELECT * FROM booking WHERE username='$username' ";
    $result = $con->query($list);

    if ($result->num_rows > 0) {
        // Loop through results and display each hotel
        while ($row = $result->fetch_assoc()) {
            $hotel_id = $row['hotelid'];
            $sel = "SELECT * FROM hotel WHERE hid=$hotel_id";
            $result1 = $con->query($sel);
            if ($result1->num_rows > 0) {
                // Loop through results and display each hotel
                while ($row1 = $result1->fetch_assoc()) {
                    $ppn = $row['price'] / $row1['price'];

    ?>
                    <div class="container col-md-4">
                        <div class="col mb-5">
                            <div class="btn card border-0 mx-auto p-0 m-0" style="width:300px">
                                <img src="<?php echo $row1['hpic']; ?>" class="card-img-top rounded" height="300px" alt="Hotel Image">
                                <div class="card-body">
                                    <p class="m-0 p-0 text-start fw-bold lh-1"><?php echo $row1['hname']; ?> in <?php echo $row1['city']; ?></p>
                                    <p class="m-0 p-0 text-start fw-light lh-small"><?php echo $row1['pdetails']; ?></p>
                                    <p class="m-0 p-0 lh-1 float-start mt-1">Total: ₹<?php echo $row['price']; ?></p>
                                    <form method="post">
                                        <input type="hidden" name="booking_id" value="<?php echo $row['bid']; ?>">
                                        <input type="submit" name="cancel" class="bg-white text-danger border-0" value="Cancel Booking">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php
                }
            }
        }
    } else {
        echo "No bookings for listed user";
    }
    include'questions.php';
    include'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
if (isset($_POST['cancel'])) {
    $booking_id = $_POST['booking_id'];
    $canc = "DELETE FROM booking WHERE bid='$booking_id'";
    $result = $con->query($canc);
    if ($result) {
        echo "<script>alert('Booking Cancelled')</script>";
    } else {
        echo "<script>alert('Booking Not Cancelled')</script>";
    }
}
?>