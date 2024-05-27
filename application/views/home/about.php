<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CMU JS</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="    " rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url ('css/home/styles.css" rel="stylesheet')?>" />

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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Your existing menu items -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>"style="font-size: 16px; color:green;">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>"style="font-size: 16px; color:green;">About</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>"style="font-size: 16px; color:green;">Login</a></li>
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
                        <div class="page-heading" style="margin-top: 80px;">
                            <h1>About CMU JS</h1>
                            <span class="subheading">Empowering Science, Inspiring Minds.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>CMU Journal of Science publishes quality research outputs in the field of natural sciences, mathematics, engineering, and social sciences from local, national, and international contributors. It is a peer-reviewed multidisciplinary journal published annually by Central Mindanao University, Musuan, Maramag, Bukidnon, Philippines. This official scientific journal of the University is accredited by the Philippine Commission on Higher Education (CHED) as Category B and indexed in Philippine E-journals.</p>
                        <p>CMUJS is committed to publishing fully open access research articles for scholarly work and distribution provided that the author is properly credited.</p>
                        <p>All authors who submit and publish their articles in CMUJS acknowledge and accept this Open Access Statement as a term and condition for journal publication.</p>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">

                        <div class="small text-center text-muted fst-italic">Copyright &copy; CMU JS</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('js/scripts.js')?>"></script>
    </body>
</html>
