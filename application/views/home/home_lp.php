<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('.png')?>" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('css/home/styles.css')?>" rel="stylesheet" />

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
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-green" style="max-width: 80%;">
            <div class="container px-5">
            <a class="navbar-brand" href="<?php echo base_url('home/home_admin'); ?>">CMU JS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Your existing menu items -->
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/home_admin'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about_admin'); ?>">About</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Separate "Login" and "Register" links -->
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('pages/dashboard_admin'); ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('pages/db_adminProfile'); ?>"><?php echo isset($userData->complete_name) ? $userData->complete_name : 'User Profile'; ?></a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/logOut'); ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center image-container">
    <img class="rounded-3 my-5" src="../images/cmu.jpg" alt="..." id="articleImage" style="width: 80%; height: 300px;" />
</div>

    <script>
        var images = ["../images/cmu.jpg", "../images/cmuv2.jpg", "../images/cmuv3.jpg"];
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
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php 
                // Sort articles alphabetically by volume name
                usort($articleData, function($a, $b) {
                    return strcmp($a->vol_name, $b->vol_name);
                });
                foreach ($articleData as $article): ?>
                <!-- Inside the foreach loop -->
                <div class="post-preview">
                    <a href="<?php echo site_url('home/post_admin/'.$article->slug); ?>">
                        <h2 class="post-title"><?php echo $article->title; ?></h2>
                        <p><strong>Volume:</strong> <?php echo $article->vol_name; ?></p>
                        <p><strong>DOI:</strong> <?php echo $article->doi; ?></p>
                        <p><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                        <p class="post-subtitle"><?php echo isset($article->abstract) && strlen($article->abstract) > 100 ? substr($article->abstract, 0, 100) . '...' : $article->abstract; ?></p>
                    </a>
                    <p class="post-meta">
                        Author:
                        <span class="meta">
                            <small><a href="#!"><?php echo $article->author_name; ?><br></a> Published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?></small>
                        </span>
                    </p>
                    <div class="d-flex justify-content-end mb-4">
                    </div>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class
                                    class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
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
