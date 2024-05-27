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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Core theme CSS -->
    <link href="<?php echo base_url('css/home/styles.css'); ?>" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffffff; /* White background */
            color: green; /* Black text */
        }

        .navbar-brand, .nav-link {
            color: #ffffff; /* White color for links */
        }

        .navbar-nav .nav-link {
            color: #ffffff !important; /* Important to override the default Bootstrap styles */
        }

        .navbar {
            background-color: #008000; /* Green background for navbar */
        }

        .btn-login {
            background-color: green; /* Yellow color for login button */
            border-color: #ffff00;
            color: yellow; /* Black text for login button */
        }

        .card {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Add box-shadow to card for 3D effect */
            max-width: 500px; /* Adjust the maximum width of the card */
            margin: auto; /* Center the card horizontally */
            padding: 20px; /* Add some padding */
        }

        .bg-yellow {
            background-color: #e6b400 !important;
        }
        .navbar {
        margin: 0 auto;
        }

        .text-green .nav-link {
            color: green !important;
        }
        
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-yellow" style="max-width: 80%;">
    <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="../images/cmujournallogo.png" style="width: 150px; height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto text-green">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>" style="font-size: 16px; color:green;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/about');?>" style="font-size: 16px;">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('registration/login');?>" style="font-size: 16px;">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('registration/signup');?>" style="font-size: 16px;">Register</a></li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Page Content -->
    <div class="container" style="width: 880px;" >
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light text-center font-weight-bold">Login</div>
                    <div class="card-body">
                        <form action="<?php echo base_url('registration/loginNow'); ?>" method="POST">
                            <div class="form-group">
                                <label for="email" style="font-size: 16px;">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" style="font-size: 16px;">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-login btn-block">Login</button>
                        </form>
                        <?php if($this->session->Flashdata('error')) { ?>
                            <p class="text-danger text-center mt-3"><?php echo $this->session->flashdata('error'); ?></p>
                        <?php } ?>
                        <div class="mt-3 text-center" style="font-size: 16px;">
                            <p>Don't have an Account? <a href="<?php echo base_url('registration/signup'); ?>">Create an account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
