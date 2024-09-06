<?php 
session_start();
include('header.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StayCation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container w-75 ">
  <form class="row g-3" action="add-property.php" method="post" enctype="multipart/form-data">
  <div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" placeholder="Owner Name" name="fname" aria-label="Owner Name">
  </div>
  <div class="col">
    <input type="tel" class="form-control" placeholder="Owner Contact" name="contact" aria-label="Owner Contact">
  </div>
</div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="Link" class="form-label">Link For Your Property:</label>
    <input type="text" class="form-control" id="link" name="link" placeholder="eg:https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin">
  </div>
  <div class="col-6">
    <label for="Hotel_name" class="form-label">Hotel Name:</label>
    <input type="text" class="form-control" id="property_type" name="hname"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="Price" class="form-label">Price per NIght:</label>
    <input type="text" class="form-control" id="price" name="price"  placeholder="What Price you want for your property?">
  </div>
  <div class="col-6">
    <label for="Property_details" class="form-label">Property Details:</label>
    <input type="text" class="form-control" id="property_details" name="pdetails" placeholder="eg. Royal Home stay">
  </div>
  <div class="col-6">
    <label for="More_details" class="form-label"> More Property Details:</label>
    <input type="text" class="form-control" id="More_details" name="mdetails" placeholder="eg. 2 Bedrooms 2 Bathrooms">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <select id="inputCity" name="city" class="form-select">
      <option selected>Choose...</option>
      <option value="Ludhiana" name="Ludhiana">Ludhiana</option>
      <option value="Delhi" name="Delhi">Delhi</option>
      <option value="Mumbai" anem="Mumbai">Mumbai</option>
      <option value="Chandigarh" name="Chandigarh">Chandigarh</option>
      <option value="Bangalore" name="Bangalore">Bangalore</option>
      <option value="Hyderabad" name="Hyderabad">Hyderabad</option>
      <option value="Kolkata" name="Hyderabad">Manali</option>
    </select>
  </div>
  <!-- <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" name="city" id="inputCity">
  </div> -->
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" name="state" class="form-select">
      <option selected>Choose...</option>
      <option>Punjab</option>
      <option>Delhi</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" name="zip" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <!-- <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div> -->
    <div class="mb-3">
  <label for="formFile" class="form-label">Hotel Picture:</label>
  <input class="form-control" type="file" name="hpic" id="formFile">
</div>
  </div>
  <div class="col-12">
    <button type="submit" name="addbtn" class="btn btn-primary">Add Property</button>
  </div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $hname = $_POST['hname'];
    $price = $_POST['price'];
    $mdetails=$_POST['mdetails'];
    $pdetails = $_POST['pdetails'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $link=$_POST['link'];
   

    // File upload handling
    $target_dir = "uploads/";  // Create a directory named "uploads" in your project
    $target_file = $target_dir . basename($_FILES["hpic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["hpic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file already exists.')</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["hpic"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["hpic"]["tmp_name"], $target_file)) {
            // Insert data into database
            $hpic = $target_file;

            $stmt = "SELECT * FROM hotel WHERE address = '$address' ";
            $result = $con->query($stmt);
            if ($result->num_rows > 0) {
                echo "<script>alert('Hotel already exists')</script>";
            } else {
                $sql1 = "INSERT INTO hotel (fname, contact, address, hname, price, pdetails, city, state, zip, hpic,link,mdetails) 
                         VALUES ('$fname', '$contact', '$address', '$hname', '$price', '$pdetails', '$city', '$state', '$zip', '$hpic','$link','$mdetails')";
                if ($con->query($sql1) === TRUE) {
                    echo "<script>alert('Hotel added successfully')</script>";
                } else {
                    echo "<script>alert('Hotel not added')</script>";
                }
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }
}
include('questions.php');
include('footer.php');
?>
