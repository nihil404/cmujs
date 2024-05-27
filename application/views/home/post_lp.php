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
        .bg-green {
            background-color: #e6b400 !important;
        }
        .navbar {
        margin: 0 auto;
        }
        .text-yellow {
            color: yellow !important;
        }
        .image-container {
            position: relative;
            width: 100%;
            height: 320px; /* Full viewport height */
            overflow: hidden; /* Ensure image covers the container */
        }
        #articleImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease-in-out; /* Adjust the duration and timing function */
            margin-top: 0; /* Remove top margin */
        }

        .article-title:hover {
    text-decoration: underline;
    text-decoration-color: yellow;
}


    </style>
        <script>
        function confirmDelete(articleId) {
            if (confirm("Are you sure you want to delete this article?")) {
                window.location.href = "<?php echo base_url('article/delete_article/') ?>" + articleId;
            }
            return false; // Prevent form submission
        }
    </script>
    </head>
    <body>
        <!-- Navigation-->
        <!-- Your existing navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-green" style="max-width: 80%;">
            <div class="container px-5">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="../../images/cmujournallogo.png"  style="width: 150px; height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="font-size: 16px; color:green !important;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Your existing menu items -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="color:green !important;" href="<?php echo base_url('home/home_lp'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="color:green !important;" href="<?php echo base_url('home/about_lp'); ?>">About</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="color:green !important;" href="<?php echo base_url('pages/dashboard_authors'); ?>">Dashboard</a></li>
                <br> <!-- Add <br> tag here -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="color:green !important;" href="<?php echo base_url('pages/db_authProfile'); ?>"><?php 
            if($this->session->userdata('UserLoginSession')) {
                echo $userData->complete_name;
            }  
        ?></a>
        
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="color:green !important;"  href="<?php echo base_url('registration/logOut'); ?>">Logout</a></li>
        
    </li>
            </ul>
        </div>
    </div>
</nav>

<div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center image-container">
    <img class="rounded-3 my-5" src="../../images/cmu.jpg" alt="..." id="articleImage" style="width: 80%; height: 300px;" />
</div>

    <script>
        var images = ["../../images/cmu.jpg", "../../images/cmuv2.jpg", "../../images/cmuv3.jpg"];
        var currentIndex = 0;
        var imageElement = document.getElementById("articleImage");

        function moveToNextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            fadeOutAndChangeSrc(imageElement, images[currentIndex]);
        }

        function fadeOutAndChangeSrc(element, newSrc) {
            element.style.opacity = 0;
            setTimeout(function () {
                element.src = newSrc;
                fadeIn(element);
            }, 500); // Adjust the duration of the fade out effect
        }

        function fadeIn(element) {
            var opacity = 0;
            var timer = setInterval(function () {
                if (opacity >= 1) {
                    clearInterval(timer);
                }
                element.style.opacity = opacity;
                opacity += 0.1;
            }, 50); // Adjust the duration and steps of the fade in effect
        }

        setInterval(moveToNextImage, 5000);

        function resizeImage(width, height) {
            imageElement.style.width = width + 'px';
            imageElement.style.height = height + 'px';
        }
    </script>

        <!-- Page Header-->
        
        <div style="margin-top: 100px; color: black;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php foreach ($articleData as $article) : ?>
                        <div class="post-heading">
                            <h4 style="color: green;"><?php echo $article->title; ?></h4>
                            <span class="meta" style="color: green;">
                                Posted by <small><a href="#!" style="color: green;"><?php echo $article->author_name; ?></a></small>
                                on <?php echo date('F d, Y', strtotime($article->created_at)); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content -->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7" style="font-size:16px;" >
                <?php foreach ($articleData as $article) : ?>
                    <p style="margin-top: 50px; "><?php echo $article->abstract; ?></p>
                    <form action="<?php echo base_url('pages/delete_article/' . $article->articleid); ?>" method="post" onsubmit="return confirmDelete(<?php echo $article->articleid; ?>)">
                    </form>
                    <br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</article>

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
        <script src="<?php echo base_url('js/scripts.js')?>"></script>>
    </body>
</html>
