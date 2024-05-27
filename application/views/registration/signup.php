<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS - Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="    " rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url ('css/home/styles.css" rel="stylesheet')?>" />

    <!-- Custom CSS for dark green color -->
    <!-- Custom CSS for dark green color -->
    <style>

        body {
            background-color: #ffffff; /* White background */
            color: green; /* Black text */
        }
        .bg-dark-green {
            background-color: #006400; /* Dark green color code */
        }
        .btn-dark-green {
            background-color: #006400; /* Dark green color code */
            border-color: #006400; /* Dark green color code */
            color: #fff; /* Text color */
            transition: all 0.3s; /* Smooth transition */
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3); /* Add box-shadow for 3D effect */
        }

        .btn-dark-green:hover {
            background-color: #004d00; /* Darker shade of green on hover */
            border-color: #004d00; /* Darker shade of green on hover */
            color: #fff; /* Text color on hover */
            transform: translateY(-2px); /* Move button up slightly on hover for 3D effect */
        }

        .card {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Add box-shadow to card for 3D effect */
            max-width: 500px; /* Adjust the maximum width of the card */
            margin: auto; /* Center the card horizontally */
            padding: 20px; /* Add some padding */
        }

        .text-green .nav-link {
            color: green !important;
        }

        .bg-yellow {
            background-color: #e6b400 !important;
        }
        .navbar {
        margin: 0 auto;
        }
        
    </style>

</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-yellow" style="max-width: 80%; height: 55px;">
        <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="../images/cmujournallogo.png"  style="width: 150px; height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-green">
                    <!-- Your existing menu items -->
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>" style="font-size: 16px; color:green;">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>" style="font-size: 16px; color:green;">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/contact'); ?>"style="font-size: 16px; color:green;">Contact</a></li>
                </ul>
                <!-- Login Form -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>" style="font-size: 16px; color:green;">Login</a></li>
                <br> <!-- Add <br> tag here -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/signup'); ?>"style="font-size: 16px; color:green;">Register</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header-->
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
           
                    
                    <!-- Login Form-->
<!-- Sign-up Form -->
<div class="card" style="margin-top: 50px;">
    <div class="card-header bg-dark-white text-Black text-center fw-bold">Sign Up</div>
    <div class="card-body">
        <form action="<?php echo base_url('registration/registerNow')?>" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="profile-pic" style="font-size: 16px;"> User Image </label>
                <input type="file" id="profile_pic" name="profile_pic" class="form-control">
                <small><?php if(isset($error)) {echo $error;} ?></small>
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label" style="font-size: 16px;">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="font-size: 16px;">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-size: 16px;">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
    <label for="role" class="form-label" style="font-size: 16px;">Role</label>
    <select class="form-select" id="role" name="role" required>
        <option value="">Select Role</option>
        <option value="0">Admin</option>
        <option value="1">Evaluator</option>
        <option value="2">Researcher</option>
    </select>
</div>

            <button type="submit" class="btn btn-dark-green" name="getstarted" style="width: 100%; color:yellow;">Register</button>
        </form>
     
        <div class="mt-3 text-center">
            <p style="font-size: 16px;">Already have an account? <a href="<?= base_url('registration/login')?>" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>.</p>
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Your content goes here -->
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="border-top">
        
    </footer>

    <!-- Bootstrap core JS-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('js/scripts.js')?>"></script>
</body>
</html>

