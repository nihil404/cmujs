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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('css/home/styles.css'); ?>" rel="stylesheet" />

        
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
        <!-- Header with Navigation-->

            <div class="header-container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-green" style="max-width: 80%;">
                    <div class="container px-4 px-lg-5">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="../images/cmujournallogo.png"  style="width: 150px; height: 40px;"></a>
                        </a>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"  style="margin-left:100px;">
                    <li class="nav-item"><a class="nav-link px-lg-4 py-3 py-lg-4" href="<?php echo base_url(); ?>" style="font-size: 16px; color:green;">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-4 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>" style="font-size: 16px; color:green;">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-4 py-3 py-lg-4" href="<?php echo base_url('home/articles'); ?>" style="font-size: 16px; color:green;">Articles</a></li>
                
                
                            </ul>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="btn-success text-uppercase me-3" href="<?php echo base_url('registration/login'); ?>" style="font-size: 16px; color:green;">Login</a></li>
                                <li class="nav-item"><a class="btn-success text-uppercase ms-4" href="<?php echo base_url('registration/signup'); ?>" style="font-size: 16px; color:green;">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    </div>
                </div>
            </div>
        </header>

        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center image-container">
    <img class="rounded-3 my-5" src="../images/cmu.jpg" alt="..." id="articleImage" style="width: 80%; height: 300px;" />
</div>

    <script>
        var images = ["/images/cmu.jpg", "../images/cmuv2.jpg", "../images/cmuv3.jpg"];
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

        <!-- Main Content-->
        <div class="container px-4 px-lg-5" style="margin-top:110px;">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php foreach ($articleData as $article): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <a href="<?php echo site_url('home/post/'.$article->slug); ?>" class="text-decoration-none">
                        <div class="card-body">
                            <h2 class="card-title" style="font-size: 22px;"><?php echo $article->title; ?></h2>
                            <p class="card-text" style="font-size: 14px; margin-top:10px; margin-top:10px;"><strong>Volume:</strong> <?php echo $article->vol_name; ?></p>
                            <p class="card-text" style="font-size: 14px; margin-top:-20px;"><?php echo $article->doi; ?></p>
                            <p class="card-text" style="font-size: 14px; margin-top:-20px;"><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                            <p class="card-text" style="font-size: 14px; margin-top:-20px;"><?php echo isset($article->abstract) && strlen($article->abstract) > 40 ? substr($article->abstract, 0, 40) . '...' : $article->abstract; ?></p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <p class="post-meta" style="font-size: 14px; margin-top:10px;">
                            Author: <a href="#!"><?php echo $article->author_name; ?></a><br>
                            <small>Published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?></small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


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
        <script src="js/scripts.js"></script>

            <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
