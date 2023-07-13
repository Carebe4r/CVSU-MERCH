<?php
session_start();
include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something is entered and will fetch

  //studentnumber
  $SNO = $_POST['SNO'];
  $Name = $_POST['name'];
  $uname = $_POST['uname'];
  $Password = $_POST['psw'];
  $Repassword = $_POST['psw2'];
  $duplicate = mysqli_query($con, "SELECT * FROM users WHERE SNO = '$SNO'");
  $duplicates = mysqli_query($con, "SELECT * FROM users WHERE UNAME = '$uname'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
      "<script> alert('Student Number already exist') </script>";
  } else {
    if (mysqli_num_rows($duplicates) > 0) {
      echo
        "<script> alert('Username already exist') </script>";
    } else {
      if (!empty($uname) && !empty($SNO) && !empty($Name) && !empty($Password) && !empty($Repassword) && ($Password == $Repassword)) {
        //will save to database
        $query = "INSERT INTO users (SNO, NAMES, UNAME, PASSWORDS) VALUES ('$SNO', '$Name', '$uname', '$Password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        echo
          "<script> alert('Registration complete') </script>";
        die;

      } else {
        if ($Password !== $Repassword) {
          echo
            "<script> alert('Password doesnt match')</script>";
        } else {
          echo "<script> alert('please confirm your password')</script>";
        }
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup | Cavite State University - Bacoor Merchandise</title>
    <link rel="icon" type="image/x-icon" href="images/cvsu-logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    .imgcontainer {
        text-align: center;
        justify-content: center;
    }

    img.avatar {
        width: 10vh;
    }

    h2 {
        color: green;
        font-size: 30px;
        text-align: center;
    }

    h1 {
        margin-top: 5vh;
        color: green;
        font-size: 20px;
        text-align: center;
    }


    .memacontainer {
        margin: auto;
        opacity: 100%;
        color: green;
        width: 50vh;


    }

    input[type=text],
    input[type=password] {
        width: 50vh;
        display: flex;
        background: #f1f1f1;
        border: none;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
</style>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+8-7000</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">bc.cvsubacoor.merch@cvsu.edu.ph</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">CVSU BACOOR MERCH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="shop.php">Shop</a>
							<a class="dropdown-item" href="cart.php">Cart</a>
							<a class="dropdown-item" href="checkout.php">Checkout</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item cta cta-colored"><a href="login.php" class="nav-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
							<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
						</svg></a></li>

				</ul>
			</div>
        </div>
    </nav>
    <!-- END nav -->

    <hr>

    <h2 class="fs-5 text-center my-5">Hello Stingrays!
        <br> Create an account here. </br>
    </h2>

    <div class="memacontainer mt-5 p-1">
        <form method="post">
            <div class="imgcontainer my-4">
                <img src="images/img-account.png" alt="Avatar" class="avatar">
            </div>

            <div class="container ">
                <label for="name"><b>Name</b></label>
                <input class="p-2" type="text" placeholder="Firstname, Lastname" name="name" required>

                <label for="uname"><b>Username</b></label>
                <input class="p-2" type="text" placeholder="Enter Username" name="uname" required>

                <label for="SNO"><b>Student Number</b></label>
                <input class="p-2" type="text" placeholder="ex.202112345" name="SNO" required>

                <label for="psw"><b>Password</b></label>
                <input class="p-2" type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw2"><b>Repeat Password</b></label>
                <input class="p-2" type="password" placeholder="Enter Password" name="psw2" required>

                <div class="d-grid gap-2 d-md-block text-center my-5">
                    <button class="btn btn-primary" type="submit">Signup</button>
                    <button type="reset" class="btn btn-primary" type="button">Cancel</button>
                </div>
                <div>
                    <p class="fs-4 mt-5 text-center">By creating an account, you agree to our <a
                            href="termsandconditions.php">Terms and Conditions.</p>
                </div>
            </div>
        </form>
    </div>


    <hr>


    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5"></div>
        </div>
    </section>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">CVSU BACOOR MERCH</h2>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="py-2 d-block">Home</a></li>
                            <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                            <li><a href="about.php" class="py-2 d-block">About</a></li>
                            <li><a href="cart.php" class="py-2 d-block">Cart</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="termsandconditions.php" class="py-2 d-block">Terms &amp; Conditions</a>
                                </li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Cavite State
                                        University, Molino IV, Bacoor City, PH</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">+8-7000</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">bc.cvsubacoor.merch@cvsu.edu.ph</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr></hr>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> @CVSU-Bacoor</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>